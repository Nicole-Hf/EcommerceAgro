<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\User;
use App\Models\Cliente;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\ClienteExport;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('reportes.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function expUsers()
    {
        return Excel::download(new UsersExport, 'user-list.xlsx');
    }
    public function expCompraCliente()
    {
        return Excel::download(new ClienteExport, 'compraCli-list.xlsx');
    }
}
