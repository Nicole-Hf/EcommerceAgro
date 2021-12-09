<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $items = \Cart::getContent();
        return view('carrito.estado', ['items' => $items]);
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('carrito.estado');
    }

    public function cartList()
    {
        $cartItems = \Cart::getContent();
        dd($cartItems);
        // return view('carrrito.estado', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->nombre,
            'price' => $request->precio,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->imagen,
            )

        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect('/');
    }

    public function actualizarItemCarrito(Request $request)
    {
        \Cart::update($request->id, array(
            'quantity' => $request->quantity,
        ));
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('carrito.estado');
    }
}