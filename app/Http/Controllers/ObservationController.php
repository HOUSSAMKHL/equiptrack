<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    public function index() {
        $observations = Observation::all();
        return view('observation.index', compact('observations'));
    }

    public function create() {
        return view('observation.form');
    }

    public function store(Request $request) {
        $request->validate([
            'description_panne' => 'required|string',
        ]);

        Observation::create($request->all());
        return redirect()->route('observation.index')->with('success', 'Observation créée avec succès.');
    }

    public function show(Observation $observation) {
        return view('observation.show', compact('observation'));
    }

    public function edit(Observation $observation) {
        return view('observation.form', compact('observation'));
    }

    public function update(Request $request, Observation $observation) {
        $request->validate([
            'description_panne' => 'required|string',
        ]);
        $observation->update($request->all());
        return redirect()->route('observation.index')->with('success', 'Observation mise à jour.');
    }

    public function destroy(Observation $observation) {
        $observation->delete();
        return redirect()->route('observation.index')->with('success', 'Observation supprimée avec succès.');
    }
}
