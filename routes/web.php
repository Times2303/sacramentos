<?php

use App\Http\Controllers\PersonasController;
use App\Http\Controllers\SacerdotesController;
use App\Http\Controllers\ParroquiasController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// RUTA PARA EL PRINCIPAL
Route::get('/', [DashboardController::class, 'index'])->name('principal');

// RUTAS PARA PERSONAS
Route::get('/personas', [PersonasController::class, 'index'])->name('personas.index');
Route::get('/personas/create', [PersonasController::class, 'create'])->name('personas.create');
Route::post('/personas/store', [PersonasController::class, 'store'])->name('personas.store');
Route::get('/personas/edit/{personas}', [PersonasController::class, 'edit'])->name('personas.edit');
Route::put('/personas/update/{personas}', [PersonasController::class, 'update'])->name('personas.update');
Route::delete('/personas/destroy/{personas}', [PersonasController::class, 'destroy'])->name('personas.destroy');

//RUTAS PARA SACERDOTES
Route::get('/sacerdotes', [SacerdotesController::class, 'index'])->name('sacerdotes.index');
Route::get('/sacerdotes/seleccionar', [SacerdotesController::class, 'seleccionarPersona'])->name('sacerdotes.seleccionarPersona');
Route::get('/sacerdotes/create', [SacerdotesController::class, 'create'])->name('sacerdotes.create');
Route::get('/sacerdotes/seleccionar/{id}', [SacerdotesController::class, 'edit'])->name('sacerdotes.edit');
Route::put('/sacerdotes/update/{id}', [SacerdotesController::class, 'update'])->name('sacerdotes.crear');
Route::post('/sacerdotes/store', [SacerdotesController::class, 'store'])->name('sacerdotes.store');
Route::get('/sacerdotes/edit/{id}', [SacerdotesController::class, 'edit2'])->name('sacerdotes.edit2');
Route::put('/sacerdotes/actualizar/{id}', [SacerdotesController::class, 'update2'])->name('sacerdotes.update2');
Route::delete('/sacerdotes/destroy/{id}', [SacerdotesController::class, 'destroy'])->name('sacerdotes.destroy');

//RUTAS PARA PARROQUIAS
Route::get('/parroquias', [ParroquiasController::class, 'index'])->name('parroquias.index');
Route::get('/parroquias/create', [ParroquiasController::class, 'create'])->name('parroquias.create');