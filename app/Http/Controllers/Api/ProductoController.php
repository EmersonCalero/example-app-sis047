<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use League\Uri\QueryString;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::with('almacen', 'proveedores')->paginate(10);
    }

    public function show(Producto $producto)
    {
        return $producto->load('almacen', 'proveedores');
    }

    public function store(StoreProductoRequest $request)
    {
        $datos = $request->validated();
        $proveedores = $datos['proveedores'] ?? [];
        unset($datos['proveedores']);

        $producto = Producto::create($datos);
        $producto->proveedores()->sync($proveedores);

        return response()->json($producto->load('almacen', 'proveedores'), 201);
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $datos = $request->validated();
        $proveedores = $datos['proveedores'] ?? null;
        unset($datos['proveedores']);

        $producto->update($datos);

        if ($proveedores !== null) {
            $producto->proveedores()->sync($proveedores);
        }

        return response()->json($producto->load('almacen', 'proveedores'));
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->noContent();
    }
};
