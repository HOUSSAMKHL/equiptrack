<?php

namespace App\Http\Controllers;

use App\Models\Frequence;
use Illuminate\Http\Request;

class FrequenceController extends Controller
{
    public function index() {
        $frequences = Frequence::all();
        return view('frequences.index', compact('frequences'));
    }

    public function create() {
        return view('frequences.create');
    }

    public function store(Request $request) {
        $request->validate([
            'type_frequence' => 'required|string|max:255',
        ]);

        Frequence::create($request->all());
        return redirect()->route('frequences.index')->with('success', 'Fréquence créée avec succès.');
    }

    public function show(Frequence $frequence) {
        return view('frequences.show', compact('frequence'));
    }

    public function edit(Frequence $frequence) {
        return view('frequences.edit', compact('frequence'));
    }

    public function update(Request $request, Frequence $frequence) {
        $request->validate([
            'type_frequence' => 'required|string|max:255',
        ]);

        $frequence->update($request->all());
        return redirect()->route('frequences.index')->with('success', 'Fréquence mise à jour avec succès.');
    }

    public function destroy(Frequence $frequence) {
        $frequence->delete();
        return redirect()->route('frequences.index')->with('success', 'Fréquence supprimée avec succès.');
    }
}
