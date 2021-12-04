<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';
    protected $fillable = [
        'nombre',
        'categoria_id'
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function productos() {
        return $this->hasMany(Producto::class,'subcategoria_id');
    }

    public function getSomeSub($value) {
        //$categoria = Categoria::findOrFail($value);

        return $this->where(['categoria_id'=>$value])->orderBy('id', 'DESC')->get();
    }
}
