<?php

namespace App\Http\Controllers;

use App\Models\DirectionRegionale;
use Illuminate\Http\Request;

class DirectionRegionaleController extends Controller
{
    public function index() {
        $directionRegionale = DirectionRegionale::all();
        return view('direction_regionales.index', compact('directionRegionale'));
    }

    public function create() {
        return view('direction_regionales.create');
    }

    public function store(Request $request) {
        $request->validate([
            'Nom_DR' => 'required|string|max:255',
        ]);

        DirectionRegionale::create($request->all());
        return redirect()->route('direction_regionales.index')->with('success', 'Direction régionale créée avec succès.');
    }

    public function show(DirectionRegionale $directionRegionale) {
        return view('direction_regionales.show', compact('directionRegionale'));
    }

    public function edit(DirectionRegionale $directionRegionale) {
        return view('direction_regionales.edit', compact('directionRegionale'));
    }

    public function update(Request $request, DirectionRegionale $directionRegionale) {
        $request->validate([
            'Nom_DR' => 'required|string|max:255',
        ]);
        $directionRegionale->update($request->all());
        return redirect()->route('direction_regionales.index')->with('success', 'Direction régionale mise à jour.');
    }

    public function destroy(DirectionRegionale $directionRegionale) {
        $directionRegionale->delete();
        return redirect()->route('direction_regionales.index')->with('success', 'Direction régionale supprimée avec succès.');
    }
}
