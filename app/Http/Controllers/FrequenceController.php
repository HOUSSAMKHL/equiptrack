<?php

namespace App\Http\Controllers;

use App\Models\Frequence;
use Illuminate\Http\Request;

class FrequenceController extends Controller
{
    public function index() {
        $frequences = Frequence::all();
        return response()->json($frequences, 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'type_frequence' => 'required|string|max:255',
        ]);

        $frequence = Frequence::create($validated);

        return response()->json([
            'message' => 'Fréquence créée avec succès.',
            'frequence' => $frequence
        ], 201);
    }

    public function show(Frequence $frequence) {
        return response()->json($frequence, 200);
    }

    public function update(Request $request, Frequence $frequence) {
        $validated = $request->validate([
            'type_frequence' => 'required|string|max:255',
        ]);

        $frequence->update($validated);

        return response()->json([
            'message' => 'Fréquence mise à jour avec succès.',
            'frequence' => $frequence
        ], 200);
    }

    public function destroy(Frequence $frequence) {
        $frequence->delete();

        return response()->json([
            'message' => 'Fréquence supprimée avec succès.'
        ], 204);
    }
}
