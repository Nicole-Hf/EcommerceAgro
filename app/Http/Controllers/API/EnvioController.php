<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\Carrito;
use App\Models\PedidoPago;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    public function createEnvio(Request $request) {
        $request->validate([
            'fechaPago' => 'required',
            'departamento' => 'required',
            'ciudad' => 'required',
            'direccionEnvio' => 'required',
            'carrito_id' => 'required',
            'tarjeta_id' => 'required',
        ]);

        $carrito = Carrito::findOrFail($request->carrito_id);

        $envio = new PedidoPago();
        $envio->monto = $carrito->monto;
        $envio->fechaPago = $request->fechaPago;
        $envio->departamento = $request->departamento;
        $envio->ciudad = $request->ciudad;
        $envio->direccionEnvio = $request->direccionEnvio;
        $envio->telfCliente = $request->telfCliente;
        $envio->carrito_id = $request->carrito_id;
        $envio->tarjeta_id = $request->tarjeta_id;
        $envio->save();

        return response()->json($envio);
    }

    public function getTarjetas($cliente) {
        $cards = new Tarjeta();
        $cards = $cards->getTarjetasUser($cliente);
        $listcards = [];

        foreach ($cards as $card) {
            $creditcard = new \stdClass();
            $creditcard->id = $card->id;
            $creditcard->nombre = $card->nombre;
            $creditcard->numero = $card->numero;
            $creditcard->cvv = $card->cvv;
            $creditcard->fecha = $card->fecha;
            $creditcard->cliente_id = $card->cliente_id;
            array_push($listcards, $creditcard);
        }

        return response()->json($listcards);
    }

}
