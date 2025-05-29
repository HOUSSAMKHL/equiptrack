<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RapportController extends Controller
{
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|max:255',
            'date_de_generation' => 'required|date',
            'statut' => 'required|string|max:50',
            'id_user' => 'required|exists:utilisateurs,id',
            'fichier' => 'required|file|mimes:pdf,doc,docx|max:2048' // 2MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Stockage du fichier
        $file = $request->file('fichier');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('rapports', $fileName, 'public');

        $rapport = Rapport::create([
            'titre' => $request->titre,
            'date_de_generation' => $request->date_de_generation,
            'statut' => $request->statut,
            'id_user' => $request->id_user,
            'fichier_path' => $filePath
        ]);

        return response()->json([
            'success' => true,
            'data' => $rapport->load('utilisateur')
        ], 201);
    }

    public function show(Rapport $rapport)
    {
        return response()->json([
            'success' => true,
            'data' => $rapport->load('utilisateur')
        ]);
    }

    public function update(Request $request, Rapport $rapport)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'sometimes|required|string|max:255',
            'date_de_generation' => 'sometimes|required|date',
            'statut' => 'sometimes|required|string|max:50',
            'id_user' => 'sometimes|required|exists:utilisateurs,id',
            'fichier' => 'sometimes|file|mimes:pdf,doc,docx|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->except('fichier');

        if ($request->hasFile('fichier')) {
            // Supprimer l'ancien fichier
            if ($rapport->fichier_path) {
                Storage::disk('public')->delete($rapport->fichier_path);
            }

            // Stocker le nouveau fichier
            $file = $request->file('fichier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('rapports', $fileName, 'public');
            $data['fichier_path'] = $filePath;
        }

        $rapport->update($data);

        return response()->json([
            'success' => true,
            'data' => $rapport->fresh()->load('utilisateur')
        ]);
    }

    public function destroy(Rapport $rapport)
    {
        // Supprimer le fichier associé
        if ($rapport->fichier_path) {
            Storage::disk('public')->delete($rapport->fichier_path);
        }

        $rapport->delete();
        return response()->json([
            'success' => true,
            'message' => 'Rapport supprimé avec succès'
        ]);
    }

    public function view($id)
{
    $rapport = Rapport::findOrFail($id);

    if (!$rapport->fichier_path) {
        return response()->json(['error' => 'Aucun fichier associé'], 404);
    }

    $filePath = storage_path('app/public/' . $rapport->fichier_path);

    if (!file_exists($filePath)) {
        return response()->json(['error' => 'Fichier introuvable'], 404);
    }

    return response()->file($filePath, [
        'Content-Type' => mime_content_type($filePath),
        'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
    ]);
}

public function download($id)
{
    $rapport = Rapport::findOrFail($id);

    if (!$rapport->fichier_path) {
        return response()->json(['error' => 'Aucun fichier associé'], 404);
    }

    $filePath = storage_path('app/public/' . $rapport->fichier_path);

    if (!file_exists($filePath)) {
        return response()->json(['error' => 'Fichier introuvable'], 404);
    }

    $originalName = basename($rapport->fichier_path);
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    $downloadName = Str::slug($rapport->titre) . '.' . $extension;

    return response()->download($filePath, $downloadName, [
        'Content-Type' => mime_content_type($filePath),
        'Content-Disposition' => 'attachment; filename="' . $downloadName . '"'
    ]);
}
}