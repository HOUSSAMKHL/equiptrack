<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return response()->json($roles, 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nom_role' => 'required|string|max:255',
        ]);

        $role = Role::create($validated);

        return response()->json([
            'message' => 'Rôle créé avec succès.',
            'role' => $role
        ], 201);
    }

    public function show(Role $role) {
        return response()->json($role, 200);
    }

    public function update(Request $request, Role $role) {
        $validated = $request->validate([
            'nom_role' => 'required|string|max:255',
        ]);

        $role->update($validated);

        return response()->json([
            'message' => 'Rôle mis à jour avec succès.',
            'role' => $role
        ], 200);
    }

    public function destroy(Role $role) {
        $role->delete();
        return response()->json([
            'message' => 'Rôle supprimé avec succès.'
        ], 204);
    }
}
