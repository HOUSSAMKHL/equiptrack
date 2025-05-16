<?php

namespace App\Http\Controllers;

use App\Models\Complexe;
use App\Models\DirectionRegionale;
use Illuminate\Http\Request;
use App\Models\Efp;

class ComplexeController extends Controller
{
    public function index()
    {
        $complexes = Complexe::with('directionRegionale')->get();
        return response()->json($complexes, 200);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nom_complexe' => 'required|string|max:255',
        'ville' => 'nullable|string|max:255',
        'adresse' => 'nullable|string',
        'description' => 'nullable|string',
        'id_DR' => 'required|exists:direction_regionales,id',
        'etablissements' => 'nullable|array',
        'etablissements.*.nom_etablissement' => 'required|string|max:255',
        'etablissements.*.adresse' => 'required|string',
        'etablissements.*.email' => 'required|email',
        'etablissements.*.numero' => 'required|string|max:20',
    ]);

    // Créer le complexe
    $complexe = Complexe::create([
        'nom_complexe' => $validated['nom_complexe'],
        'ville' => $validated['ville'] ?? 'Casablanca',
        'adresse' => $validated['adresse'] ?? null,
        'description' => $validated['description'] ?? null,
        'id_DR' => $validated['id_DR'],
    ]);

    // Ajouter les EFP liés s'ils existent
    if (isset($validated['etablissements'])) {
        foreach ($validated['etablissements'] as $efp) {
            $complexe->efps()->create([
                'nom_etablissement' => $efp['nom_etablissement'],
                'adresse' => $efp['adresse'],
                'email' => $efp['email'],
                'numero' => $efp['numero'],
            ]);
        }
    }

    return response()->json([
        'message' => 'Complexe et établissements créés avec succès',
        'complexe' => $complexe->load('efps')
    ], 201);
}


    public function show(Complexe $complexe)
    {
        $complexe->load('directionRegionale');
        return response()->json($complexe, 200);
    }

    public function update(Request $request, Complexe $complexe)
    {
        $validated = $request->validate([
            'nom_complexe' => 'required|string|max:255',
            'id_DR' => 'required|exists:direction_regionales,id',
        ]);

        $complexe->update($validated);

        return response()->json([
            'message' => 'Complexe mis à jour avec succès',
            'complexe' => $complexe
        ], 200);
    }

    public function destroy($id)
{
    // Supprimer les établissements d'abord
    Efp::where('id_complexe', $id)->delete();

    // Ensuite supprimer le complexe
    Complexe::destroy($id);

    return response()->json(['message' => 'Complexe et ses établissements supprimés']);
}
}
