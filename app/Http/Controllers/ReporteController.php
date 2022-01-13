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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function importar(Request $request)
    {
        dd($request);
        if ($request->hasFile('documento')) {
            $path = $request->file('documento')->getRealPath();
            $datos = Excel::load($path, function ($reader) {
            })->get();
            dd($datos);
            if (!empty($datos) && $datos->count()) {
                $datos = $datos->toArray();
                for ($i = 0; $i < count($datos); $i++) {
                    $datosImportar[] = $datos[$i];
                }
            }
            User::insert($datosImportar);
        }
        return back();
    }

    public function expUsers()
    {
        return Excel::download(new UsersExport, 'user-list.xlsx');
    }
    public function expCompraCliente()
    {
        return Excel::download(new ClienteExport, 'compraCli-list.xlsx');
    }
}
