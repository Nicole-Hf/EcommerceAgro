<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\Carrito;
use App\Models\PedidoPago;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    public function createEnvio(Request $request) {
        $request->validate([
            'fechaPago' => 'required',
            'pais' => 'required',
            'ciudad' => 'required',
            'direccionEnvio' => 'required',
            'carrito_id' => 'required',
            'tarjeta_id' => 'required',
        ]);

        $carrito = Carrito::findOrFail($request->carrito_id);

        $envio = new PedidoPago();
        $envio->monto = $carrito->monto;
        $envio->estado = "Pendiente";
        $envio->fechaPago = $request->fechaPago;
        $envio->pais = $request->pais;
        $envio->ciudad = $request->ciudad;
        $envio->direccionEnvio = $request->direccionEnvio;
        $envio->telfCliente = $request->telfCliente;
        $envio->carrito_id = $request->carrito_id;
        $envio->tarjeta_id = $request->tarjeta_id;
        $envio->save();

        return response()->json($envio);
    }

    public function showFactura() {

    }

}
