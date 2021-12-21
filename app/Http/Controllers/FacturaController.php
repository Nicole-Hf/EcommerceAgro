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
        $carrito = CarritoProducto::all();
        $facturas = Factura::all();
        $producto = Producto::all();
        $pedidosP = PedidoPago::all();
        $pedi = DB::table('pedidos_pagos')->pluck('carrito_id'); //id de carrito
        $carriP = DB::table('carritos_productos')->whereIn('carrito_id',$pedi)->get('producto_id'); //id de productos
       // $pro = DB::table('productos')->pluck('id');

        /*foreach($pro as $prod){
            echo $prod->nombre;
        }*/
        
        return view('facturas.show', compact('facturas','producto','pedidosP','carriP'));

    }

    public function pdf(){
        $facturas = Factura::paginate();
       // $pdf = PDF::loadView('facturas.pdf');
        //$pdf->loadHTML('<h1>Test</h1>');
       // return $pdf->stream('facturas.pdf');
        return view('facturas.pdf', compact('facturas'));
    }
}
