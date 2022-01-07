<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Models\Producto;
use App\Models\WishlistItem;
use finfo;

class ProductoController extends Controller
{
    public function allArticles($wishlist) {
        $list = new Producto();
        $list = $list->getAllArticles();

        $products = [];
        foreach ($list as $item) {
            $item['descripcion'] = strip_tags($item['descripcion']);
            $item['descripcion']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['descripcion']);

            $product = new \stdClass();
            $product->id = $item->id;
            $product->nombre = $item->nombre;
            $product->descripcion = $item->descripcion;
            $product->imagen = $item->imagen;
            $product->precio = $item->precio;
            $product->stock = $item->stock;
            $product->empresa_id = $item->empresa_id;
            $product->subcategoria_id = $item->subcategoria_id;
            $product->categoria = $item->categoria;
            $productList = WishlistItem::where(['producto_id' => $item->id, 'wishlist_id' => $wishlist])->first();
            if ($productList) {
                $product->addToList = true;
            }else {
                $product->addToList = false;
            }
            array_push($products, $product);
        }

        return response()->json($products);
    }

    public function someArticles($wishlist) {
        $list = new Producto();
        $list = $list->getSomeArticles();

        $products = [];

        foreach ($list as $item) {
            $item['descripcion'] = strip_tags($item['descripcion']);
            $item['descripcion']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['descripcion']);

            $product = new \stdClass();
            $product->id = $item->id;
            $product->nombre = $item->nombre;
            $product->descripcion = $item->descripcion;
            $product->imagen = $item->imagen;
            $product->precio = $item->precio;
            $product->stock = $item->stock;
            $product->empresa_id = $item->empresa_id;
            $product->subcategoria_id = $item->subcategoria_id;
            $product->categoria = $item->categoria;
            $productList = WishlistItem::where(['producto_id' => $item->id, 'wishlist_id' => $wishlist])->first();
            if ($productList) {
                $product->addToList = true;
            }else {
                $product->addToList = false;
            }
            array_push($products, $product);
        }

        return response()->json($products);
    }

    public function getByCategories($value) {
        $productos = new Producto();
        $productos = $productos->getByCategory($value);

        return response()->json($productos);
    }
}
