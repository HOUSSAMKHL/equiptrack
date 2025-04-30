<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
use App\Models\Efp;
use Illuminate\Http\Request;

class AtelierController extends Controller
{
    public function index() {
        $ateliers = Atelier::with('Efp')->get(); 
        return view('ateliers.index', compact('ateliers'));
    }

    public function create() {
        $Efps = Efp::all();
        return view('ateliers.create', compact('Efps'));
    }

    public function store(Request $request) {
        $request->validate([
            'numero_atelier' => 'required|string|max:255',
            'id_etablissement' => 'required|exists:efps,id',
        ]);
        Atelier::create($request->all());
        return redirect()->route('ateliers.index')->with('success', 'Atelier créé avec succès.');
    }

    public function show(Atelier $atelier) {
        return view('ateliers.show', compact('atelier'));
    }

    public function edit(Atelier $atelier) {
        $Efp = Efp::all();
        return view('ateliers.edit', compact('atelier', 'Efp'));
    }

    public function update(Request $request, Atelier $atelier) {
        $request->validate([
            'numero_atelier' => 'required|string|max:255',
            'id_etablissement' => 'required|exists:efps,id',
        ]);
        $atelier->update($request->all());
        return redirect()->route('ateliers.index')->with('success', 'Atelier mis à jour.');
    }

    public function destroy(Atelier $atelier) {
        $atelier->delete();
        return redirect()->route('ateliers.index')->with('success', 'Atelier supprimé avec succès.');
    }
}