<?php

namespace App\Http\Controllers;

use App\Models\Complexe;
use App\Models\DirectionRegionale;
use Illuminate\Http\Request;

class ComplexeController extends Controller
{
    public function index()
    {
        $complexes = Complexe::with('directionRegionale')->get();
        return response()->json($complexes, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_complexe' => 'required|string|max:255',
            'id_DR' => 'required|exists:direction_regionales,id',
        ]);

        $complexe = Complexe::create($validated);

        return response()->json([
            'message' => 'Complexe créé avec succès',
            'complexe' => $complexe
        ], 201);
    }

    public function show(Complexe $complexe)
    {
        $complexe->load('directionRegionale');
        return response()->json($complexe, 200);
    }

    public function update(Request $request, Complexe $complexe)
    {
        $validated = $request->validate([
            'nom_complexe' => 'required|string|max:255',
            'id_DR' => 'required|exists:direction_regionales,id',
        ]);

        $complexe->update($validated);

        return response()->json([
            'message' => 'Complexe mis à jour avec succès',
            'complexe' => $complexe
        ], 200);
    }

    public function destroy(Complexe $complexe)
    {
        $complexe->delete();

        return response()->json([
            'message' => 'Complexe supprimé avec succès'
        ], 204);
    }
}
