<?php

namespace App\Http\Controllers;

use App\Models\EquipementTracable;
use Illuminate\Http\Request;
use App\Models\Atelier;
use App\Models\EquipementIdentifie;

class EquipementTracableController extends Controller
{
    public function index() {
        $equipementsTracables = EquipementTracable::with(['atelier', 'equipementIdentifie','frequence'])->get();
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
            'id_frequence' => 'nullable|exists:frequences,id',
        ]);

        $equipement = EquipementTracable::create($validated);
        return response()->json([
            'message' => 'Équipement tracable créé avec succès',
            'equipement' => $equipement
        ], 201);
    }

    public function show($id) {
$equipement = EquipementTracable::with(['atelier', 'equipementIdentifie', 'frequence'])->findOrFail($id);
        return response()->json($equipement, 200);
    }

    // In EquipementTracableController.php
public function update(Request $request, EquipementTracable $equipementTracable) {
    $validated = $request->validate([
        'statut' => 'required|string|in:Opérationnel,En maintenance,Hors service',
        'reference' => 'required|string|max:255',
        'annee_dacquisition' => 'required|date_format:Y',
        'valeur_dacquisition' => 'required|numeric',
        'id_atelier' => 'required|exists:ateliers,id',
        'id_equipement' => 'required|exists:equipement_identifies,id',
        'id_frequence' => 'nullable|exists:frequences,id',
    ]);

    $equipementTracable->update($validated);
    
    // If setting to "Hors service", create or update an anomaly
    if ($validated['statut'] === 'Hors service') {
        Anomalie::updateOrCreate(
            ['id_equipement' => $equipementTracable->id, 'status' => 'Non résolu'],
            [
                'cause_anomalie' => 'Défaillance signalée',
                'date_signalement' => now(),
                'priorite' => 'high',
                'status' => 'Non résolu',
                'id_user' => auth()->id()
            ]
        );
    }

    return response()->json([
        'message' => 'Équipement tracable mis à jour',
        'equipement' => $equipementTracable
    ], 200);
}
}