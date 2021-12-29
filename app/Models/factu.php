<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factu extends Model
{
    use HasFactory;

    protected $table = 'factu';
    protected $fillable = [
        'pago_id',
        'carrito_producto_id'
    ];

    public function pedidoPago() {
        return $this->belongsTo(PedidoPago::class,'pago_id');
    }

    public function carritoProducto() {
        return $this->hasMany(CarritoProducto::class,'carrito_producto_id');
    }
}
