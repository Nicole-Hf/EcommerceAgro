<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('Empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = new Empresa();
        $empresa->nombre = $request->input('nombre');
        $empresa->perfil = $request->input('perfil');
        $empresa->nit = $request->input('nit');
        $empresa->tipo_negocio = $request->input('tipo_negocio');
        $empresa->user_id = Auth::user()->id;
        $empresa->save();
        return redirect()->route('home');
    }
}
