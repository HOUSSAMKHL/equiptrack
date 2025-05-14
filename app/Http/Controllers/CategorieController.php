<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_categorie' => 'required|string|max:255',
        ]);

        $categorie = Categorie::create($validated);

        return response()->json([
            'message' => 'Catégorie créée avec succès',
            'categorie' => $categorie
        ], 201);
    }

    public function show(Categorie $categorie)
    {
        return response()->json($categorie, 200);
    }

    public function update(Request $request, Categorie $categorie)
    {
        $validated = $request->validate([
            'nom_categorie' => 'required|string|max:255',
        ]);

        $categorie->update($validated);

        return response()->json([
            'message' => 'Catégorie mise à jour avec succès',
            'categorie' => $categorie
        ], 200);
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return response()->json([
            'message' => 'Catégorie supprimée avec succès'
        ], 204);
    }
}
