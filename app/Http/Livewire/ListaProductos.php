<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\PedidoPago;
use App\Models\WishlistItem;

use Livewire\WithPagination;
use Illuminate\Support\Collection;

class ListaProductos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $term;
    public $items = null;

    public function getWishlistCliente()
    {
        $items = collect([]);
        if (auth()->check()) {
            $idUser = auth()->user()->id;
            $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
            $wishlist = \App\Models\wishlist::where('cliente_id', $cliente->id)->first();

            $resultado = WishlistItem::join("productos", "productos.id", "=", "wishlist_product.producto_id")
                ->select("wishlist_product.producto_id")
                ->where("wishlist_product.wishlist_id", $wishlist->id)->get();
            $this->items = $resultado;
        }
    }

    public function render()
    {
        $this->getWishlistCliente();
        return view('livewire.lista-productos', [
            'productos' => Producto::when($this->term, function ($query, $term) {
                return $query->where('nombre', 'LIKE', "%$term%");
            })->paginate(3), 'wishlistproductos' => $this->items
        ]);
    }
}