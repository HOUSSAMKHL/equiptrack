<?php

namespace App\Http\Controllers;

use App\Models\Anomalie;
use Illuminate\Http\Request;

class AnomalieController extends Controller
{
    public function index() {
        $anomalies = Anomalie::with('utilisateur')->get();
        return view('anomalies.index', compact('anomalies'));
    }

    public function create() {
        return view('anomalies.create');
    }

    public function store(Request $request) {
        $request->validate([
            'cause_anomalie' => 'required|string',
            'action_corrective' => 'required|string',
            'date_signalement' => 'required|date',
            'duree_panne' => 'required|integer',
            'cout_reparation' => 'required|numeric',
            'anomalie_resolue' => 'required|boolean',
        ]);

        Anomalie::create($request->all());
        return redirect()->route('anomalies.index')->with('success', 'Anomalie signalée avec succès.');
    }

    public function show(Anomalie $anomalie) {
        return view('anomalies.show', compact('anomalie'));
    }

    public function edit($anomalie)
    {
        $anomalie = Anomalie::find($anomalie);
        return view('anomalies.edit', compact('anomalie'));
    }
    
    public function update(Request $request, $id) {
        $anomalie = Anomalie::find($id);
        
        $validated = $request->validate([
            'cause_anomalie' => 'required|string',
            'action_corrective' => 'required|string',
            'date_signalement' => 'required|date',
            'date_remise' => 'nullable|date',
            'duree_panne' => 'required|integer',
            'cout_reparation' => 'required|numeric',
            'anomalie_resolue' => 'required|boolean',
            'pieces_rechange' => 'nullable|string',
            'id_user' => 'required|exists:users,id'
        ]);
        
        if ($anomalie->update($validated)) {
            return redirect()->route('anomalies.index')
                   ->with('success', 'Anomalie mise à jour avec succès');
        }
        
        return back()->with('error', 'Échec de la mise à jour');
    }

    public function destroy($id)
{
    try {
        $anomalie = Anomalie::findOrFail($id);
        $anomalie->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Anomalie supprimée avec succès'
        ]);
        
        // Ou pour une redirection classique :
        // return redirect()->route('anomalies.index')->with('success', 'Suppression réussie');
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors de la suppression: ' . $e->getMessage()
        ], 500);
        
        // Ou pour une redirection classique :
        // return back()->with('error', 'Erreur lors de la suppression');
    }
}
}
