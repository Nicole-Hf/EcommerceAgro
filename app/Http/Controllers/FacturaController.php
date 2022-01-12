<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Factura;

use App\Models\PedidoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use PDF;

class FacturaController extends Controller
{
    public  $items = [];
    //

    public function show()
    {
        /*   $resulPago = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->get(); */
        $idUser = auth()->user()->id;
        $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
        //  $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->where('estado', 'cancelado')->get();

        /* 
        $resulPago =  Factura::orderBy('id', 'desc')->get(); */
        $resulPago = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->select("facturas.*", "pedidos_pagos.monto")->where("cliente_id", $cliente->id)->where('carritos.estado', 'cancelado')->get();


        return view('factura.show', compact('resulPago'));
    }

    public function pdf($pedi)
    {
        // dd($pedi);

        $idUser = auth()->user()->id;
        $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
        $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();

        $resulPago = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->join("carritos_productos", "carritos_productos.carrito_id", "=", "carritos.id")
            ->select("facturas.*", "*")->where("cliente_id", $cliente->id)->where('facturas.pago_id', $pedi)
            ->get();

        $monto = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->select("facturas.id", "*")->where('facturas.pago_id', $pedi)->first();

        $fact_id = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->select("facturas.*")->where('facturas.pago_id', $pedi)->first();

        return view('factura.pdf', compact('resulPago', 'monto', 'fact_id'));
    }

    public function imprimir($pedido)
    {

        $idUser = auth()->user()->id;
        $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
        $carrito = \App\Models\Carrito::where('cliente_id', $cliente->id)->first();

        $resulP = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->join("carritos_productos", "carritos_productos.carrito_id", "=", "carritos.id")
            ->select("facturas.*", "*")->where("cliente_id", $cliente->id)->where('facturas.pago_id', $pedido)
            ->get();

        $mont = \App\Models\Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->select("facturas.id", "*")->where('facturas.pago_id', $pedido)->first();

        // return view('factura.prueba', compact('resulP', 'mont'));
        $pdf = PDF::loadView('factura.prueba', compact('resulP', 'mont'));
        return  $pdf->download('factura' . $pedido . '-pdf.pdf');
    }
}