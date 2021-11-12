<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Producto;
use App\Models\Subcategoria;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use stdClass;

class ProductoController extends Controller
{
    public function index(){
        $id=Auth::user()->id;//revisar los id empresa con id usuario
        $id_empresa=Empresa::where('user_id',$id)->first();

        $productos = DB::table('productos')
        ->where('empresa_id', '=', $id_empresa->id)
        ->get();

        return view('Productos.index',compact('productos'));
    }

    public function create(){
        $subcategorias=Subcategoria::all();
        return view('Productos.create',compact('subcategorias'));
    }

    public function store(Request $request){
        $data=$request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' =>'required',
            'stock' =>'required',
            'subcategoria_id' => 'required',
        ]);

        $id_user=Auth::user()->id;
        $id_empresa=Empresa::where('user_id',$id_user)->first();
    
        $data['empresa_id']=$id_empresa->id;

        if(is_null($request->imagen)){
            return back()->withErrors(['error' => 'Introduce una imagen']);
        }

        if($request->hasFile('imagen')){
            $data['imagen']=Storage::disk('public')->put('imagenes',$request->imagen);
        }

        $producto=Producto::create($data);
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto){
        $subcategorias=Subcategoria::all();
        return view('Productos.edit',compact('subcategorias','producto'));
    }

    public function update(Request $request, Producto $producto){
        $data=$request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' =>'required',
            'stock' =>'required',
            'subcategoria_id' => 'required',
        ]);

        $id_user=Auth::user()->id;

        $id_empresa=Empresa::where('user_id',$id_user)->first();

        $data['empresa_id']=$id_empresa->id;

        if ($request->hasFile('imagen')) {
            if (!is_null($producto->imagen)) {
                Storage::disk('public')->delete($producto->imagen);
            }
    
            $data['imagen'] = Storage::disk('public')->put('imagenes', $request->imagen);
        }

        $producto->update($data);
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto){

        if (!is_null($producto->imagen)) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();
        return redirect()->route('productos.index');
    }
}
