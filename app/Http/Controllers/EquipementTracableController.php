<?php

namespace App\Http\Controllers;

use App\Models\EquipementTracable;
use Illuminate\Http\Request;

class EquipementTracableController extends Controller
{
    public function index() {
        $equipements_tracables = EquipementTracable::all();
        return view('equipement_tracable.index', compact('equipements_tracables'));
    }

    public function create() {
        return view('equipement_tracable.form');
    }

    public function store(Request $request) {
        $request->validate([
            'statut' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'annee_dacquisition' => 'required|date_format:Y',
            'valeur_dacquisition' => 'required|numeric',
            'id_atelier' => 'required|exists:ateliers,id',
            'id_equipement' => 'required|exists:equipements,id',
        ]);

        EquipementTracable::create($request->all());
        return redirect()->route('equipement_tracable.index')->with('success', 'Équipement tracable créé avec succès.');
    }

    public function show(EquipementTracable $equipementTracable) {
        return view('equipement_tracable.show', compact('equipementTracable'));
    }

    public function edit(EquipementTracable $equipementTracable) {
        return view('equipement_tracable.form', compact('equipementTracable'));
    }

    public function update(Request $request, EquipementTracable $equipementTracable) {
        $request->validate([
            'statut' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'annee_dacquisition' => 'required|date_format:Y',
            'valeur_dacquisition' => 'required|numeric',
            'id_atelier' => 'required|exists:ateliers,id',
            'id_equipement' => 'required|exists:equipements,id',
        ]);
        
        $equipementTracable->update($request->all());
        return redirect()->route('equipement_tracable.index')->with('success', 'Équipement tracable mis à jour avec succès.');
    }

    public function destroy(EquipementTracable $equipementTracable) {
        $equipementTracable->delete();
        return redirect()->route('equipement_tracable.index')->with('success', 'Équipement tracable supprimé avec succès.');
    }
}
