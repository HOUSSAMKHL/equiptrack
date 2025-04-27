<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function index() {
        $operations = Operation::all();
        return view('operations.index', compact('operations'));
    }

    public function create() {
        return view('operations.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_operation' => 'required|string|max:255',
        ]);

        Operation::create($request->all());
        return redirect()->route('operations.index')->with('success', 'Opération créée avec succès.');
    }

    public function show(Operation $operation) {
        return view('operations.show', compact('operation'));
    }

    public function edit(Operation $operation) {
        return view('operations.edit', compact('operation'));
    }

    public function update(Request $request, Operation $operation) {
        $request->validate([
            'nom_operation' => 'required|string|max:255',
        ]);

        $operation->update($request->all());
        return redirect()->route('operations.index')->with('success', 'Opération mise à jour avec succès.');
    }

    public function destroy(Operation $operation) {
        $operation->delete();
        return redirect()->route('operations.index')->with('success', 'Opération supprimée avec succès.');
    }
}
