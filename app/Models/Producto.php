<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'stock',
        'empresa_id',
        'subcategoria_id',
        'categoria'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

   /* public function marca() {
        return $this->belongsTo(Marca::class,'marca_id');
    }*/

    public function subcategoria() {
        return $this->belongsTo(Subcategoria::class,'subcategoria_id');
    }

    public function carritoProducto() {
        return $this->hasMany(CarritoProducto::class,'producto_id');
    }

    public function getAllArticles() {
        return $this->orderBy('id', 'DESC')->get();
        //return $this->where(['subcategoria_id'=>3])->orderBy('id', 'DESC')->limit(3)->get();
    }

    public function getSomeArticles() {
        return $this->orderBy('id', 'DESC')->limit(4)->get();
    }

    public function clasificarProductos($value) {
        $subcategorias = new Subcategoria();
        $subcategorias = $subcategorias->getSomeSub($value);

        return $this->where('subcategoria_id->categoria_id', $value)->get();
    }
}
