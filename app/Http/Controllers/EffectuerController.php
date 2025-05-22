<?php

namespace App\Http\Controllers;

use App\Models\Effectuer;
use App\Models\Operation;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\EquipementTracable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EffectuerController extends Controller
{
    public function index()
    {
        $effectuers = Effectuer::with([
            'utilisateur',
            'equipementTracable.equipementIdentifie',
            'operation'
        ])->get();

        return response()->json($effectuers, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:utilisateurs,id',
            'id_exemplaire' => 'required|exists:equipement_tracables,id',
            'id_operation' => 'required|exists:operations,id',
            'date_operation' => 'required|date',
            'durée' => 'required|string|regex:/^\d{2}:\d{2}:\d{2}$/', // Format HH:MM:SS
            'statut' => 'required|in:planned,in progress,completed',
        ]);

        try {
            DB::beginTransaction();

            $effectuer = Effectuer::create([
                'id_user' => $validated['id_user'],
                'id_exemplaire' => $validated['id_exemplaire'],
                'id_operation' => $validated['id_operation'],
                'date_operation' => $validated['date_operation'],
                'durée' => $validated['durée'],
                'statut' => $validated['statut'],
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Opération effectuée avec succès.',
                'effectuer' => $effectuer->load(['utilisateur', 'equipementTracable', 'operation']),
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating effectuer: ' . $e->getMessage());
            return response()->json([
                'message' => 'Erreur lors de la création de l\'opération',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Effectuer $effectuer)
    {
        $effectuer->load([
            'utilisateur',
            'equipementTracable.equipementIdentifie',
            'operation'
        ]);

        return response()->json($effectuer, 200);
    }

    public function update(Request $request, Effectuer $effectuer)
    {
        Log::info('Incoming update request:', $request->all());
        
        try {
            $validated = $request->validate([
                'id_user' => 'required|exists:utilisateurs,id',
                'id_exemplaire' => 'required|exists:equipement_tracables,id',
                'id_operation' => 'required|exists:operations,id',
                'date_operation' => 'required|date',
                'durée' => ['required', 'string', 'regex:/^\d{2}:\d{2}:\d{2}$/'],
                'statut' => 'required|in:planned,in progress,completed',
            ]);

            DB::beginTransaction();
            
            $effectuer->update($validated);

            DB::commit();

            return response()->json([
                'message' => 'Operation updated successfully',
                'data' => $effectuer->fresh()->load(['utilisateur', 'equipementTracable', 'operation'])
            ], 200);

        } catch (ValidationException $e) {
            DB::rollBack();
            Log::error('Validation error:', $e->errors());
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Server error:', ['message' => $e->getMessage(), 'trace' => $e->getTrace()]);
            return response()->json([
                'message' => 'Server error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Effectuer $effectuer)
    {
        try {
            DB::beginTransaction();
            
            $effectuer->delete();
            
            DB::commit();

            return response()->json([
                'message' => 'Opération supprimée avec succès.'
            ], 204);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting effectuer: ' . $e->getMessage());
            return response()->json([
                'message' => 'Erreur lors de la suppression',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}