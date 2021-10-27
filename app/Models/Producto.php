<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'stock',
        'empresa_id',
        'marca_id',
        'subcategoria_id'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function marca() {
        return $this->belongsTo(Marca::class,'marca_id');
    }

    public function subcategoria() {
        return $this->belongsTo(Subcategoria::class,'subcategoria_id');
    }

    public function carritoProducto() {
        return $this->hasMany(CarritoProducto::class,'producto_id');
    }
}
