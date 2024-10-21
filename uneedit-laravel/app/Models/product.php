<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'name', 'price', 'picture', 'stock', 'description'];

    // Relationship to the product-order junction
    public function junction()
    {
        return $this->hasMany(OrderProductJunction::class);
    }
}