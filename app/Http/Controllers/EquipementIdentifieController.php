<?php

namespace App\Http\Controllers;

use App\Models\EquipementIdentifie;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Frequence;

class EquipementIdentifieController extends Controller
{
    public function index() {
        $equipements_identifies = EquipementIdentifie::with('frequence')->get();
        
        return view('equipements_identifies.index', compact('equipements_identifies'));
    }
    
    
    

    public function create() {
        $categories = Categorie::all();
        $frequences = Frequence::all();
        return view('equipements_identifies.create', compact('categories', 'frequences'));
    }

    public function store(Request $request) {
        $request->validate([
            'nom_equipement' => 'required|string|max:255',
            'secteur' => 'required|string|max:255',
            'id_categorie' => 'required|exists:categories,id',
            'id_frequence' => 'required|exists:frequences,id',
        ]);

        EquipementIdentifie::create($request->all());
        return redirect()->route('equipements_identifies.index')->with('success', 'Équipement identifié créé avec succès.');
    }

    public function show($id)
{
    $equipementIdentifie = EquipementIdentifie::with(['categorie', 'frequence'])
                      ->findOrFail($id);
    
    return view('equipements_Identifies.show', compact('equipementIdentifie'));
}

    public function edit(EquipementIdentifie $equipementIdentifie) {
        $categories = Categorie::all();
        $frequences = Frequence::all();
        return view('equipements_identifies.edit', compact('equipementIdentifie', 'categories', 'frequences'));
    }

    public function update(Request $request, EquipementIdentifie $equipementIdentifie) {
        $request->validate([
            'nom_equipement' => 'required|string|max:255',
            'secteur' => 'required|string|max:255',
            'id_categorie' => 'required|exists:categories,id',
            'id_frequence' => 'required|exists:frequences,id',
        ]);
        
        $equipementIdentifie->update($request->all());
        return redirect()->route('equipements_identifies.index')->with('success', 'Équipement identifié mis à jour avec succès.');
    }

    public function destroy(EquipementIdentifie $equipementIdentifie) {
        $equipementIdentifie->delete();
        return redirect()->route('equipements_identifies.index')->with('success', 'Équipement identifié supprimé avec succès.');
    }
}
