<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carritos';
    protected $fillable = [
        'cliente_id'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function pedidoPago() {
        return $this->hasOne(PedidoPago::class,'carrito_id');
    }

    public function carritoProducto() {
        return $this->hasMany(CarritoProducto::class,'carrito_id');
    }

    public function getCarritoAuth($cliente) {
        return $this->where(['cliente_id' => $cliente])->get();
    }
}
