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
        'user_id',
    ];

    public function tarjetas() {
        return $this->hasMany(Tarjeta::class,'cliente_id');
    }

    public function carritos() {
        return $this->hasMany(Carrito::class,'cliente_id');
    }

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function wishlist() {
        return $this->hasOne(Wishlist::class,'cliente_id');
    }
}
