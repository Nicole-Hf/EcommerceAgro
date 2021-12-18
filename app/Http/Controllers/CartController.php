<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('carrito.estado');
    }
}