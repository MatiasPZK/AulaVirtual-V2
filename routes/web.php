<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AulaController;

use App\Http\Controllers\ProfesorController;

Route::resource('aulas', AulaController::class);

Route::resource('profesores', ProfesorController::class);

Route::get('/', function () {
    return view('welcome');
});
