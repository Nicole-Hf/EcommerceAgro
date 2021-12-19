<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $table = 'tarjetas';
    protected $fillable = [
        'nombre',
        'numero',
        'cvv',
        'fecha',
        'cliente_id'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function pedidosPagos() {
        return $this->hasMany(PedidoPago::class,'tarjeta_id');
    }
}
