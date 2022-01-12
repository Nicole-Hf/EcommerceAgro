<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use App\Models\PedidoPago;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Producto;
use App\Models\Empresa;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('Clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->telefono = $request->input('telefono');
        $cliente->razonSocial = $request->input('razonSocial');
        $cliente->user_id = Auth::user()->id;
        $cliente->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $productos = Producto::paginate();
        $empresa = Empresa::all();
        return view('Clientes.show', compact('productos'), compact('empresa')) ;
    }

    public function getClientes()
    {
        $userId = auth()->user()->id;
        $empresa = Empresa::where(['user_id' => $userId])->first();

        $clientes = PedidoPago::join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->join("clientes", "clientes.id", "=", "carritos.cliente_id")
            ->join("carritos_productos", "carritos_productos.carrito_id", "=", "carritos.id")
            ->join("productos", "productos.id", "=", "carritos_productos.producto_id")
            ->select("clientes.*")->where("empresa_id", $empresa->id)->get();

        return view('Clientes.indexEmpresa', compact('clientes'));
    }
}
