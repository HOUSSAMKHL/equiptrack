<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens; // si vous utilisez Sanctum

class UtilisateurController extends Controller
{
    public function index() {
        $utilisateurs = Utilisateur::with('role')->get();
        return response()->json($utilisateurs, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'nom_user' => 'required|string|max:255',
            'age' => 'required|integer',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'id_roles' => 'required|exists:roles,id',
        ]);

        // Préparer les données pour la création
        $data = $request->all();
        $data['password'] = Hash::make($data['password']); // Hasher le mot de passe

        $utilisateur = Utilisateur::create($data);

        return response()->json([
            'message' => 'Utilisateur créé avec succès.',
            'utilisateur' => $utilisateur
        ], 201);
    }

    public function show(Utilisateur $utilisateur) {
        return response()->json($utilisateur, 200);
    }

    public function update(Request $request, Utilisateur $utilisateur) {
        $request->validate([
            'nom_user' => 'required|string|max:255',
            'age' => 'required|integer',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'id_roles' => 'required|exists:roles,id',
        ]);

        $data = $request->all();

        if (!empty($data['password'])) {
            // Hasher le mot de passe
            $data['password'] = Hash::make($data['password']);
        } else {
            // Ne pas écraser le mot de passe existant si aucun nouveau mot de passe fourni
            unset($data['password']);
        }

        $utilisateur->update($data);

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès.',
            'utilisateur' => $utilisateur
        ], 200);
    }

    public function destroy(Utilisateur $utilisateur) {
        $utilisateur->delete();
        return response()->json([
            'message' => 'Utilisateur supprimé avec succès.'
        ], 204);
    }
    
    // Enregistrement (Register)
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

    $data = $request->all();
    $data['password'] = Hash::make($data['password']);

    $utilisateur = Utilisateur::create($data);

    $token = $utilisateur->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Inscription réussie.',
        'utilisateur' => $utilisateur,
        'token' => $token,
    ], 201);
}

// Connexion (Login)
public function login(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $utilisateur = Utilisateur::where('email', $request->email)->first();

    if (!$utilisateur || !Hash::check($request->password, $utilisateur->password)) {
        return response()->json(['message' => 'Identifiants invalides.'], 401);
    }

    // 🔁 Charger la relation 'role'
    $utilisateur->load('role');

    $token = $utilisateur->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Connexion réussie.',
        'utilisateur' => $utilisateur,
        'token' => $token,
    ]);
}


}
