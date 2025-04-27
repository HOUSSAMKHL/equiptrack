<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function index() {
        $operations = Operation::all();
        return view('operation.index', compact('operations'));
    }

    public function create() {
        return view('operation.form');
    }

    public function store(Request $request) {
        $request->validate([
            'nom_operation' => 'required|string|max:255',
        ]);

        Operation::create($request->all());
        return redirect()->route('operation.index')->with('success', 'Opération créée avec succès.');
    }

    public function show(Operation $operation) {
        return view('operation.show', compact('operation'));
    }

    public function edit(Operation $operation) {
        return view('operation.form', compact('operation'));
    }

    public function update(Request $request, Operation $operation) {
        $request->validate([
            'nom_operation' => 'required|string|max:255',
        ]);

        $operation->update($request->all());
        return redirect()->route('operation.index')->with('success', 'Opération mise à jour avec succès.');
    }

    public function destroy(Operation $operation) {
        $operation->delete();
        return redirect()->route('operation.index')->with('success', 'Opération supprimée avec succès.');
    }
}
