<?php

namespace App\Http\Controllers;

use App\Models\DirectionRegionale;
use Illuminate\Http\Request;

class DirectionRegionaleController extends Controller
{
    public function index() {
        $directions = DirectionRegionale::all();
        return view('directionRegionale.index', compact('directions'));
    }

    public function create() {
        return view('directionRegionale.form');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_direction_regionale' => 'required|string|max:255',
        ]);

        DirectionRegionale::create($request->all());
        return redirect()->route('directionRegionale.index')->with('success', 'Direction régionale créée avec succès.');
    }

    public function show(DirectionRegionale $direction) {
        return view('directionRegionale.show', compact('direction'));
    }

    public function edit(DirectionRegionale $direction) {
        return view('directionRegionale.form', compact('direction'));
    }

    public function update(Request $request, DirectionRegionale $direction) {
        $request->validate([
            'nom_direction_regionale' => 'required|string|max:255',
        ]);
        $direction->update($request->all());
        return redirect()->route('directionRegionale.index')->with('success', 'Direction régionale mise à jour.');
    }

    public function destroy(DirectionRegionale $direction) {
        $direction->delete();
        return redirect()->route('directionRegionale.index')->with('success', 'Direction régionale supprimée avec succès.');
    }
}
