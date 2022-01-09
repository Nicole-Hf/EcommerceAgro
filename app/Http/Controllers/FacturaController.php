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
        $resulPago = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->join("carritos_productos", "carritos_productos.carrito_id", "=", "carritos.id")
            ->join("productos", "productos.id", "=", "carritos_productos.producto_id")
            ->select("*")->where("cliente_id", $cliente->id)->get(); //->get();


        $facturas = Factura::all();
        return view('facturas.show', compact('resulPago'));
    }

    public function pdf(){
        
        $idUser = auth()->user()->id;
        $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
        $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();
        $resulPago = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->join("carritos_productos", "carritos_productos.carrito_id", "=", "carritos.id")
            ->join("productos", "productos.id", "=", "carritos_productos.producto_id")
            ->select("*")->where("cliente_id", $cliente->id)->get(); //->get();

        $facturas = Factura::all();
        //$pdf = PDF::loadView('facturas.pdf',compact('resulPago'));       
        
        return view('facturas.pdf',compact('resulPago'));
        //return $pdf->stream('facturas.pdf');
       
        
    }
}
