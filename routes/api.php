<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Obtener - desvincular personal web token (Sanctum)
Route::post('login', [App\Http\Controllers\Api\LogController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Api\LogController::class, 'logout'])->middleware('auth:sanctum');



// Reemplaza interaccion del login del CIDI 
Route::get('Cuenta/Login', [App\Http\Controllers\Api\CidiController::class, 'loginCidiResponse']);

// Obtener datos de usuario cidi 
Route::post('Usuario/Obtener_Usuario_Aplicacion', [App\Http\Controllers\Api\CidiController::class, 'getCitizenData']);

// Datos de modulo patentes
Route::get('servicios/patentes', [App\Http\Controllers\Api\ModuleController::class, 'getAllPatentes']);
Route::get('servicios/patentes/cuit/{cuit}', [App\Http\Controllers\Api\ModuleController::class, 'getCitizenPatentes']);
Route::get('servicios/patentes/bien_id/{bien_id}', [App\Http\Controllers\Api\ModuleController::class, 'getBienIdPatentes']);
