<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
use App\Models\Efp;
use Illuminate\Http\Request;

class AtelierController extends Controller
{
    public function index()
    {
        $ateliers = Atelier::with('efp')->get();
        return response()->json($ateliers, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_atelier' => 'required|string|max:255',
            'id_etablissement' => 'required|exists:efps,id',
        ]);

        $atelier = Atelier::create($validated);

        return response()->json([
            'message' => 'Atelier créé avec succès',
            'atelier' => $atelier
        ], 201);
    }

    public function show(Atelier $atelier)
    {
        $atelier->load('efp');
        return response()->json($atelier, 200);
    }

    public function update(Request $request, Atelier $atelier)
    {
        $validated = $request->validate([
            'numero_atelier' => 'required|string|max:255',
            'id_etablissement' => 'required|exists:efps,id',
        ]);

        $atelier->update($validated);

        return response()->json([
            'message' => 'Atelier mis à jour avec succès',
            'atelier' => $atelier
        ], 200);
    }

    public function destroy(Atelier $atelier)
    {
        $atelier->delete();

        return response()->json([
            'message' => 'Atelier supprimé avec succès'
        ], 204);
    }
}
