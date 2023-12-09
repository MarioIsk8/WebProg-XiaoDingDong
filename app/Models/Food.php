<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    public $table = 'foods';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'type',
        'price',
        'description',
        'about',
        'image',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'food_id','id');
    }
}
