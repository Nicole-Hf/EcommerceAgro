<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$wish_list = app('wishlist');
        $items = $wish_list->getContent();
        return view('catalogo.ListaDeDeseos', ['items' => $items]);
    }

 public function remove(Request $request)
    {
        app('wishlist')->remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('Catalogo.ListaDeDeseos');
    }

     public function wishList()
    {
        $items = app('wishlist')->getContent();
        return view('Catalogo.ListaDeDeseos', ['items' => $items]);
    }
    public function addTowishList(Request $request)
    {
        $wish_list = app('wishlist');
        $allowed  = ['id',$request->id ];
        $filtered = array_filter(
            $wish_list->getContent(),
            function ($key) use ($allowed) {
                return in_array($key, $allowed);
            },
            ARRAY_FILTER_USE_KEY
        );
      
        $wish_list->add([
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

    public function actualizarItemWishList(Request $request)
    {
        app('wishlist')->update($request->id, array(
            'quantity' => $request->quantity,
        ));
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('Catalogo.ListaDeDeseos');
    }
}
