<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\AlmacenController;
use App\Http\Controllers\Api\ProveedorController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
Route::apiResource('productos', ProductoController::class);

Route::apiResource('almacenes', AlmacenController::class)
    ->parameters(['almacenes' => 'almacen']);

Route::apiResource('proveedores', ProveedorController::class)
    ->parameters(['proveedores' => 'proveedor']);

