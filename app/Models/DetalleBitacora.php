<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleBitacora extends Model
{
    use HasFactory;
    protected $table = 'detalle_bitacoras';
    protected $fillable = [
        'event',
        'nombre',
        'correo',
        'imagen',
        'fecha_accion',
        'bitacora_id'
    ];
    public function bitacoras() {
        return $this->belongsTo(Bitacora::class,'bitacora_id');
    }
    
}
