<?php

namespace App\Models;

// use App\Cart
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    protected $table = 'cart_products';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'amount', 'product_ref_id', 'cart_ref_id'
    ];
    
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
     public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
