<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $fillable = [
        'nombre'
    ];

    public function subcategorias() {
        return $this->hasMany(Subcategoria::class,'categoria_id');
    }

    public function getAllCategories() {
        return $this->orderBy('id', 'DESC')->get();
        //return $this->where(['subcategoria_id'=>3])->orderBy('id', 'DESC')->limit(3)->get();
    }

    public function getCategoria($value) {
        $subcategoria = new Subcategoria();
        $subcategoria = $subcategoria->select('categoria_id')
            ->where(['id'=>$value])
            ->get();

        return $subcategoria;
    }

    public function getSomeCategories() {
        return $this->orderBy('id', 'DESC')->orderBy('id', 'DESC')->limit(4)->get();
    }
}
