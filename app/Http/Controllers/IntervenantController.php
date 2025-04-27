<?php

namespace App\Http\Controllers;

use App\Models\Intervenant;
use Illuminate\Http\Request;

class IntervenantController extends Controller
{
    public function index() {
        $intervenants = Intervenant::all();
        return view('intervenants.index', compact('intervenants'));
    }

    public function create() {
        return view('intervenants.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_intervenant' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
        ]);

        Intervenant::create($request->all());
        return redirect()->route('intervenants.index')->with('success', 'Intervenant créé avec succès.');
    }

    public function show(Intervenant $intervenant) {
        return view('intervenants.show', compact('intervenant'));
    }

    public function edit(Intervenant $intervenant) {
        return view('intervenants.edit', compact('intervenant'));
    }

    public function update(Request $request, Intervenant $intervenant) {
        $request->validate([
            'nom_intervenant' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
        ]);

        $intervenant->update($request->all());
        return redirect()->route('intervenants.index')->with('success', 'Intervenant mis à jour avec succès.');
    }

    public function destroy(Intervenant $intervenant) {
        $intervenant->delete();
        return redirect()->route('intervenants.index')->with('success', 'Intervenant supprimé avec succès.');
    }
}
