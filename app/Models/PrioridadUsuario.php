<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrioridadUsuario extends Model
{
    use HasFactory;

    protected $table = 'prioridades_usuarios';
    protected $fillable = [
        'usuario_id',
        'prioridad_id'
    ];

    public function prioridad() {
        return $this->belongsTo(Prioridad::class,'prioridad_id');
    }

    public function usuario() {
        return $this->belongsTo(User::class,'usuario_id');
    }
}
