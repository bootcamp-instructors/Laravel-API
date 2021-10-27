<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
      'name', 'description', 'price', 'type', 'image'
    ];
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
