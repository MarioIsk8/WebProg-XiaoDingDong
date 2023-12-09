<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id','id');
    }

    protected $table = 'carts';
    public $timestamps = null;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'food_id',
        'qty',
    ];
}
