<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoProducto;
use App\Models\Cliente;
use App\Models\PedidoPago;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index(){ 
        $id_user= Auth::user()->id;
        $id_cliente=Cliente::where('user_id',$id_user)->first();
    
        $tarjetas=DB::table('tarjetas')
        ->where('cliente_id','=',$id_cliente->id)
        ->get();

        $carrito=DB::table('carritos')
                    ->where('cliente_id','=',$id_cliente->id)
                    ->first();
        return view('pedido.index',compact('tarjetas','carrito'));
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

        $productos=DB::table('carritos_productos')
        ->where('carrito_id','=',$carrito->id)
        ->get();
        $i=sizeof($productos);
        $c=0;

        //validar stock
        while($c < $i){
            $stockC=DB::table('productos')
                    ->where('id','=',$productos[$c]->producto_id)
                    ->get();

            if(($productos[$c]->cantidad) > ($stockC[0]->stock)){
                return 'no hay stock';
            }else{
                //actualizando stock
               $productos2=Producto::where('id',$productos[$c]->producto_id)->first();
               
                $nuevoStock=$stockC[0]->stock - $productos[$c]->cantidad;
                $productos2->stock=$nuevoStock;
                $productos2->save();
            }
            
         $c=$c+1;

        }

        $carro=Carrito::where('id',$carrito->id)->first();
        $data['monto']=$carro->monto;
        $data['fechaPago']=date("F j, Y, g:i a");

        $data['carrito_id']=$carro->id;
       // dd($data);
        $pedido=PedidoPago::create($data);

        return redirect()->route('index');//revisar ruta gg
    }
}
