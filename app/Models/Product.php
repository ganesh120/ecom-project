<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function secret()
    {
        return $this->hasOne(Secret::class ,'id','secret_id');
    }

    protected$table="products";
    protected$fillable=['name','description','price','discount','secret_code','status','image',];
}
 