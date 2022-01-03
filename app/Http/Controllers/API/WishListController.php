<?php

namespace App\Http\Controllers\API;

use App\Models\Producto;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use App\Http\Resources\ProductoResource;
use Illuminate\Support\Facades\Auth;
use PhpParser\JsonDecoder;

class WishListController extends Controller {

    public function index($wishlist){
        $list = new WishlistItem();
        $list = $list->getListUser($wishlist);
        $wishitems = [];

        foreach ($list as $item) {
            $item['nombre'] = strip_tags($item['nombre']);
            $item['nombre'] = $Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['nombre']);

            $producto = Producto::findOrFail($item->producto_id);
            $wishitem = new \stdClass();
            $wishitem->id = $item->id;
            $wishitem->producto_id = $item->producto_id;
            $wishitem->wishlist_id = $item->wishlist_id;
            $wishitem->nombre = $item->nombre;
            $wishitem->imagen = $producto->imagen;
            $wishitem->precio = $producto->precio;
            array_push($wishitems, $wishitem);
        }

        return response()->json($wishitems);
    }


    public function addProductToList(Request $request){
        $request->validate([
            'producto_id' => 'required',
            'wishlist_id' => 'required',
        ]);

        $product_id = $request->producto_id;
        $wishlist_id = $request->wishlist_id;
        $product = Producto::findOrFail($product_id);

        $wishlist = new WishlistItem();

        $listItem = WishlistItem::where(['producto_id' => $product_id,
            'wishlist_id' => $wishlist_id])->first();

        if($listItem){
            $listItem->delete();
        } else {
            $wishlist = WishlistItem::create([
                'wishlist_id' => $wishlist_id,
                'producto_id' => $product_id,
                'nombre' => $product->nombre,
            ]);
        }

        return response()->json("Se añadió a la lista", 200);
    }

    public function inList(Request $request) {
        $request->validate([
            'producto_id' => 'required',
            'wishlist_id' => 'required',
        ]);

        $product_id = $request->producto_id;
        $wishlist_id = $request->wishlist_id;

        $listItem = WishlistItem::where(['producto_id' => $product_id,
            'wishlist_id' => $wishlist_id])->first();

        if($listItem) {
            return response()->json([
                'success' => 'true'
            ], 200);
        } else {
            return response()->json([
                'success' => 'false'
            ], 200);
        }
    }

    public function deleteProduct(Request $request) {
        $request->validate([
            'producto_id' => 'required',
            'wishlist_id'  => 'required',
        ]);

        $wishlist = $request->wishlist_id;
        $producto = $request->producto_id;

        $wishProduct = WishlistItem::where(['wishlist_id' => $wishlist,
            'producto_id' => $producto])->first();

        $wishProduct = WishlistItem::findOrFail($wishProduct->id);
        $wishProduct->producto_id = $producto;
        $wishProduct->carrito_id = $wishlist;

        $wishProduct->delete();

        return response()->json('Product delete', 200);
    }
}
