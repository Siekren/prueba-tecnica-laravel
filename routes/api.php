<?php
// routes/api.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ToyApiController; // Usaremos un controlador específico para la API

// Esta ruta se ejecutará al llamar a /api/toys
Route::get('toys', [ToyApiController::class, 'index']);

// Esta ruta se ejecutará al llamar a /api/toys/{id}
Route::get('toys/search', [ToyApiController::class, 'search']);
Route::get('toys/{toy}', [ToyApiController::class, 'show']);
Route::post('toys', [ToyApiController::class, 'store']);
Route::put('toys/{toy}', [ToyApiController::class, 'update']);
Route::delete('toys/{toy}', [ToyApiController::class, 'destroy']);
