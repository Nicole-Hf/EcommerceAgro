<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WishlistItem;

class ListaDeseos extends Component
{
    protected $listeners = ['refreshWishlist' =>  '$refresh', 'addToWishList' => 'addToWishList'];
    public $text = "";
    public $cantidad = 0;

    public function addToWishList($id, $nombre, $precio, $imagen, $quantity)
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $wishlist = \App\Models\wishlist::where('cliente_id', $cliente->id)->first();

            $resultado = WishlistItem::join("productos", "productos.id", "=", "wishlist_product.producto_id")
                ->select("wishlist_product.*", "productos.nombre", "productos.imagen", "productos.precio")
                ->where("wishlist_product.wishlist_id", $wishlist->id)->where("productos.id", $id)->get();


            if ($resultado->count() === 0) {
                $detalle = WishlistItem::create([
                    'wishlist_id' => $wishlist->id,
                    'cliente_id' => $idUser,
                    'producto_id' => $id,
                    'nombre' => $nombre,
                ]);
            } else {
                $this->removeItem($resultado->first()->id);
            }
        } else {
            return redirect()->route('login');
        }

        $this->dispatchBrowserEvent('input-wishlist', ['id' => $id]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
    }

    public function removeItem($id)
    {
        $result2 = WishlistItem::where('id', $id)->delete();
        $this->emitTo('lista-deseos', 'refreshWishlist');
    }

    public function getCantidad()
    {
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $wishlist = \App\Models\wishlist::where('cliente_id', $cliente->id)->first();
            $resultado = WishlistItem::join("productos", "productos.id", "=", "wishlist_product.producto_id")

                ->where("wishlist_product.wishlist_id", $wishlist->id)->count();
            $this->cantidad = $resultado;
        }
    }

    public function render()
    {

        $this->getCantidad();
        return view('livewire.lista-deseos');
    }
}