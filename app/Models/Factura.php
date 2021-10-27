<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $fillable = [
        'nroFactura',
        'fecha',
        'codControl',
        'nit',
        'totalImpuesto',
        'pago_id'
    ];

    public function pedidoPago() {
        return $this->belongsTo(PedidoPago::class,'pago_id');
    }
}
