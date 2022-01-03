<?php

namespace App\Http\Controllers\API;

use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if ($user->role_id == 2) {
            $user->assignRole('Cliente');

            $cliente = new Cliente();
            $cliente->nombre = $input['name'];
            $cliente->user_id = $user->id;
            $cliente->save();

            $carrito = new Carrito();
            $carrito->cliente_id = $cliente->id;
            $carrito->save();

            $wishlist = new Wishlist();
            $wishlist->cliente_id = $cliente->id;
            $wishlist->save();
        }

        $response = [
            'success' => true,
            'token' => $user->createToken('MyApp')->accessToken,
            'id' => $user->id,
            'name' => $user->name,
            'cliente' => $cliente->id,
            'carrito' => $carrito->id,
            'wishlist' => $wishlist->id,
        ];

        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->load('cliente');
            //$user->cliente->load('carrito');
            $user->cliente->load('wishlist');
            $carrito = new Carrito();
            $carrito = $carrito->getCartEmpty($user->cliente->id);
            $response = [
                'success' => true,
                'token' => $user->createToken('MyApp')->accessToken,
                'id' => $user->id,
                'name' => $user->name,
                'cliente' => $user->cliente->id,
                //'carrito' => $user->cliente->carrito->id, $carrito[0]['id']
                'carrito' => $carrito->id,
                'wishlist' => $user->cliente->wishlist->id,
            ];

            return response()->json($response, 200);
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ["message" => "You have successfully logout"];

        return response($response, 200);
    }

    public function userInfo() {
        $user = auth('api')->user();
        return $user;
    }
}
