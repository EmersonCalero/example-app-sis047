<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'        => 'required|string|max:100',
            'descripcion'   => 'required|string',
            'precio'        => 'required|numeric|min:0|max:999999.99',
            'stock'         => 'sometimes|integer|min:0',
            'almacen_id'    => 'required|integer|exists:almacenes,id',
            'proveedores'   => 'sometimes|array',
            'proveedores.*' => 'integer|distinct|exists:proveedores,id',
        ];
    }
}
