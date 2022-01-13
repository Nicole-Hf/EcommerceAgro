<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $wish_list = app('wishlist');
        $productos = Producto::all();
        //   dd($productos)
        return view('Catalogo.index', ['productos' => $productos]);
    }

    public function ver($id)
    {
        $product = Producto::where('id', $id)->first();
        //dd($product);
        return view('Catalogo.detalle', compact('product'));
    }

    public function mostrar($id)
    {
        $productos = Producto::where('categoria', $id)->get();
        //dd($product);
        return view('Catalogo.categori', ['productos' => $productos]);
    }

    
}