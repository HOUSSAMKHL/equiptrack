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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cause_anomalie' => 'required|string',
            'action_corrective' => 'nullable|string',
            'date_signalement' => 'required|date',
            'priorite' => 'required|in:low,high,medium',
            'status' => 'required|in:En cours,Résolu,Non résolu',
            'duree_panne' => 'nullable|integer|min:0',
            'cout_reparation' => 'nullable|numeric|min:0',
            'anomalie_resolue' => 'required|boolean',
            'pieces_rechange' => 'nullable|string',
            'id_equipement' => 'required|exists:equipement_tracables,id',
            'id_intervenant' => 'required|exists:intervenants,id',
            'id_user' => 'required|exists:utilisateurs,id'
        ]);

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

    public function update(Request $request, Anomalie $anomalie)
    {
        $validated = $request->validate([
            'cause_anomalie' => 'required|string',
            'action_corrective' => 'nullable|string',
            'date_signalement' => 'required|date',
            'date_remise' => 'nullable|date',
            'priorite' => 'required|in:low,high,medium',
            'status' => 'required|in:En cours,Résolu,Non résolu',
            'duree_panne' => 'nullable|integer|min:0',
            'cout_reparation' => 'nullable|numeric|min:0',
            'anomalie_resolue' => 'required|boolean',
            'pieces_rechange' => 'nullable|string',
            'id_equipement' => 'required|exists:equipement_tracables,id',
            'id_intervenant' => 'required|exists:intervenants,id',
            'id_user' => 'required|exists:utilisateurs,id'
        ]);

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

    public function destroy(Anomalie $anomalie)
    {
        $anomalie->delete();
        return response()->json([
            'message' => 'Anomalie supprimée avec succès'
        ], 204);
    }
}