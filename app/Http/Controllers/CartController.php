<?php

namespace App\Http\Controllers;
use App\Models\Producto;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = \Cart::getContent();
        return view('carrito.estado', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //
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
                'image' => $request->imagen,   )
          
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect('/'); 
    }

       public function actualizarItemCarrito(Request $request)
    { 

        \Cart::update($request->id, array(
  'quantity' => $request->quantity , 
));
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('carrito.estado'); 
    }

}