<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';
    protected $fillable = [
        'cliente_id'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function wishlistProducto() {
        return $this->hasMany(WishlistItem::class,'wishlist_id');
    }
}
