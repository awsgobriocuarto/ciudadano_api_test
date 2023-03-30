<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// Reemplaza vista interaccion del login del CIDI 
Route::get('Cuenta/Login', [App\Http\Controllers\CidiController::class, 'loginCidi'])->name('cidi.login');

// Reemplaza vista interaccion del login del CIDI 
Route::post('Cuenta/Login/respose', [App\Http\Controllers\CidiController::class, 'setCidiResponse'])->name('cidi.response');

// Reemplaza vista interaccion del con aplicacion detalles de patente 
Route::get('/patentes/{id_bien}', [App\Http\Controllers\HomeController::class, 'patentes']);
