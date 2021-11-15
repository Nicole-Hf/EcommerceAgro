<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias=Subcategoria::all();
        return view('Categorias.Subcategorias.index',compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::all();
        return view('Categorias.subcategorias.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->validate([
            'nombre' => 'required',
            'categoria_id'=>'required',
        ]);

        $subcategoria=Subcategoria::create($data);
        return redirect()->route('subcategorias.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategoria $subcategoria)
    {
        $categorias=Categoria::all();
        return view('Categorias.subcategorias.edit',compact('subcategoria','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategoria $subcategoria)
    {
        $data=$request->validate([
            'nombre' => 'required',
            'categoria_id'=>'required',
        ]);

        $subcategoria->update($data);
        return redirect()->route('subcategorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();
        return redirect()->route('subcategorias.index');
    }
}
