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
    public static function carritoCliente()
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();

            $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
                ->select("carritos_productos.*", "productos.nombre", "productos.imagen", "productos.precio")
                ->where("carritos_productos.carrito_id", $carrito->id)->get();
            $items = array();
            $resultado->each(function ($item) use (&$items) {
                $items[] = $item;
                \Cart::add([
                    'idCarrito' => $item->carrito_id,
                    'id' => $item->id,
                    'name' => $item->nombre,
                    'price' => $item->precio,
                    'quantity' => $item->cantidad,
                    'attributes' => array(
                        'image' => $item->imagen,
                    )

                ]);
            });
        }
    }
}