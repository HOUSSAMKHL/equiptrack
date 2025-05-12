<?php 
namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class UtilisateurController extends Controller
{
    public function index() {
        $utilisateurs = Utilisateur::all();
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    public function create() {
        $roles = Role::all();
        return view('utilisateurs.create', compact('roles'));
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

        // Prepare data for creation
        $data = $request->all();
        $data['password'] = Hash::make($data['password']); // Hash password here

        Utilisateur::create($data);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(Utilisateur $utilisateur) {
        return view('utilisateurs.show', compact('utilisateur'));
    }

    public function edit(Utilisateur $utilisateur) {
        $roles = Role::all();
        return view('utilisateurs.edit', compact('utilisateur', 'roles'));
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
        // Hasher le nouveau mot de passe
        $data['password'] = Hash::make($data['password']);
    } else {
        // Ne pas écraser le mot de passe existant si aucun nouveau mot de passe fourni
        unset($data['password']);
    }

    $utilisateur->update($data);

    return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
}


    public function destroy(Utilisateur $utilisateur) {
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
