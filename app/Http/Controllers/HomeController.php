<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('home');
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
