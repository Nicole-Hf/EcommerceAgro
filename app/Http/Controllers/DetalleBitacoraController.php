<?php

namespace App\Http\Controllers;

use App\Models\DetalleBitacora;
use Illuminate\Http\Request;

class DetalleBitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleBitacora  $detalleBitacora
     * @return \Illuminate\Http\Response
     */
    public function show($correo)
    {
        $detalles = DetalleBitacora::where('correo',$correo)->get();
        //dd($product);
        return view('Bitacora.show', compact('detalles'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleBitacora  $detalleBitacora
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleBitacora $detalleBitacora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleBitacora  $detalleBitacora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleBitacora $detalleBitacora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleBitacora  $detalleBitacora
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleBitacora $detalleBitacora)
    {
        //
    }
}
