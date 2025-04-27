<?php

namespace App\Http\Controllers;

use App\Models\Complexe;
use Illuminate\Http\Request;

class ComplexeController extends Controller
{
    public function index() {
        $complexes = Complexe::all();
        return view('complexe.index', compact('complexes'));
    }

    public function create() {
        return view('complexe.form');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_complexe' => 'required|string|max:255',
            'id_DR' => 'required|exists:direction_regionales,id',
        ]);

        Complexe::create($request->all());
        return redirect()->route('complexe.index')->with('success', 'Complexe créé avec succès.');
    }

    public function show(Complexe $complexe) {
        return view('complexe.show', compact('complexe'));
    }

    public function edit(Complexe $complexe) {
        return view('complexe.form', compact('complexe'));
    }

    public function update(Request $request, Complexe $complexe) {
        $request->validate([
            'nom_complexe' => 'required|string|max:255',
            'id_DR' => 'required|exists:direction_regionales,id',
        ]);
        $complexe->update($request->all());
        return redirect()->route('complexe.index')->with('success', 'Complexe mis à jour.');
    }

    public function destroy(Complexe $complexe) {
        $complexe->delete();
        return redirect()->route('complexe.index')->with('success', 'Complexe supprimé avec succès.');
    }
}
