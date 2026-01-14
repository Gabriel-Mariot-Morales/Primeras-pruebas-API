<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RealmController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\CreatureController;
use App\Http\Controllers\ArtifactController;

/* --- ENDPOINTS OPCIONALES (Deben ir ANTES de los resources) --- */

// 1. Relación Muchos a Muchos (Pivote) manual
Route::post('/artifact-hero', [HeroController::class, 'attachArtifact']);
Route::delete('/artifact-hero', [HeroController::class, 'detachArtifact']);
Route::get('/heroes/{id}/artifacts', [HeroController::class, 'getArtifacts']);
Route::get('/artifacts/{id}/heroes', [ArtifactController::class, 'getHeroes']);

// 2. Filtros y Relaciones específicas
Route::get('/realms/{id}/heroes', [RealmController::class, 'getHeroesByRealm']);
Route::get('/regions/{id}/creatures', [RegionController::class, 'getCreaturesByRegion']);
Route::get('/heroes/alive', [HeroController::class, 'getAlive']);
Route::get('/creatures/dangerous', [CreatureController::class, 'getDangerous']);
Route::get('/artifacts/top', [ArtifactController::class, 'getTop']);


/* --- ENDPOINTS ESTÁNDAR --- */
Route::apiResource('regions', RegionController::class);
Route::apiResource('realms', RealmController::class);
Route::apiResource('heroes', HeroController::class);
Route::apiResource('creatures', CreatureController::class);
Route::apiResource('artifacts', ArtifactController::class);

