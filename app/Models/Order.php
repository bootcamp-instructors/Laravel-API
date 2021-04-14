<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'order_placed_at', 'shipping_id', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }
}
