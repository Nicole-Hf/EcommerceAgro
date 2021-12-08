<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Subcategoria;
use finfo;
use http\Env\Url;

class ProductoController extends Controller
{
    public function allArticles() {
        $list = new Producto();
        $list = $list->getAllArticles();
        foreach ($list as $item) {
            $item['descripcion'] = strip_tags($item['descripcion']);
            $item['descripcion']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['descripcion']);
        }

        return response()->json($list);
    }

    public function someArticles() {
        $list = new Producto();
        $list = $list->getSomeArticles();
        foreach ($list as $item) {
            $item['descripcion'] = strip_tags($item['descripcion']);
            $item['descripcion']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['descripcion']);
        }

        return response()->json($list);
    }

    public function getImage() {
        $image = Producto::all('imagen');

        return response()->make($image, 200, array(
            'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($image)));
    }

    public function getByCategories($value) {
        $productos = new Producto();
        $productos = $productos->orderByCategory($value);

        return response()->json($productos);
    }
}
