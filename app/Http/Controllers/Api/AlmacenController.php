<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlmacenRequest;
use App\Http\Requests\UpdateAlmacenRequest;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function index()
    {
        return Almacen::paginate(10);
    }

    public function show(Almacen $almacen)
    {
        return $almacen;
    }

    public function store(StoreAlmacenRequest $request)
    {
        $almacen = Almacen::create($request->validated());

        return response()->json($almacen, 201);
    }

    public function update(UpdateAlmacenRequest $request, Almacen $almacen)
    {
        $almacen->update($request->validated());

        return response()->json($almacen);
    }

    public function destroy(Almacen $almacen)
    {
        $almacen->delete();

        return response()->noContent();
    }
}