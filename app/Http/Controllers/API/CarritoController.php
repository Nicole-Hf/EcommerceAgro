<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\Carrito;
use App\Models\CarritoProducto;
use App\Models\Cliente;
use App\Models\UserApi;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function getclienteAuth() {
        $user = auth('api')->user();
        $cliente = new Cliente();
        $cliente = $cliente->where(['user_id' => $user->id])->get();

        return response()->json($cliente);
    }

    public function getCarritoAuth($cliente) {
        $carrito = new Carrito();
        $carrito = $carrito->getCarritoAuth($cliente);

        return response()->json($carrito);
    }

    public function getCarritoCompra($carrito) {
        $carrito = new CarritoProducto();
        $carrito = $carrito->getCarritoUser($carrito);

        return response()->json($carrito);
    }

}
