<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'almacen_id',
    ];

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'producto_proveedor')->withTimestamps();
    }
}
