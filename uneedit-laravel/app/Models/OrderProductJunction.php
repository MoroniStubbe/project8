<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProductJunction extends Model
{
    use HasFactory;

    protected $table = 'order_product_junction'; // Explicitly define the table name

    protected $fillable = ['product_id', 'quantity'];

    // Define the relationship with the product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the relationship with the order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}