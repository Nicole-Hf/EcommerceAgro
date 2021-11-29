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
        if (auth()->user()->role_id == '2') {
            return '/';
        } elseif (auth()->user()->role_id == '3') {
            return '/empresa/home';
        }

        return '/admin/home';
    }
}
