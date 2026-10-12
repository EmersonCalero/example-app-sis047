<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProveedorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'    => 'sometimes|required|string|max:100',
            'ruc'       => ['sometimes', 'required', 'digits:11', Rule::unique('proveedores', 'ruc')->ignore($this->route('proveedor'))],
            'telefono'  => 'sometimes|required|string|max:20',
            'correo'    => 'sometimes|required|email|max:100',
            'direccion' => 'sometimes|required|string|max:150',
        ];
    }
}
