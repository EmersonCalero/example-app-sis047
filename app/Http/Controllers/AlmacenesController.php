<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenesController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::paginate(10);
        return view('almacenes.index', compact('almacenes'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre'    => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'ciudad'    => 'required|string|max:255',
        ]);

        Almacen::create($datos);

        return redirect()->route('almacenes.web.index')
            ->with('exito', 'Almacén guardado correctamente.');
    }
}