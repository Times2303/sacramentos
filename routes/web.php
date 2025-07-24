<?php

use App\Http\Controllers\PersonasController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// RUTA PARA EL PRINCIPAL
Route::get('/', [DashboardController::class, 'index'])->name('principal');

// RUTAS PARA PERSONAS
Route::get('/personas', [PersonasController::class, 'index'])->name('personas.index');
Route::get('/personas/create', [PersonasController::class, 'create'])->name('personas.create');
Route::post('/personas/store', [PersonasController::class, 'store'])->name('personas.store');