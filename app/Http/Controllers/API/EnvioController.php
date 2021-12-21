<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\Carrito;
use App\Models\CarritoProducto;
use App\Models\PedidoPago;
use App\Models\Producto;
use App\Models\Tarjeta;
use http\Env\Response;
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

        $cartItems = CarritoProducto::where(['carrito_id' => $request->carrito_id])->get();
        $products = Producto::all();

        foreach ($cartItems as $cartitem) {
            $item_id = $cartitem->producto_id;
            foreach ($products as $product) {
                $product_id = $product->id;
                if ($item_id == $product_id) {
                    if ($product->stock >= $cartitem->cantidad) {
                        $product->stock = $product->stock - $cartitem->cantidad;
                        $product->save();
                    } else {
                        $cartitem->delete();
                        return response()->json("Stock insuficiente");
                    }
                }
            }
        }

        return response()->json($envio);
    }

    public function getTarjetas($cliente) {
        $list = new Tarjeta();
        $list = $list->getTarjetasUser($cliente);
        $cards = [];

        foreach ($list as $item) {
            $item['nombre'] = strip_tags($item['nombre']);
            $item['nombre'] = $Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['nombre']);

            $card = new \stdClass();
            $card->id = $item->id;
            $card->nombre = $item->nombre;
            $card->numero = $item->numero;
            $card->cvv = $item->cvv;
            $card->fecha = $item->fecha;
            $card->cliente_id = $item->cliente_id;
            array_push($cards, $card);
        }

        return response()->json($cards);
    }

}
