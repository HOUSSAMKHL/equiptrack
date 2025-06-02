<?php

namespace App\Http\Controllers;

use App\Models\Anomalie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnomalieController extends Controller
{
    public function index()
    {
        $anomalies = Anomalie::with([
            'utilisateur',
            'intervenant',
            'equipementTracable.equipementIdentifie.categorie'
        ])->get();
        
        return response()->json($anomalies, 200);
    }

    public function store(Request $request) {
    $validated = $request->validate([
        'cause_anomalie' => 'required|string',
        'action_corrective' => 'nullable|string',
        'date_signalement' => 'required|date',
        'priorite' => 'required|in:basse,haute,moyenne',
        'status' => 'required|in:Non résolu,En cours,Résolu,Hors service',
        'duree_panne' => 'nullable|integer|min:0',
        'cout_reparation' => 'nullable|numeric|min:0',
        'anomalie_resolue' => 'required|boolean',
        'pieces_rechange' => 'nullable|string',
        'id_equipement' => 'required|exists:equipement_tracables,id',
        'id_intervenant' => 'nullable|exists:intervenants,id',
        'id_user' => 'required|exists:utilisateurs,id'
    ]);

    // Ensure status is "Non résolu" when no intervenant is specified
    if (empty($validated['id_intervenant']) && $validated['status'] !== 'Non résolu') {
        $validated['status'] = 'Non résolu';
    }

    $anomalie = Anomalie::create($validated);

    return response()->json([
        'message' => 'Anomalie créée avec succès',
        'anomalie' => $anomalie->load([
            'utilisateur',
            'intervenant',
            'equipementTracable.equipementIdentifie.categorie'
        ])
    ], 201);
}

    public function show(Anomalie $anomalie)
    {
        return response()->json($anomalie->load([
            'utilisateur',
            'intervenant',
            'equipementTracable.equipementIdentifie.categorie'
        ]), 200);
    }

    public function update(Request $request, Anomalie $anomalie) {
    $validated = $request->validate([
        'cause_anomalie' => 'required|string',
        'action_corrective' => 'nullable|string',
        'date_signalement' => 'required|date',
        'date_remise' => 'nullable|date',
        'priorite' => 'required|in:basse,haute,moyenne',
        'status' => 'required|in:Non résolu,En cours,Résolu,Hors service',
        'duree_panne' => 'nullable|integer|min:0',
        'cout_reparation' => 'nullable|numeric|min:0',
        'anomalie_resolue' => 'required|boolean',
        'pieces_rechange' => 'nullable|string',
        'id_equipement' => 'required|exists:equipement_tracables,id',
        'id_intervenant' => 'nullable|exists:intervenants,id',
        'id_user' => 'required|exists:utilisateurs,id'
    ]);

    // Automatically update status to "En cours" when an intervenant is assigned
    if (!empty($validated['id_intervenant']) && $anomalie->status === 'Non résolu') {
        $validated['status'] = 'En cours';
    }

    $anomalie->update($validated);

    return response()->json([
        'message' => 'Anomalie mise à jour avec succès',
        'anomalie' => $anomalie->load([
            'utilisateur',
            'intervenant',
            'equipementTracable.equipementIdentifie.categorie'
        ])
    ], 200);
}
}