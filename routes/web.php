<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AulaController;

use App\Http\Controllers\ProfesorController;

use App\Http\Controllers\ObjetoController;

use App\Http\Controllers\CortinaController;

use App\Http\Controllers\AireAcondicionadoController;

use App\Http\Controllers\BusquedaController;

Route::get('/buscar', [BusquedaController::class, 'index'])->name('buscar');


Route::resource('cortinas', CortinaController::class);

Route::resource('aulas', AulaController::class);

Route::resource('objetos', ObjetoController::class);

Route::resource('aires', AireAcondicionadoController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('profesores', ProfesorController::class)->parameters([
    'profesores' => 'profesor'
]);