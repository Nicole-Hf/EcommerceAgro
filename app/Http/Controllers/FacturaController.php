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
    public function show()
    {
        $idUser = auth()->user()->id;
        $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
        $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();

        /*  $resultado = CarritoProducto::join("productos", "productos.id", "=", "carritos_productos.producto_id")
            ->select("carritos_productos.*", "productos.nombre", "productos.imagen", "productos.precio")
            ->where("carritos_productos.carrito_id", $carrito->id)->get();
 */
        $resulPago = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->join("carritos_productos", "carritos_productos.carrito_id", "=", "carritos.id")
            ->join("productos", "productos.id", "=", "carritos_productos.producto_id")
            ->select("*")->where("cliente_id", $cliente->id)->get(); //->get();


        $facturas = Factura::all();
        /* $carrito = CarritoProducto::all();
     
        $producto = Producto::all();
        $pedidosP = PedidoPago::all();
        $pedi = DB::table('pedidos_pagos')->pluck('carrito_id'); //id de carrito
        $carriP = DB::table('carritos_productos')->whereIn('carrito_id',$pedi)->get('producto_id'); //id de productos
       // $pro = DB::table('productos')->pluck('id');

        foreach($pro as $prod){
            echo $prod->nombre;
        }*/

        return view('facturas.show', compact('resulPago'));
    }

    public function pdf()
    {
        $facturas = Factura::paginate();
        // $pdf = PDF::loadView('facturas.pdf');
        //$pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream('facturas.pdf');
        return view('facturas.pdf', compact('facturas'));
    }
}