<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class UtilisateurController extends Controller
{
    public function index() {
        $utilisateurs = Utilisateur::with(['role', 'ateliers'])->get();
        return response()->json($utilisateurs, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'nom_user' => 'required|string|max:255',
            'age' => 'required|integer',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:utilisateurs,email',
            'adresse' => 'required|string|max:255',
            'password' => 'required|string|min:5',
            'id_roles' => 'required|exists:roles,id',
            'id_DR' => 'nullable|exists:direction_regionales,id',
            'id_complexe' => 'nullable|exists:complexes,id',
            'id_etablissement' => 'nullable|exists:efps,id',
            'ateliers' => 'nullable|array',
            'ateliers.*' => 'exists:ateliers,id',
        ]);

        $data = $request->except('ateliers');
        $data['password'] = Hash::make($data['password']);

        $utilisateur = Utilisateur::create($data);
        
        // Sync ateliers if the user is a formateur
        if ($request->has('ateliers') && $utilisateur->role->nom_role === 'Formateur') {
            $utilisateur->ateliers()->sync($request->ateliers);
        }

        return response()->json([
            'message' => 'Utilisateur créé avec succès.',
            'utilisateur' => $utilisateur->load('ateliers')
        ], 201);
    }

    public function show(Utilisateur $utilisateur) {
        return response()->json($utilisateur->load(['role', 'ateliers']), 200);
    }

    public function update(Request $request, Utilisateur $utilisateur) {
        $request->validate([
            'nom_user' => 'required|string|max:255',
            'age' => 'required|integer',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:utilisateurs,email,'.$utilisateur->id,
            'adresse' => 'required|string|max:255',
            'password' => 'nullable|string|min:5',
            'id_roles' => 'required|exists:roles,id',
            'id_DR' => 'nullable|exists:direction_regionales,id',
            'id_complexe' => 'nullable|exists:complexes,id',
            'id_etablissement' => 'nullable|exists:efps,id',
            'ateliers' => 'nullable|array',
            'ateliers.*' => 'exists:ateliers,id',
        ]);

        $data = $request->except('ateliers', 'password');
        
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $utilisateur->update($data);
        
        // Sync ateliers if the user is a formateur
        if ($request->has('ateliers') && $utilisateur->role->nom_role === 'Formateur') {
            $utilisateur->ateliers()->sync($request->ateliers);
        } else {
            // Clear ateliers if not a formateur
            $utilisateur->ateliers()->detach();
        }

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès.',
            'utilisateur' => $utilisateur->load('ateliers')
        ], 200);
    }

    public function destroy(Utilisateur $utilisateur) {
        $utilisateur->ateliers()->detach();
        $utilisateur->delete();
        return response()->json([
            'message' => 'Utilisateur supprimé avec succès.'
        ], 204);
    }

    public function toggleStatus($id) {
        $utilisateur = Utilisateur::findOrFail($id);
        
        $utilisateur->status = $utilisateur->status === 'actif' ? 'inactif' : 'actif';
        $utilisateur->save();

        $utilisateur->load('role', 'directionRegionale', 'complexe', 'efp', 'ateliers');

        return response()->json([
            'message' => 'Statut utilisateur mis à jour avec succès.',
            'utilisateur' => $utilisateur
        ], 200);
    }

    public function register(Request $request) {
        $request->validate([
            'nom_user' => 'required|string|max:255',
            'age' => 'required|integer',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'adresse' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'id_roles' => 'required|exists:roles,id',
        ]);

        $data = $request->only([
            'nom_user',
            'age',
            'telephone',
            'email',
            'adresse',
            'id_roles'
        ]);

        $data['password'] = Hash::make($request->password);

        $utilisateur = Utilisateur::create($data);

        $token = $utilisateur->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inscription réussie.',
            'utilisateur' => $utilisateur,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $utilisateur = Utilisateur::where('email', $request->email)->first();

    if (!$utilisateur || !Hash::check($request->password, $utilisateur->password)) {
        return response()->json(['message' => 'Identifiants invalides.'], 401);
    }

    if ($utilisateur->status !== 'actif') {
        return response()->json([
            'message' => 'Votre compte est désactivé. Contactez l\'administrateur.'
        ], 403);
    }

    $utilisateur->load('role', 'ateliers'); // Make sure this is included

    $token = $utilisateur->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Connexion réussie.',
        'utilisateur' => $utilisateur,
        'token' => $token,
    ]);
}
}