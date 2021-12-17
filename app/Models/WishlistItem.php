<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    use HasFactory;

    protected $table = 'wishlist_product';
    protected $fillable = [
        'nombre',
        'wishlist_id',
        'producto_id'
    ];

    public function wishlist() {
        return $this->belongsTo(Wishlist::class,'wishlist_id');
    }

    public function producto() {
        return $this->belongsTo(Producto::class,'producto_id');
    }

    public function getListUser($value) {
        return $this->where(['wishlist_id' => $value])->get();
    }
}
