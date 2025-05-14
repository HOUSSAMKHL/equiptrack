<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    public function index() {
        $observations = Observation::all();
        return response()->json($observations, 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'description_panne' => 'required|string',
        ]);

        $observation = Observation::create($validated);

        return response()->json([
            'message' => 'Observation créée avec succès.',
            'observation' => $observation
        ], 201);
    }

    public function show(Observation $observation) {
        return response()->json($observation, 200);
    }

    public function update(Request $request, Observation $observation) {
        $validated = $request->validate([
            'description_panne' => 'required|string',
        ]);

        $observation->update($validated);

        return response()->json([
            'message' => 'Observation mise à jour avec succès.',
            'observation' => $observation
        ], 200);
    }

    public function destroy(Observation $observation) {
        $observation->delete();
        return response()->json([
            'message' => 'Observation supprimée avec succès.'
        ], 204);
    }
}
