<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListaDeseos extends Component
{
    protected $listeners = ['refreshCarrito' =>  '$refresh', 'addToWishList' => 'addToWishList'];
    public function addToWishList($id, $nombre, $precio, $imagen, $quantity)
    {
        /* $idUser = auth()->user()->id;
        $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
        $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();


        $detalle = CarritoProducto::create([
            'carrito_id' => $carrito->id,
            'cliente_id' => $idUser,
            'producto_id' => $id,
            'cantidad' => $quantity,
            'subtotal' => (float)$quantity * (float)$precio
        ]);
 */

        $wish_list = app('wishlist');

        $allowed  = ['id',$id ];
        $filtered = array_filter(
            $wish_list->getContent()->toArray(),
            function ($key) use ($allowed) {
                return in_array($key, $allowed);
            },
            ARRAY_FILTER_USE_KEY
        );
if( sizeof($filtered)==0){
        $wish_list->add([
            /* 'idCarrito' => $carrito->id, */
            'id' => $id,
            'name' => $nombre,
            'price' => $precio,
            'quantity' => $quantity,
            'attributes' => array(
                'image' => $imagen,
            )

        ]);
}
        session()->flash('success', 'Product is Added to Cart Successfully !');
    }
    public function render()
    {
        return view('livewire.lista-deseos');
    }
}