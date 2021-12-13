<?php

namespace App\Http\Controllers\API;

use App\Models\Carrito;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        } else {
            $user->assignRole('Empresa');


            $cliente = new Cliente();
            $cliente->nombre = $input['name'];
            $cliente->user_id = $user->id;
            $cliente->save();

            $carrito = new Carrito();
            $carrito->cliente_id = $cliente->id;
            $carrito->save();
        }

        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'User login successfully.');
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




    public function userInfo()
    {
        $user = auth('api')->user();
        return $user;
    }
}