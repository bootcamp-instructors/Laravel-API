<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
      'user_cart_ref_id', 'shipping_ref_id'
    ];
    
    public function shipping()
    {
        return $this->hasOne(Shipping::class, 'shipping_ref_id', 'id');
    }
    public function user_cart()
    {
        return $this->hasOne(UserCart::class, 'user_cart_ref_id', 'id');
    }
}
