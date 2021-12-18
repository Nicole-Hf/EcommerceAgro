<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\CarritoProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function getCartProduct($carrito) {
        $list = new CarritoProducto();
        $list = $list->getCarritoUser($carrito);

        $cartitems = [];

        foreach ($list as $item) {
            $item['nombre'] = strip_tags($item['nombre']);
            $item['nombre'] = $Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['nombre']);

            $producto = Producto::findOrFail($item->producto_id);

            $cartitem = new \stdClass();
            $cartitem->id = $item->id;
            $cartitem->producto_id = $item->producto_id;
            $cartitem->carrito_id = $item->carrito_id;
            $cartitem->nombre = $item->nombre;
            $cartitem->imagen = $producto->imagen;
            $cartitem->precio = $producto->precio;
            $cartitem->cantidad = $item->cantidad;
            $cartitem->subtotal = $item->subtotal;
            array_push($cartitems, $cartitem);

        }
        return response()->json($cartitems);
    }

    public function addProduct(Request $request) {
        $request->validate([
            'producto_id' => 'required',
            'carrito_id'  => 'required',
        ]);

        $carritoid = $request->carrito_id;
        $productoid = $request->producto_id;
        $cart = new CarritoProducto();

        $producto = Producto::findOrFail($productoid);

        $cartItem = CarritoProducto::where(['carrito_id' => $carritoid,
            'producto_id' => $request->producto_id])->first();
        if ($cartItem) {
            $cantidad = $cartItem->cantidad;
            $subtotal = $cartItem->subtotal;
            $cart = CarritoProducto::where([
                'carrito_id' => $carritoid,
                'producto_id' => $request->producto_id])
                ->update([
                    'nombre' => $producto->nombre,
                    'cantidad' => $cantidad + 1,
                    'subtotal' => $subtotal + $producto->precio,
                ]);
        } else{
            $cantidad = 1;
            $subtotal = $producto->precio;
            $nombre = $producto->nombre;
            $cart = CarritoProducto::create([
                'carrito_id' => $carritoid,
                'producto_id' => $productoid,
                'nombre' => $nombre,
                'cantidad' => $cantidad,
                'subtotal' => $subtotal,
            ]);
        }

        return response()->json($cart, 200);
    }

    public function removeProduct(Request $request) {
        $request->validate([
            'producto_id' => 'required',
            'carrito_id'  => 'required',
        ]);

        $cartId = $request->carrito_id;
        $productoId = $request->producto_id;

        $producto = Producto::findOrFail($productoId);

        $cartProduct = CarritoProducto::where(['carrito_id' => $cartId,
            'producto_id' => $productoId])->first();

        $cart = new CarritoProducto();
        if ($cartProduct->cantidad == 1) {
            $cartProduct->delete();
        } else {
            $cart = CarritoProducto::where([
                'carrito_id' => $cartId,
                'producto_id' => $productoId])
                ->update([
                    'cantidad' => $cartProduct->cantidad - 1,
                    'subtotal' => $cartProduct->subtotal - $producto->precio,
                ]);
        }

        return response()->json($cart, 200);
    }

    public function deleteProduct(Request $request) {
        $request->validate([
            'producto_id' => 'required',
            'carrito_id'  => 'required',
        ]);

        $cart = $request->carrito_id;
        $producto = $request->producto_id;

        $cartProduct = CarritoProducto::where(['carrito_id' => $cart,
            'producto_id' => $producto])->first();

        $cartProduct = CarritoProducto::findOrFail($cartProduct->id);
        $cartProduct->producto_id = $producto;
        $cartProduct->carrito_id = $cart;

        $cartProduct->delete();

        return response()->json('Product delete', 200);
    }


}
