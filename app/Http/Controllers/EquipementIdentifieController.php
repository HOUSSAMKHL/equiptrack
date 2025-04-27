<?php

namespace App\Http\Controllers;

use App\Models\EquipementIdentifie;
use Illuminate\Http\Request;

class EquipementIdentifieController extends Controller
{
    public function index() {
        $equipements_identifies = EquipementIdentifie::all();
        return view('equipement_identifie.index', compact('equipements_identifies'));
    }

    public function create() {
        return view('equipement_identifie.form');
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

        EquipementIdentifie::create($request->all());
        return redirect()->route('equipement_identifie.index')->with('success', 'Équipement identifié créé avec succès.');
    }

    public function show(EquipementIdentifie $equipementIdentifie) {
        return view('equipement_identifie.show', compact('equipementIdentifie'));
    }

    public function edit(EquipementIdentifie $equipementIdentifie) {
        return view('equipement_identifie.form', compact('equipementIdentifie'));
    }

    public function update(Request $request, EquipementIdentifie $equipementIdentifie) {
        $request->validate([
            'statut' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'annee_dacquisition' => 'required|date_format:Y',
            'valeur_dacquisition' => 'required|numeric',
            'id_atelier' => 'required|exists:ateliers,id',
            'id_equipement' => 'required|exists:equipements,id',
        ]);
        
        $equipementIdentifie->update($request->all());
        return redirect()->route('equipement_identifie.index')->with('success', 'Équipement identifié mis à jour avec succès.');
    }

    public function destroy(EquipementIdentifie $equipementIdentifie) {
        $equipementIdentifie->delete();
        return redirect()->route('equipement_identifie.index')->with('success', 'Équipement identifié supprimé avec succès.');
    }
}
