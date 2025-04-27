<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index() {
        $utilisateurs = Utilisateur::all();
        return view('utilisateur.index', compact('utilisateurs'));
    }

    public function create() {
        return view('utilisateur.form');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_user' => 'required|string|max:255',
            'age' => 'required|integer',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'id_roles' => 'required|exists:roles,id',  // Assurez-vous que le rôle existe dans la table roles
        ]);

        Utilisateur::create($request->all());
        return redirect()->route('utilisateur.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(Utilisateur $utilisateur) {
        return view('utilisateur.show', compact('utilisateur'));
    }

    public function edit(Utilisateur $utilisateur) {
        return view('utilisateur.form', compact('utilisateur'));
    }

    public function update(Request $request, Utilisateur $utilisateur) {
        $request->validate([
            'nom_user' => 'required|string|max:255',
            'age' => 'required|integer',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'id_roles' => 'required|exists:roles,id',  // Assurez-vous que le rôle existe dans la table roles
        ]);

        $utilisateur->update($request->all());
        return redirect()->route('utilisateur.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(Utilisateur $utilisateur) {
        $utilisateur->delete();
        return redirect()->route('utilisateur.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
