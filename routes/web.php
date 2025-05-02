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
use App\Http\Controllers\DirectionRegionaleController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\EffectuerController;
use App\Http\Controllers\EfpController;
use App\Http\Controllers\ComplexeController;
use App\Http\Controllers\AnomalieController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('anomalies', AnomalieController::class)->parameters([
    'anomalies' => 'anomalie'
]);
Route::resource('utilisateurs', UtilisateurController::class);
Route::resource('roles', RoleController::class);
Route::resource('operations', OperationController::class);
Route::resource('frequences', FrequenceController::class);
Route::resource('categories', CategorieController::class)->parameters([
    'categories' => 'categorie'
]);
Route::resource('equipements_identifies', EquipementIdentifieController::class)->parameters([
    'equipements_identifies' => 'equipementIdentifie'
]); 
Route::resource('equipements_tracables', EquipementTracableController::class)->parameters([
    'equipements_tracables' => 'equipementTracable'
]);
Route::resource('intervenants', IntervenantController::class);
Route::resource('ateliers', AtelierController::class);
Route::resource('direction_regionales', DirectionRegionaleController::class)->parameters([
    'direction_regionales' => 'directionRegionale'
]);
Route::resource('observations', ObservationController::class);
Route::resource('effectuers', EffectuerController::class);
Route::resource('efps', EfpController::class);
Route::resource('complexes', ComplexeController::class)->parameters([
    'complexes' => 'complexe'
]);




