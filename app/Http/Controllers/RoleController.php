<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create() {
        return view('role.form');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_role' => 'required|string|max:255',
        ]);

        Role::create($request->all());
        return redirect()->route('role.index')->with('success', 'Rôle créé avec succès.');
    }

    public function show(Role $role) {
        return view('role.show', compact('role'));
    }

    public function edit(Role $role) {
        return view('role.form', compact('role'));
    }

    public function update(Request $request, Role $role) {
        $request->validate([
            'nom_role' => 'required|string|max:255',
        ]);

        $role->update($request->all());
        return redirect()->route('role.index')->with('success', 'Rôle mis à jour avec succès.');
    }

    public function destroy(Role $role) {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Rôle supprimé avec succès.');
    }
}
