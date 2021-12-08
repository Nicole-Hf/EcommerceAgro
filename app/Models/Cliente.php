<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'telefono',
        'razonSocial',
        'user_id'
    ];

    public function tarjetas() {
        return $this->hasMany(Tarjeta::class,'cliente_id');
    }

    public function carrito() {
        return $this->hasOne(Carrito::class,'cliente_id');
    }

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

}
