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

    public function allCategories() {
        $list = new Categoria();
        $list = $list->getAllCategories();
        foreach ($list as $item) {
            $item['nombre'] = strip_tags($item['nombre']);
            $item['nombre']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['nombre']);
        }

        return response()->json($list);
    }

    public function getImage() {
        $image = Producto::all('imagen');

        return response()->make($image, 200, array(
            'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($image)));
    }

    public function getSubcategories($value) {
        $subcate = new Subcategoria();
        $subcate = $subcate->getSomeSub($value);

        return response()->json($subcate);
    }

    public function getArticlesxCat($value) {
        $productos = new Producto();
        $productos = $productos->clasificarProductos($value);

        return response()->json($productos);
    }

    public function getCategoryXsub($value) {
        $categoria = new Categoria();
        $categoria = $categoria->getCategoria($value);

        return response()->json($categoria);
    }

}
