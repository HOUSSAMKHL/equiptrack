<?php

namespace App\Http\Controllers;

use App\Models\Anomalie;
use Illuminate\Http\Request;

class AnomalieController extends Controller
{
    public function index() {
        $anomalies = Anomalie::all();
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

    public function edit(Anomalie $anomalie) {
        return view('anomalies.edit', compact('anomalie'));
    }

    public function update(Request $request, Anomalie $anomalie) {
        $request->validate([
            'cause_anomalie' => 'required|string',
            'action_corrective' => 'required|string',
            'date_signalement' => 'required|date',
            'duree_panne' => 'required|integer',
            'cout_reparation' => 'required|numeric',
            'anomalie_resolue' => 'required|boolean',
        ]);
        $anomalie->update($request->all());
        return redirect()->route('anomalies.index')->with('success', 'Anomalie mise à jour.');
    }

    public function destroy(Anomalie $anomalie) {
        $anomalie->delete();
        return redirect()->route('anomalies.index')->with('success', 'Anomalie supprimée avec succès.');
    }
}
