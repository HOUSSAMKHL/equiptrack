<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   // Dans RapportController.php
public function index()
{
    $rapports = Rapport::with('utilisateur')->get();
    
    if ($rapports->isEmpty()) {
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'Aucun rapport trouvé'
        ]);
    }

    return response()->json([
        'success' => true,
        'data' => $rapports
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'date_de_generation' => 'required|date',
            'statut' => 'required|string|max:50',
            'id_user' => 'required|exists:utilisateurs,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $rapport = Rapport::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $rapport->load('utilisateur')
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rapport $rapport)
    {
        return response()->json([
            'success' => true,
            'data' => $rapport->load('utilisateur')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rapport $rapport)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:100',
            'date_de_generation' => 'sometimes|required|date',
            'statut' => 'sometimes|required|string|max:50',
            'id_user' => 'sometimes|required|exists:utilisateurs,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $rapport->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $rapport->fresh()->load('utilisateur')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rapport $rapport)
    {
        $rapport->delete();
        return response()->json([
            'success' => true,
            'message' => 'Rapport supprimé avec succès'
        ]);
    }
}