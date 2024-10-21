<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Allow mass assignment for relevant fields
    protected $fillable = ['order_product_junction_id'];

    // Define relationship between orders and the junction table
    public function junction()
    {
        return $this->hasMany(OrderProductJunction::class, 'order_id');
    }
}