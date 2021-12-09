<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\Subcategoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductoController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id; //revisar los id empresa con id usuario
        $id_empresa = Empresa::where('user_id', $id)->first();

        $productos = DB::table('productos')
            ->where('empresa_id', '=', $id_empresa->id)
            ->get();

        return view('Productos.index', compact('productos'));
    }

    public function create()
    {
        //$subcategorias = Subcategoria::all();
        $categorias = Categoria::all();

        return view('Productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            //'subcategoria_id' => 'required',
            //'categoria' => 'nullable|integer',
        ]);

        $id_user = Auth::user()->id;
        $id_empresa = Empresa::where('user_id', $id_user)->first();
        $data['empresa_id'] = $id_empresa->id;

        $data['categoria'] = $request->input('texto');
        $data['subcategoria_id'] = $request->input('subcategoria');

        if (is_null($request->imagen)) {
            return back()->withErrors(['error' => 'Introduce una imagen']);
        }

        if ($request->hasFile('imagen')) {
            //$data['imagen'] = Storage::disk('public')->put('imagenes', $request->imagen);
            $nombre = Str::random(10) . $request->file('imagen')->getClientOriginalName();
            $ruta = storage_path() . '\app\public\imagenes/' . $nombre;
            Image::make($request->file('imagen'))
                ->resize(150, 150)->save($ruta);

            $url = '/storage/imagenes/' . $nombre;
            $data['imagen'] = $url;
        }

        $producto = Producto::create($data);
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        $subcategorias = Subcategoria::all();
        return view('Productos.edit', compact('subcategorias', 'producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'subcategoria_id' => 'required',
            'categoria' => 'nullable|integer'
        ]);

        $id_user = Auth::user()->id;
        $id_empresa = Empresa::where('user_id', $id_user)->first();
        $data['empresa_id'] = $id_empresa->id;

        $subcategoria_id = $request->input('subcategoria_id');
        $categoria = Subcategoria::where('id', $subcategoria_id)->first();
        $data['categoria'] = $categoria->categoria_id;

        if ($request->hasFile('imagen')) {
            if (!is_null($producto->imagen)) {
                Storage::disk('public')->delete($producto->imagen);
            }
            //$data['imagen'] = Storage::disk('public')->put('imagenes', $request->imagen);
            $nombre = Str::random(10) . $request->file('imagen')->getClientOriginalName();
            $ruta = storage_path() . '\app\public\imagenes/' . $nombre;
            Image::make($request->file('imagen'))
                ->resize(150, 150)->save($ruta);
            $url = '/storage/imagenes/' . $nombre;
            $data['imagen'] = $url;
        }
        $producto->update($data);

        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        if (!is_null($producto->imagen)) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->load('subcategoria');
        $producto->subcategoria->load('categoria');

        return view('productos.show', ['producto' => $producto]);
    }

    public function indexAdmin()
    {
        $productos = Producto::paginate();
        $empresa = Empresa::all();
        $user = User::all();
        return view('Productos.indexAdmin', compact('productos'), compact('user'));

    }

    public function subcategorias(Request $request) {
        if (isset($request->texto)) {
            $subcategorias = Subcategoria::where('categoria_id', $request->texto)->get();
            return response()->json(
                [
                    'lista' => $subcategorias,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }

}
