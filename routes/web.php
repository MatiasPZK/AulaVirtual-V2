<?php

use Illuminate\Support\Facades\Route;

// Controladores de tu app
use App\Http\Controllers\AulaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\CortinaController;
use App\Http\Controllers\AireAcondicionadoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FocoController;

// RUTA PRINCIPAL
Route::get('/', function () {
    return view('welcome');
})->name('welcome'); // <--- Importante para que route('welcome') funcione

// RUTAS DE RECURSOS
Route::resource('aulas', AulaController::class);
Route::resource('profesores', ProfesorController::class)->parameters([
    'profesores' => 'profesor'
]);
Route::resource('objetos', ObjetoController::class);
Route::resource('cortinas', CortinaController::class);
Route::resource('aires', AireAcondicionadoController::class);
Route::resource('horarios', HorarioController::class);
Route::resource('focos', FocoController::class);

// BUSCADOR
Route::get('/buscar', [BusquedaController::class, 'buscar'])->name('buscar');
Route::get('/cortinas/{cortina}', [CortinaController::class, 'apiShow']);
Route::post('/cortinas/{cortina}', [CortinaController::class, 'apiUpdate']);

// RUTAS DE AUTENTICACIÓN
require __DIR__.'/auth.php';
