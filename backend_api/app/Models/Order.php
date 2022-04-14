<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'quantity'];
    public function products()
    {
        return $this->hasMany(Product::class, 'order_product');
    }
}
