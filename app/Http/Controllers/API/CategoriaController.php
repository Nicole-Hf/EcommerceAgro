<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Subcategoria;
use finfo;
use http\Env\Url;

class CategoriaController extends Controller
{
    public function allCategories() {
        $list = new Categoria();
        $list = $list->getAllCategories();
        foreach ($list as $item) {
            $item['nombre'] = strip_tags($item['nombre']);
            $item['nombre']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['nombre']);
        }

        return response()->json($list);
    }

    public function someCategories() {
        $list = new Categoria();
        $list = $list->getSomeCategories();
        foreach ($list as $item) {
            $item['nombre'] = strip_tags($item['nombre']);
            $item['nombre']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['nombre']);
        }

        return response()->json($list);
    }

    public function getAllSubCat() {
        $list = new Subcategoria();
        $list = $list->getAllSub();
        foreach ($list as $item) {
            $item['nombre'] = strip_tags($item['nombre']);
            $item['nombre']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['nombre']);
        }

        return response()->json($list);
    }

    public function getSomeSubcat($value) {
        $subcate = new Subcategoria();
        $subcate = $subcate->getSomeSub($value);

        return response()->json($subcate);
    }

    public function getCategoryXsub($value) {
        $categoria = new Categoria();
        $categoria = $categoria->getCategoria($value);

        return response()->json($categoria);
    }

}
