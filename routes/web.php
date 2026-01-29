<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});


// Metodo 1

/* Route::get('/clientes', function () {
    return view('clientes.index');
});

Route::get('/clientes/create', function () {
    return view('clientes.create');
});

Route::get('/clientes/edit', function () {
    return view('clientes.edit');
}); */


// Metodo 2

/* Route::get('/clientes', [ClientesController::class, 'index']);
Route::get('/clientes/create', [ClientesController::class, 'create']);
Route::get('/clientes/edit', [ClientesController::class, 'edit']); */

Route::resource('clientes', ClientesController::class)->middleware('auth');
Route::resource('facturas', FacturasController::class)->middleware('auth');

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
