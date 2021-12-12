<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\Carrito;
use App\Models\CarritoProducto;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\UserApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function getCarritoCompra($carrito) {
        $list = new CarritoProducto();
        $list = $list->getCarritoUser($carrito);
        //$list->load('producto');

        foreach ($list as $item) {
            $item['cantidad'] = strip_tags($item['cantidad']);
            $item['cantidad'] = $Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['cantidad']);
        }

        return response()->json($list);
    }

    public function addProduct(Request $request, $carritoId) {
        $producto = Producto::findOrFail($request->producto_id);

        $cartProduct = new CarritoProducto();
        $cartProduct->carrito_id = $carritoId;
        $cartProduct->producto_id = $request->producto_id;
        $cartProduct->cantidad = 1;
        $cartProduct->subtotal = $producto->precio;

        $cartProduct->save();

        return $cartProduct;
    }

    public function removeProduct($id, $cartId, $productoId) {
        $cartProduct = CarritoProducto::findOrFail($id);
        $producto = Producto::findOrFail($productoId);

        $cartProduct->producto_id = $productoId;
        $cartProduct->carrito_id = $cartId;
        $cartProduct->cantidad = $cartProduct->cantidad - 1;
        $cartProduct->subtotal = $cartProduct->subtotal - $producto->precio;
        $cartProduct->save();

        if ($cartProduct->cantidad == 0)
            $cartProduct->delete();

        return $cartProduct;
    }

    public function moreProduct($id, $cartId, $productoId) {
        $cartProduct = CarritoProducto::findOrFail($id);
        $producto = Producto::findOrFail($productoId);

        $cartProduct->producto_id = $productoId;
        $cartProduct->carrito_id = $cartId;
        $cartProduct->cantidad = $cartProduct->cantidad + 1;
        $cartProduct->subtotal = $cartProduct->subtotal + $producto->precio;
        $cartProduct->save();

        return $cartProduct;
    }

    public function deleteProduct($id, $cart, $producto) {
        $cartProduct = CarritoProducto::findOrFail($id);
        $cartProduct->producto_id = $producto;
        $cartProduct->carrito_id = $cart;

        $cartProduct->delete();
    }


}
