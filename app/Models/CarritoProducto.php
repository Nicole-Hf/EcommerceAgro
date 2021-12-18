<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoProducto extends Model
{
    use HasFactory;

    protected $table = 'carritos_productos';
    protected $fillable = [
        'cantidad',
        'subtotal',
        'carrito_id',
        'producto_id'
    ];

    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function getCarritoUser($carrito)
    {
        return $this->where(['carrito_id' => $carrito])->get();
    }
}