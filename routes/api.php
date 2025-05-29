<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\FrequenceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EquipementIdentifieController;
use App\Http\Controllers\EquipementTracableController;
use App\Http\Controllers\IntervenantController;
use App\Http\Controllers\AtelierController;
use App\Http\Controllers\DirectionRegionaleController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\EffectuerController;
use App\Http\Controllers\EfpController;
use App\Http\Controllers\ComplexeController;
use App\Http\Controllers\AnomalieController;
use App\Http\Controllers\RapportController;

require __DIR__.'/auth.php';

Route::get('/test-api', function () {
    return response()->json(['message' => 'API OK']);
});

// Status options route (add this before the resource routes)
Route::get('/equipements_tracables/status-options', 
    [EquipementTracableController::class, 'getStatusOptions']);

// Resource routes
Route::apiResource('anomalies', AnomalieController::class)->parameters([
    'anomalies' => 'anomalie'
]);
Route::apiResource('utilisateurs', UtilisateurController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('frequences', FrequenceController::class);
Route::apiResource('operations', OperationController::class);
Route::apiResource('categories', CategorieController::class)->parameters([
    'categories' => 'categorie'
]);
Route::apiResource('equipements_identifies', EquipementIdentifieController::class)->parameters([
    'equipements_identifies' => 'equipementIdentifie'
]);
Route::apiResource('equipements_tracables', EquipementTracableController::class)->parameters([
    'equipements_tracables' => 'equipementTracable'
]);
Route::apiResource('intervenants', IntervenantController::class);
Route::apiResource('ateliers', AtelierController::class);
Route::apiResource('direction_regionales', DirectionRegionaleController::class)->parameters([
    'direction_regionales' => 'directionRegionale'
]);
Route::apiResource('observations', ObservationController::class);
Route::apiResource('effectuers', EffectuerController::class);
Route::apiResource('efps', EfpController::class);
Route::apiResource('complexes', ComplexeController::class)->parameters([
    'complexes' => 'complexe'
]);
Route::apiResource('rapports', RapportController::class)->parameters([
    'rapports' => 'rapport'
]);
Route::get('rapports/{id}/download', [RapportController::class, 'download'])->name('rapports.download');
Route::get('rapports/{id}/view', [RapportController::class, 'view'])->name('rapports.view');
// Authenticated user route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});