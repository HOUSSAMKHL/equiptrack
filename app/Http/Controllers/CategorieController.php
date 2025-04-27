<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index() {
        $categories = Categorie::all();
        return view('categorie.index', compact('categories'));
    }

    public function create() {
        return view('categorie.form');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_categorie' => 'required|string|max:255',
        ]);

        Categorie::create($request->all());
        return redirect()->route('categorie.index')->with('success', 'Catégorie créée avec succès.');
    }

    public function show(Categorie $categorie) {
        return view('categorie.show', compact('categorie'));
    }

    public function edit(Categorie $categorie) {
        return view('categorie.form', compact('categorie'));
    }

    public function update(Request $request, Categorie $categorie) {
        $request->validate([
            'nom_categorie' => 'required|string|max:255',
        ]);
        $categorie->update($request->all());
        return redirect()->route('categorie.index')->with('success', 'Catégorie mise à jour.');
    }

    public function destroy(Categorie $categorie) {
        $categorie->delete();
        return redirect()->route('categorie.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
