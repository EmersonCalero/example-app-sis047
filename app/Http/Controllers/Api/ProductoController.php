<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::paginate(10);
    }

    public function show(Producto $producto)
    {
        return $producto;
    }

    public function store(StoreProductoRequest $request)
    {
        $producto = Producto::create($request->validated());

        return response()->json($producto, 201);
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->validated());

        return response()->json($producto);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->noContent();
    }
}