<?php

namespace App\Http\Controllers;

use App\Models\Frequence;
use Illuminate\Http\Request;

class FrequenceController extends Controller
{
    public function index() {
        $frequences = Frequence::all();
        return view('frequence.index', compact('frequences'));
    }

    public function create() {
        return view('frequence.form');
    }

    public function store(Request $request) {
        $request->validate([
            'type_frequence' => 'required|string|max:255',
        ]);

        Frequence::create($request->all());
        return redirect()->route('frequence.index')->with('success', 'Fréquence créée avec succès.');
    }

    public function show(Frequence $frequence) {
        return view('frequence.show', compact('frequence'));
    }

    public function edit(Frequence $frequence) {
        return view('frequence.form', compact('frequence'));
    }

    public function update(Request $request, Frequence $frequence) {
        $request->validate([
            'type_frequence' => 'required|string|max:255',
        ]);

        $frequence->update($request->all());
        return redirect()->route('frequence.index')->with('success', 'Fréquence mise à jour avec succès.');
    }

    public function destroy(Frequence $frequence) {
        $frequence->delete();
        return redirect()->route('frequence.index')->with('success', 'Fréquence supprimée avec succès.');
    }
}
