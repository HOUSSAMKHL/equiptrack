<?php

namespace App\Http\Controllers;

use App\Models\DirectionRegionale;
use Illuminate\Http\Request;

class DirectionRegionaleController extends Controller
{
    public function index()
    {
        $directionRegionales = DirectionRegionale::all();
        return response()->json($directionRegionales, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nom_DR' => 'required|string|max:255',
        ]);

        $directionRegionale = DirectionRegionale::create($validated);

        return response()->json([
            'message' => 'Direction régionale créée avec succès.',
            'directionRegionale' => $directionRegionale
        ], 201);
    }

    public function show(DirectionRegionale $directionRegionale)
    {
        return response()->json($directionRegionale, 200);
    }

    public function update(Request $request, DirectionRegionale $directionRegionale)
    {
        $validated = $request->validate([
            'Nom_DR' => 'required|string|max:255',
        ]);

        $directionRegionale->update($validated);

        return response()->json([
            'message' => 'Direction régionale mise à jour.',
            'directionRegionale' => $directionRegionale
        ], 200);
    }

    public function destroy(DirectionRegionale $directionRegionale)
    {
        $directionRegionale->delete();

        return response()->json([
            'message' => 'Direction régionale supprimée avec succès.'
        ], 204);
    }
}
