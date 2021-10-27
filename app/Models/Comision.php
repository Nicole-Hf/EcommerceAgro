<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    use HasFactory;

    protected $table = 'comisiones';
    protected $fillable = [
        'porcentaje',
        'monto',
        'pago_id'
    ];

    public function pedidoPago() {
        return $this->belongsTo(PedidoPago::class,'pago_id');
    }
}
