<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;

// Routes publiques pour l'authentification
Route::post('/register', [UtilisateurController::class, 'register']);
Route::post('/login', [UtilisateurController::class, 'login']);

// Routes protégées (exemple)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', function (Request $request) {
        // Révoquer le token de l'utilisateur connecté
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Déconnexion réussie.']);
    });

    Route::get('/profile', function (Request $request) {
        return response()->json($request->user());
    });
});
