<?php

namespace App\Http\Controllers;

use App\Models\CarritoProducto;
use App\Models\Factura;
use App\Models\PedidoPago;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function show(){
        $idUser = auth()->user()->id;
        $pedi = DB::table('pedidos_pagos')->pluck('carrito_id'); //id de carrito
        $facturas = Factura::all();
        $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
        $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->where('carrito.id',$pedi)->get();
        
        //$carrito = CarritoProducto::all();
               
        
        $carriP = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
        ->select("productos.nombre")
        ->where("carritos_productos.carrito_id", $carrito->id)->get(); //id de productos
        //$pro = db::table("Productos")->WhereIn('id',$carriP)->get();
        //$result = array_merge($facturas,$carriP);
        /*foreach($facturas as $key=>$val){
            $val2 =  $carriP[$key];
            $result[$key]= $val + $val2;  
        }*/
        
        
        return view('facturas.show', compact('facturas','carriP',''));

    }

    public function pdf(){
        
        $factura = Factura::all();
        $producto = Producto::all();
        $pedidosP = PedidoPago::all();
        $pedi = DB::table('pedidos_pagos')->pluck('carrito_id'); //id de carrito
        $carriP = DB::table('carritos_productos')->whereIn('carrito_id',$pedi)->get('producto_id'); //id de productos
        $carrito = DB::table('carritos_productos')->whereIn('carrito_id',$pedi)->get('subtotal');
        //$pro = db::table("Productos")->WhereIn('id',$carriP)->get();
        $pdf = PDF::loadView('facturas.pdf', compact('factura','producto','pedidosP','carriP','carrito'));
        
        //return view('facturas.pdf', compact('factura','producto','pedidosP','carriP','carrito'));
        return $pdf->stream('facturas.pdf');
       
        
    }
}
