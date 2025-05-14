<?php

namespace App\Http\Controllers;

use App\Models\Effectuer;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Operation;
use App\Models\EquipementTracable;

class EffectuerController extends Controller
{
    public function index()
    {
        $effectuers = Effectuer::with(['utilisateur', 'equipementTracable', 'operation'])->get();
        return response()->json($effectuers, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:utilisateurs,id',
            'id_exemplaire' => 'required|exists:equipement_tracables,id',
            'id_operation' => 'required|exists:operations,id',
            'date_operation' => 'required|date',
            'durée' => 'nullable|date_format:H:i:s',
        ]);

        $effectuer = Effectuer::create($validated);

        return response()->json([
            'message' => 'Opération effectuée avec succès.',
            'effectuer' => $effectuer
        ], 201);
    }

    public function show(Effectuer $effectuer)
    {
        $effectuer->load(['utilisateur', 'equipementTracable', 'operation']);
        return response()->json($effectuer, 200);
    }

    public function update(Request $request, Effectuer $effectuer)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:utilisateurs,id',
            'id_exemplaire' => 'required|exists:equipement_tracables,id',
            'id_operation' => 'required|exists:operations,id',
            'date_operation' => 'required|date',
            'durée' => 'nullable|date_format:H:i:s',
        ]);

        $effectuer->update($validated);

        return response()->json([
            'message' => 'Opération mise à jour avec succès.',
            'effectuer' => $effectuer
        ], 200);
    }

    public function destroy(Effectuer $effectuer)
    {
        $effectuer->delete();

        return response()->json([
            'message' => 'Opération supprimée avec succès.'
        ], 204);
    }
}
