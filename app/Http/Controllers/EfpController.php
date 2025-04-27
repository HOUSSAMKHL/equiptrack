<?php

namespace App\Http\Controllers;

use App\Models\Efp;
use Illuminate\Http\Request;

class EfpController extends Controller
{
    public function index() {
        $Efps = Efp::all();
        return view('Efps.index', compact('Efps'));
    }

    public function create() {
        return view('Efps.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_etablissement' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'id_complexe' => 'required|exists:complexes,id',
        ]);

        Efp::create($request->all());
        return redirect()->route('Efps.index')->with('success', 'Efp créé avec succès.');
    }

    public function show(Efp $Efp) {
        return view('Efps.show', compact('Efp'));
    }

    public function edit(Efp $Efp) {
        return view('Efps.edit', compact('Efp'));
    }

    public function update(Request $request, Efp $Efp) {
        $request->validate([
            'nom_etablissement' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'id_complexe' => 'required|exists:complexes,id',
        ]);
        $Efp->update($request->all());
        return redirect()->route('Efps.index')->with('success', 'Efp mis à jour avec succès.');
    }

    public function destroy(Efp $Efp) {
        $Efp->delete();
        return redirect()->route('Efps.index')->with('success', 'Efp supprimé avec succès.');
    }
}
