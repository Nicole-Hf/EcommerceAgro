<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Factura;
use App\Models\PedidoPago;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexEmp()
    {
        $userId = auth()->user()->id;
        $empresa = Empresa::where(['user_id' => $userId])->first();
        $cantproduct = Producto::where(['empresa_id' => $empresa->id])->count();

        $productos = Producto::where(['empresa_id' => $empresa->id])->get();

        $totalVentas = Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->join("carritos_productos", "carritos_productos.carrito_id", "=", "carritos.id")
            ->join("productos", "productos.id", "=", "carritos_productos.producto_id")
            ->where("empresa_id", $empresa->id)->sum('carritos_productos.subtotal');

        $promVentas = Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->join("carritos_productos", "carritos_productos.carrito_id", "=", "carritos.id")
            ->join("productos", "productos.id", "=", "carritos_productos.producto_id")
            ->where("empresa_id", $empresa->id)->avg('carritos_productos.subtotal');

        $cantCliente = Factura::join("pedidos_pagos", "pedidos_pagos.id", "=", "facturas.pago_id")
            ->join("carritos", "carritos.id", "=", "pedidos_pagos.carrito_id")
            ->join("carritos_productos", "carritos_productos.carrito_id", "=", "carritos.id")
            ->join("productos", "productos.id", "=", "carritos_productos.producto_id")
            ->where("empresa_id", $empresa->id)->count();

        /*$ventasmes = DB::select("SELECT date_part('month',v.fechaPago) as mes, sum(v.monto) as totalmes
                               from pedidos_pagos v
                               group by date_part('month',v.fechaPago)
                               order by date_part('month',v.fechaPago)
                               desc limit 12");*/

        return view('home', compact('cantproduct',
            'productos', 'totalVentas', 'promVentas', 'cantCliente'));
    }

    public function indexAdmin()
    {
        $cantuser = User::count();
        $cantproduct = Producto::count();
        $cantcliente = Cliente::count();
        $cantempresa = Empresa::count();
        $usuario = User::all();
        $cliente = Cliente::all();
        $empresa = Empresa::all();
        return view('homeAdmin', ['cantuser' => $cantuser,
        'cantproduct' => $cantproduct,
        'cantcliente' => $cantcliente,
        'cantempresa' => $cantempresa,
        'usuarios' => $usuario,
        'clientes' => $cliente,
        'empresas' => $empresa]);
    }
}
