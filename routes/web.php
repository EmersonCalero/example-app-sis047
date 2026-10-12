<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AlmacenesController;

Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');

Route::resource('/productos', ProductosController::class);

Route::get('/almacenes', [AlmacenesController::class, 'index'])->name('almacenes.web.index');
Route::post('/almacenes', [AlmacenesController::class, 'store'])->name('almacenes.web.store');