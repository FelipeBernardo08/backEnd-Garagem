<?php

use App\Http\Controllers\ImagemCarroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('carro', 'App\Http\Controllers\CarroController');
Route::apiResource('moto', 'App\Http\Controllers\MotoController');
Route::apiResource('cliente', 'App\Http\Controllers\ClienteController');
Route::apiResource('venda', 'App\Http\Controllers\VendasController');
Route::apiResource('imgCarro', 'App\Http\Controllers\ImagemCarroController');
Route::apiResource('imgMoto', 'App\Http\Controllers\ImagemMotoController');

// Route::get('ultimaFoto', [ImagemCarroController::class, 'ultimoDado']);
// Route::get('ultimaFoto', 'App\Http\Controllers\ImagemCarroController', 'ultimoDado');

