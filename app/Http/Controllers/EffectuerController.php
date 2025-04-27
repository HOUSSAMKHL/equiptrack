<?php

namespace App\Http\Controllers;

use App\Models\Effectuer;
use Illuminate\Http\Request;

class EffectuerController extends Controller
{
    public function index() {
        $effectuers = Effectuer::all();
        return view('effectuers.index', compact('effectuers'));
    }

    public function create() {
        return view('effectuers.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_exemplaire' => 'required|exists:exemplaires,id',
            'id_operation' => 'required|exists:operations,id',
            'date_operation' => 'required|date',
            'durée' => 'nullable|date_format:H:i:s',
        ]);

        Effectuer::create($request->all());
        return redirect()->route('effectuers.index')->with('success', 'Opération effectuée avec succès.');
    }

    public function show(Effectuer $effectuer) {
        return view('effectuers.show', compact('effectuer'));
    }

    public function edit(Effectuer $effectuer) {
        return view('effectuers.edit', compact('effectuer'));
    }

    public function update(Request $request, Effectuer $effectuer) {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_exemplaire' => 'required|exists:exemplaires,id',
            'id_operation' => 'required|exists:operations,id',
            'date_operation' => 'required|date',
            'durée' => 'nullable|date_format:H:i:s',
        ]);
        $effectuer->update($request->all());
        return redirect()->route('effectuers.index')->with('success', 'Opération mise à jour avec succès.');
    }

    public function destroy(Effectuer $effectuer) {
        $effectuer->delete();
        return redirect()->route('effectuers.index')->with('success', 'Opération supprimée avec succès.');
    }
}
