<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'ruc',
        'telefono',
        'correo',
        'direccion',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_proveedor')->withTimestamps();
    }
}