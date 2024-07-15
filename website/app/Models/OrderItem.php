<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items'; // Assuming 'OrderItem' is your table name
    protected $fillable = ['id', 'product_id', 'order_id', 'quantity', 'price', 'discount']; // Specify columns you want to allow mass assignment

    // Define the relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id','id');
    }


}
