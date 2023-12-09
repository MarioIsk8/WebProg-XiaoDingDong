<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    public $incrementing = false; // To indicate that the primary key is not auto-incrementing

    protected $primaryKey = ['header_id', 'food_id'];

    public function transactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class, 'header_id', 'id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }

    protected $fillable = [
        'header_id',
        'food_id',
        'qty',
    ];
}
