<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\PedidoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index(Carrito $carrito){ 
        $id_user= Auth::user()->id;
        $id_cliente=Cliente::where('user_id',$id_user)->first();
    
        $tarjetas=DB::table('tarjetas')
        ->where('cliente_id','=',$id_cliente->id)
        ->get();

        $carro=Carrito::where('id',$carrito->id)->first();
        return view('pedido.index',compact('tarjetas','carro'));
    }

    public function store(Carrito $carrito,Request $request){
        
        $data=$request->validate([
            'fechaEnvio' => 'required',
            'departamento' => 'required',
            'ciudad' => 'required',
            'direccionEnvio' => 'required',
            'telfCliente' => 'required',
            'tarjeta_id' => 'required',
        ]);

        $carro=Carrito::where('id',$carrito->id)->first();
        $data['monto']=$carro->monto;

        $data['carrito_id']=$carrito->id;
        $pedido=PedidoPago::create($data);

        return redirect()->route('index');
    }
}
