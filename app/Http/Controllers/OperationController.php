<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Operation::all();
        return response()->json($operations, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_operation' => 'required|string|max:255',
        ]);

        $operation = Operation::create($validated);

        return response()->json([
            'message' => 'Opération créée avec succès.',
            'operation' => $operation
        ], 201);
    }

    public function show(Operation $operation)
    {
        return response()->json($operation, 200);
    }

    public function update(Request $request, Operation $operation)
    {
        $validated = $request->validate([
            'nom_operation' => 'required|string|max:255',
        ]);

        $operation->update($validated);

        return response()->json([
            'message' => 'Opération mise à jour avec succès.',
            'operation' => $operation
        ], 200);
    }

    public function destroy(Operation $operation)
    {
        $operation->delete();

        return response()->json([
            'message' => 'Opération supprimée avec succès.'
        ], 204);
    }
}