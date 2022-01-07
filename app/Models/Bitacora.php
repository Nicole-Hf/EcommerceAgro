<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bitacora extends Model
{
    use HasFactory;
    protected $table = 'bitacoras';
    protected $fillable = [
        'nombre',
        'correo',
        'fecha_hora',
        'user_id'
    ];
    public function detalle_bitacoras() {
        return $this->hasMany(DetalleBitacora::class,'bitacora_id');
    }
    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

    
    
   
}
