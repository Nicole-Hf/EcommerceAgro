<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\Carrito;
use App\Models\CarritoProducto;
use App\Models\Factura;
use App\Models\PedidoPago;
use App\Models\Producto;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    public function createEnvio(Request $request) {
        $request->validate([
            'fechaEnvio' => 'required',
            'departamento' => 'required',
            'ciudad' => 'required',
            'direccionEnvio' => 'required',
            'carrito_id' => 'required',
            'tarjeta_id' => 'required',
        ]);

        $carrito = Carrito::findOrFail($request->carrito_id);

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
                        $carrito->monto = $carrito->monto - $cartitem->subtotal;
                        $carrito->save();
                        $cartitem->delete();
                        //return response()->json("Stock insuficiente");
                    }
                }
            }
        }

        $envio = new PedidoPago();
        $envio->monto = $carrito->monto;
        $envio->fechaEnvio = $request->fechaEnvio;
        $envio->departamento = $request->departamento;
        $envio->ciudad = $request->ciudad;
        $envio->direccionEnvio = $request->direccionEnvio;
        $envio->telfCliente = $request->telfCliente;
        $envio->carrito_id = $request->carrito_id;
        $envio->tarjeta_id = $request->tarjeta_id;
        $envio->save();

        $envio->fechaPago = $envio->created_at;
        $envio->save();

        $carrito->estado = 'Cancelado';
        $carrito->save();

        return response()->json($envio);
    }

    public function createCart(Request $request) {
        $request->validate([
            'cliente_id' => 'required',
        ]);

        $newCart = new Carrito();
        $newCart->cliente_id = $request->cliente_id;
        $newCart->monto = null;
        $newCart->estado = null;
        $newCart->save();

        return response()->json($newCart);
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

    public function createFactura(Request $request){
        $request->validate([
            'nit'  => 'required',
            'pago_id' => 'required',
        ]);

        $envio = PedidoPago::where(['id' => $request->input('pago_id')])->first();

        $factura = new Factura();
        $factura->nit = $request->input('nit');
        //$factura->fecha = $request->input('fecha');;
        $factura->pago_id = $request->input('pago_id');
        $factura->totalImpuesto = ($envio->monto * 0.15) + $envio->monto;
        $factura->save();

        $factura->nroFactura = $factura->id;
        $factura->fecha = $factura->created_at;
        $factura->save();

        return response()->json($factura);
    }

    public function getFactura($facturaID) {
        $factura = Factura::where(['id' => $facturaID])->first();

        $envio = PedidoPago::where(['id' => $factura->pago_id])->first();
        $cartItems = CarritoProducto::where(['carrito_id' => $envio->carrito_id])->get();
        $items = [];

        foreach ($cartItems as $cartItem) {
            $item = new \stdClass();
            $item->nombre = $cartItem->nombre;
            $item->cantidad = $cartItem->cantidad;
            $item->subtotal = $cartItem->subtotal;
            array_push($items, $item);
        }

        $invoice = new \stdClass();
        $invoice->id = $factura->id;
        $invoice->nroFactura = $factura->nroFactura;
        $invoice->nit = $factura->nit;
        $invoice->fecha = $factura->fecha;
        $invoice->totalImp = $factura->totalImpuesto;
        $invoice->items = $items;

        return response()->json($invoice);
    }
}
