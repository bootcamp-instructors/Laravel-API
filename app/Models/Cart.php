<?php

namespace App\Models;

// use App\CartProduct;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    ];
    
    public function user_cart()
    {
        return $this->hasMany(UserCart::class, 'cart_ref_id');
    }
}
