<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
    use HasFactory;
    protected $table = 'meal_types';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
      'type',
    ];
    public function menuItem()
    {
        return $this->hasMany(MenuItem::class, 'foreign_key', 'local_key');
    }
}
