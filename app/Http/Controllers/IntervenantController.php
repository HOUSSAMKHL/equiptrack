<?php

namespace App\Http\Controllers;

use App\Models\Intervenant;
use Illuminate\Http\Request;

class IntervenantController extends Controller
{
    public function index() {
        $intervenants = Intervenant::all();
        return response()->json($intervenants, 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nom_intervenant' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
        ]);

        $intervenant = Intervenant::create($validated);

        return response()->json([
            'message' => 'Intervenant créé avec succès.',
            'intervenant' => $intervenant
        ], 201);
    }

    public function show(Intervenant $intervenant) {
        return response()->json($intervenant, 200);
    }

    public function update(Request $request, Intervenant $intervenant) {
        $validated = $request->validate([
            'nom_intervenant' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
        ]);

        $intervenant->update($validated);

        return response()->json([
            'message' => 'Intervenant mis à jour avec succès.',
            'intervenant' => $intervenant
        ], 200);
    }

    public function destroy(Intervenant $intervenant) {
        $intervenant->delete();
        return response()->json([
            'message' => 'Intervenant supprimé avec succès.'
        ], 204);
    }
}
