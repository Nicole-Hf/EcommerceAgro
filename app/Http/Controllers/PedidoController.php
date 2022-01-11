<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\PedidoPago;
use Illuminate\Http\Request;
use App\Models\CarritoProducto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index()
    {
        $id_user = Auth::user()->id;
        $id_cliente = Cliente::where('user_id', $id_user)->first();

        $tarjetas = DB::table('tarjetas')
            ->where('cliente_id', '=', $id_cliente->id)
            ->get();

        $carrito = DB::table('carritos')
            ->where('cliente_id', '=', $id_cliente->id)->where('estado', null)
            ->first();
        return view('pedido.index', compact('tarjetas', 'carrito'));
    }

    public function store(Carrito $carrito, Request $request)
    {

        $data = $request->validate([

            'fechaEnvio' => 'required',
            'departamento' => 'required',
            'ciudad' => 'required',
            'direccionEnvio' => 'required',
            'telfCliente' => 'required',
            'tarjeta_id' => 'required',
        ]);

        $productos = DB::table('carritos_productos')
            ->where('carrito_id', '=', $carrito->id)
            ->get();
        $i = sizeof($productos);
        $c = 0;

        //validar stock
        while ($c < $i) {
            $stockC = DB::table('productos')
                ->where('id', '=', $productos[$c]->producto_id)
                ->get();

            if (($productos[$c]->cantidad) > ($stockC[0]->stock)) {
                return 'no hay stock';
            } else {
                //actualizando stock
                $productos2 = Producto::where('id', $productos[$c]->producto_id)->first();

                $nuevoStock = $stockC[0]->stock - $productos[$c]->cantidad;
                $productos2->stock = $nuevoStock;
                $productos2->save();
            }

            $c = $c + 1;
        }

        $carro = Carrito::where('id', $carrito->id)->first();
        $data['monto'] = $carro->monto;
        $data['fechaPago'] = date("F j, Y, g:i a");

        $data['carrito_id'] = $carro->id;
        // dd($data);
        $pedido = PedidoPago::create($data);

        //creando carrito
        $idUser = auth()->user()->id;
        $cliente = \App\Models\Cliente::where('user_id', $idUser)->first();
        $pedi = PedidoPago::where('carrito_id', $carrito->id)->first();
        $data = Factura::create([

            'fecha' => date("F j, Y, g:i a"),
            'codControl' => 1,
            'nit' => 1111111, // sacar de la tabla pedido
            'totalImpuesto' => 15.00,
            'pago_id' => $pedi->id,
        ]);

        $cambio = \App\Models\carrito::where('cliente_id', $cliente->id)->update([
            'estado' => "cancelado"
        ]);
        $carritoN = \App\Models\Carrito::create([
            'cliente_id' => $cliente->id

        ]);

        return redirect()->route('factura.show'); //revisar ruta gg
    }
}