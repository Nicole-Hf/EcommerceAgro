<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    use HasFactory;

    protected $table = 'prioridades';
    protected $fillable = [
        'nombre'
    ];

    public function prioridadUsuario() {
        return $this->hasMany(PrioridadUsuario::class,'prioridad_id');
    }
}
