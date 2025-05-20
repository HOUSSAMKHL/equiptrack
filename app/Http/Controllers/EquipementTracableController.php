<?php

namespace App\Http\Controllers;

use App\Models\EquipementTracable;
use Illuminate\Http\Request;
use App\Models\Atelier;
use App\Models\EquipementIdentifie;

class EquipementTracableController extends Controller
{
    public function index() {
        $equipementsTracables = EquipementTracable::with(['atelier', 'equipementIdentifie'])->get();
        return response()->json($equipementsTracables, 200);
    }

    public function getStatusOptions() {
        return response()->json([
            'status_options' => [
                'Opérationnel',
                'En maintenance',
                'Hors service'
            ]
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'statut' => 'required|string|in:Opérationnel,En maintenance,Hors service',
            'reference' => 'required|string|max:255',
            'annee_dacquisition' => 'required|date_format:Y',
            'valeur_dacquisition' => 'required|numeric',
            'id_atelier' => 'required|exists:ateliers,id',
            'id_equipement' => 'required|exists:equipement_identifies,id',
        ]);

        $equipement = EquipementTracable::create($validated);
        return response()->json([
            'message' => 'Équipement tracable créé avec succès',
            'equipement' => $equipement
        ], 201);
    }

    public function show($id) {
        $equipement = EquipementTracable::with(['atelier', 'equipementIdentifie'])->findOrFail($id);
        return response()->json($equipement, 200);
    }

    public function update(Request $request, EquipementTracable $equipementTracable) {
        $validated = $request->validate([
            'statut' => 'required|string|in:Opérationnel,En maintenance,Hors service',
            'reference' => 'required|string|max:255',
            'annee_dacquisition' => 'required|date_format:Y',
            'valeur_dacquisition' => 'required|numeric',
            'id_atelier' => 'required|exists:ateliers,id',
            'id_equipement' => 'required|exists:equipement_identifies,id',
        ]);

        $equipementTracable->update($validated);
        return response()->json([
            'message' => 'Équipement tracable mis à jour',
            'equipement' => $equipementTracable
        ], 200);
    }

    public function destroy(EquipementTracable $equipementTracable) {
        $equipementTracable->delete();
        return response()->json([
            'message' => 'Équipement supprimé'
        ], 204);
    }
}