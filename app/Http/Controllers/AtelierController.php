<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
use Illuminate\Http\Request;

class AtelierController extends Controller
{
    public function index() {
        $ateliers = Atelier::all();
        return view('ateliers.index', compact('ateliers'));
    }

    public function create() {
        return view('ateliers.create');
    }

    public function store(Request $request) {
        $request->validate([
            'numero_atelier' => 'required|string|max:255',
            'id_etablissement' => 'required|exists:etablissements,id',
        ]);

        Atelier::create($request->all());
        return redirect()->route('ateliers.index')->with('success', 'Atelier créé avec succès.');
    }

    public function show(Atelier $atelier) {
        return view('ateliers.show', compact('atelier'));
    }

    public function edit(Atelier $atelier) {
        return view('ateliers.edit', compact('atelier'));
    }

    public function update(Request $request, Atelier $atelier) {
        $request->validate([
            'numero_atelier' => 'required|string|max:255',
            'id_etablissement' => 'required|exists:etablissements,id',
        ]);
        $atelier->update($request->all());
        return redirect()->route('ateliers.index')->with('success', 'Atelier mis à jour.');
    }

    public function destroy(Atelier $atelier) {
        $atelier->delete();
        return redirect()->route('ateliers.index')->with('success', 'Atelier supprimé avec succès.');
    }
}
