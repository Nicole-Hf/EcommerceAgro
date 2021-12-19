<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TarjetaController extends Controller
{
    public function index(){
        
        $id_user= Auth::user()->id;
        $id_cliente=Cliente::where('user_id',$id_user)->first();
    
        $tarjetas=DB::table('tarjetas')
        ->where('cliente_id','=',$id_cliente->id)
        ->get();
        
        return view('tarjeta.index',compact('tarjetas'));
    }

    public function create(){
        return view('tarjeta.create');
    }

    public function store(Request $request){
        $data=$request->validate([
            'nombre' => 'required',
            'numero' =>'required',
            'fecha' =>'required',
            'cvv' => 'required',
        ]);

        $id_user= Auth::user()->id;
        $id_cliente=Cliente::where('user_id',$id_user)->first();

        $data['cliente_id']=$id_cliente->id;
        $tarjeta=Tarjeta::create($data);
        return redirect()->route('tarjeta.index');

    }

    public function delete(Tarjeta $tarjeta){
        $tarjeta->delete();
        return redirect()->route('tarjeta.index');
    }
}
