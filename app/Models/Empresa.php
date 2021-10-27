<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $fillable = [
        'nombre',
        'perfil',
        'nit',
        'tipo_negocio',
        'user_id'
    ];

    public function productos() {
        return $this->hasMany(Producto::class, 'empresa_id');
    }

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

}
