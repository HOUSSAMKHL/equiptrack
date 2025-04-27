<?php

namespace App\Http\Controllers;

use App\Models\EquipementIdentifie;
use Illuminate\Http\Request;

class EquipementIdentifieController extends Controller
{
    public function index() {
        $equipements_identifies = EquipementIdentifie::with('frequence')->get();
        
        return view('equipements_identifies.index', compact('equipements_identifies'));
    }
    
    
    

    public function create() {
        return view('equipements_identifies.create');
    }

    public function store(Request $request) {
        $request->validate([
            'statut' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'annee_dacquisition' => 'required|date_format:Y',
            'valeur_dacquisition' => 'required|numeric',
            'id_atelier' => 'required|exists:ateliers,id',
            'id_frequence' => 'required|exists:frequences,id',
        ]);

        EquipementIdentifie::create($request->all());
        return redirect()->route('equipements_identifies.index')->with('success', 'Équipement identifié créé avec succès.');
    }

    public function show(EquipementIdentifie $equipementIdentifie) {
        return view('equipements_identifies.show', compact('equipementIdentifie'));
    }

    public function edit(EquipementIdentifie $equipementIdentifie) {
        return view('equipements_identifies.edit', compact('equipementIdentifie'));
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
        return redirect()->route('equipements_identifies.index')->with('success', 'Équipement identifié mis à jour avec succès.');
    }

    public function destroy(EquipementIdentifie $equipementIdentifie) {
        $equipementIdentifie->delete();
        return redirect()->route('equipements_identifies.index')->with('success', 'Équipement identifié supprimé avec succès.');
    }
}
