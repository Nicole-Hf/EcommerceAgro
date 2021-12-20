<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WishlistItem;

class ListaDeseosEstado extends Component
{
    protected $listeners = ['refreshWishlist' =>  '$refresh', 'addToWishList' => 'addToWishList'];
    public $items = [];
    public function getItems()
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $wishlist = \App\Models\wishlist::where('cliente_id', $cliente->id)->first();

            $resultado = WishlistItem::join("productos", "productos.id", "=", "wishlist_product.producto_id")
                ->select("wishlist_product.*", "productos.nombre", "productos.imagen", "productos.precio")
                ->where("wishlist_product.wishlist_id", $wishlist->id)->get();

            $this->items = $resultado;
        }
    }
    public function addToCartWish($idWish, $id, $nombre, $precio, $imagen, $quantity)
    {

        $this->emitTo('carrito', 'addTocart', $id, $nombre, $precio, $imagen, $quantity);
        $this->removeItem($idWish);
    }

    public function removeItem($id)
    {
        $result2 = WishlistItem::where('id', $id)->delete();
        $this->emitTo('lista-deseos', 'refreshWishlist');
    }


    public function render()
    {
        $this->getItems();
        return view('livewire.lista-deseos-estado');
    }
}