<?php

namespace App\Http\Controllers;

use App\Models\Anomalie;
use Illuminate\Http\Request;

class AnomalieController extends Controller
{
   public function index()
{
    $anomalies = Anomalie::with([
        'utilisateur',
        'intervenant',
        'equipementTracable.equipementIdentifie'
    ])->get();
    
    return response()->json($anomalies, 200);
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cause_anomalie' => 'required|string',
            'action_corrective' => 'required|string',
            'date_signalement' => 'required|date',
            'duree_panne' => 'required|integer',
            'cout_reparation' => 'required|numeric',
            'anomalie_resolue' => 'required|boolean',
            'pieces_rechange' => 'nullable|string',
            'id_user' => 'required|exists:utilisateurs,id'
        ]);

        $anomalie = Anomalie::create($validated);

        return response()->json([
            'message' => 'Anomalie créée avec succès',
            'anomalie' => $anomalie
        ], 201);
    }

    public function show(Anomalie $anomalie)
    {
        return response()->json($anomalie, 200);
    }

    public function update(Request $request, $id)
    {
        $anomalie = Anomalie::findOrFail($id);

        $validated = $request->validate([
            'cause_anomalie' => 'required|string',
            'action_corrective' => 'required|string',
            'date_signalement' => 'required|date',
            'date_remise' => 'nullable|date',
            'duree_panne' => 'required|integer',
            'cout_reparation' => 'required|numeric',
            'anomalie_resolue' => 'required|boolean',
            'pieces_rechange' => 'nullable|string',
            'id_user' => 'required|exists:utilisateurs,id'
        ]);

        $anomalie->update($validated);

        return response()->json([
            'message' => 'Anomalie mise à jour avec succès',
            'anomalie' => $anomalie
        ], 200);
    }

    public function destroy($id)
    {
        $anomalie = Anomalie::findOrFail($id);
        $anomalie->delete();

        return response()->json([
            'message' => 'Anomalie supprimée avec succès'
        ], 204);
    }
}
