<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\PedidoPago;
use App\Models\CarritoProducto;

class Carrito extends Component
{
    protected $listeners = ['refreshCarrito' =>  '$refresh', 'addTocart' => 'addToCart'];
    public $text = "";
    public $cantidad = 0;
    public $total = 0;
    public $items = [];
    public $vCarrito = true;


    public function addToCart($id, $nombre, $precio, $imagen, $quantity)
    {

        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->where('estado', null)->first();

            $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
                ->select("carritos_productos.*", "productos.nombre", "productos.imagen", "productos.precio")
                ->where("carritos_productos.carrito_id", $carrito->id)->where("productos.id", $id)->get();


            if ($resultado->count() === 0) {
                $detalle = CarritoProducto::create([
                    'carrito_id' => $carrito->id,
                    'cliente_id' => $idUser,
                    'producto_id' => $id,
                    'nombre' => $nombre,
                    'cantidad' => $quantity,
                    'subtotal' => (float)$quantity * (float)$precio
                ]);
            } else {
                $carritoProducto = $resultado->first();
                $ac = $carritoProducto->cantidad + $quantity;
                $carritoProducto->update([
                    'cantidad' => $ac,
                    'subtotal' => (float)$ac * (float)$precio
                ]);
            }
        }

        session()->flash('success', 'Product is Added to Cart Successfully !');
    }


    public function getCantidad()
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->where('estado', null)->first();
            $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
                ->where("carritos_productos.carrito_id", $carrito->id)->sum('carritos_productos.cantidad');
            $this->cantidad = $resultado;
        }
    }

    public function getItems()
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->where('estado', null)->first();

            $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
                ->select("carritos_productos.*", "productos.nombre", "productos.imagen", "productos.precio")
                ->where("carritos_productos.carrito_id", $carrito->id)->get();

            $this->items = $resultado;
        }
    }

    public function getTotal()
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->where('estado', null)->first();
            $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
                ->where("carritos_productos.carrito_id", $carrito->id)->sum('carritos_productos.subtotal');

            $carrito->update([
                'monto' => $resultado
            ]);

            $this->total = $resultado;
        }
    }



    public function render()
    {
        $this->getCantidad();
        $this->getItems();
        $this->getTotal();

        return view('livewire.carrito');
    }
}