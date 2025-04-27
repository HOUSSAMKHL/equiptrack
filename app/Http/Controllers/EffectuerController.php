<?php

namespace App\Http\Controllers;

use App\Models\Effectuer;
use Illuminate\Http\Request;

class EffectuerController extends Controller
{
    public function index() {
        $effectuers = Effectuer::all();
        return view('effectuer.index', compact('effectuers'));
    }

    public function create() {
        return view('effectuer.form');
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
        return redirect()->route('effectuer.index')->with('success', 'Opération effectuée avec succès.');
    }

    public function show(Effectuer $effectuer) {
        return view('effectuer.show', compact('effectuer'));
    }

    public function edit(Effectuer $effectuer) {
        return view('effectuer.form', compact('effectuer'));
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
        return redirect()->route('effectuer.index')->with('success', 'Opération mise à jour avec succès.');
    }

    public function destroy(Effectuer $effectuer) {
        $effectuer->delete();
        return redirect()->route('effectuer.index')->with('success', 'Opération supprimée avec succès.');
    }
}
