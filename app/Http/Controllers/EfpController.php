<?php

namespace App\Http\Controllers;

use App\Models\Efp;
use Illuminate\Http\Request;
use App\Models\Complexe;

class EfpController extends Controller
{
    public function index() {
        $efps = Efp::with('complexe')->get(); // Ajout de la relation complexe si elle existe
        return response()->json($efps, 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nom_etablissement' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'id_complexe' => 'required|exists:complexes,id',
        ]);

        $efp = Efp::create($validated);
        return response()->json([
            'message' => 'EFP créé avec succès.',
            'efp' => $efp
        ], 201);
    }

    public function show(Efp $efp) {
        $efp->load('complexe'); // Relation si définie
        return response()->json($efp, 200);
    }

    public function update(Request $request, Efp $efp) {
        $validated = $request->validate([
            'nom_etablissement' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'id_complexe' => 'required|exists:complexes,id',
        ]);

        $efp->update($validated);
        return response()->json([
            'message' => 'EFP mis à jour avec succès.',
            'efp' => $efp
        ], 200);
    }

    public function destroy(Efp $efp) {
        $efp->delete();
        return response()->json([
            'message' => 'EFP supprimé avec succès.'
        ], 204);
    }
}
