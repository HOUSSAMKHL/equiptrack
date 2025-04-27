<?php

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
use App\Http\Controllers\DirectionRegionalesController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\EffectuerController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('anomalies', AnomaliesController::class);
Route::resource('utilisateurs', UtilisateurController::class);
Route::resource('roles', RoleController::class);
Route::resource('operations', OperationController::class);
Route::resource('frequences', FrequenceController::class);
Route::resource('categories', CategorieController::class);
Route::resource('equipements_identifies', EquipementIdentifieController::class);
Route::resource('equipements_tracables', EquipementTracableController::class);
Route::resource('intervenants', IntervenantController::class);
Route::resource('ateliers', AtelierController::class);
Route::resource('direction_regionales', DirectionRegionalesController::class);
Route::resource('observations', ObservationController::class);
Route::resource('effectuers', EffectuerController::class);
