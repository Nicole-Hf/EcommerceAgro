<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\ResetsPasswords;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResetPassword extends Controller
{
    protected $redirecTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        return redirect()->route('home');
        /* if (Auth()->users()->role== 1 ){
    
    }*/
    }
}