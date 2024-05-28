<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\InquilinoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\InquilinoAlquilerController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('paises', PaisController::class);
    Route::apiResource('inquilinos', InquilinoController::class);
    Route::apiResource('departamentos', DepartamentoController::class);
    Route::apiResource('departamentos', AlquilerController::class);

    
});
