<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'tax',
        'delivery_charges',
        'quantity',
        'total',
        'status',
        'tracking_number',

    ];


    public function user()
    {
        return $this->hasone(User::class,'id','user_id');
    }

    public function product()
    {
        return $this->hasone(Product::class,'id','product_id');
    }
}
