<?php

namespace App\Http\Controllers;

use App\Models\EquipementIdentifie;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Frequence;

class EquipementIdentifieController extends Controller
{
    public function index() {
        $equipementsIdentifies = EquipementIdentifie::with(['categorie'])->get();
        return response()->json($equipementsIdentifies, 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nom_equipement' => 'required|string|max:255',
            'secteur' => 'required|string|max:255',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        $equipement = EquipementIdentifie::create($validated);
        return response()->json([
            'message' => 'Équipement identifié créé avec succès.',
            'equipement' => $equipement
        ], 201);
    }

    public function show($id) {
        $equipement = EquipementIdentifie::with(['categorie', ])->findOrFail($id);
        return response()->json($equipement, 200);
    }

    public function update(Request $request, EquipementIdentifie $equipementIdentifie) {
        $validated = $request->validate([
            'nom_equipement' => 'required|string|max:255',
            'secteur' => 'required|string|max:255',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        $equipementIdentifie->update($validated);
        return response()->json([
            'message' => 'Équipement identifié mis à jour avec succès.',
            'equipement' => $equipementIdentifie
        ], 200);
    }

    public function destroy(EquipementIdentifie $equipementIdentifie) {
        $equipementIdentifie->delete();
        return response()->json([
            'message' => 'Équipement identifié supprimé avec succès.'
        ], 204);
    }
}
