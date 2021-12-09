<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarritoProducto;

class Carrito extends Component
{
    protected $listeners = ['refreshCarrito' =>  '$refresh', 'addTocart' => 'addToCart'];
    public $text = "";
    public function addToCart($id, $nombre, $precio, $imagen, $quantity)
    {
        $idUser = auth()->user()->id;
        $carrito = Carrito::firstWhere('cliente_id', $idUser);
        $detalle = CarritoProducto::create([
            'carrito_id' => $carrito->id,
            'cliente_id' => $idUser,
            'producto_id' => $id,
            'cantidad' => $quantity,
            'subtotal' => (float)$quantity * (float)$precio
        ]);

        \Cart::add([
            'idCarrito' => $carrito->id,
            'id' => $id,
            'name' => $nombre,
            'price' => $precio,
            'quantity' => $quantity,
            'attributes' => array(
                'image' => $imagen,
            )

        ]);

        session()->flash('success', 'Product is Added to Cart Successfully !');
    }
    public function render()
    {
        return view('livewire.carrito');
    }
}