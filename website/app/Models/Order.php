<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'Orders'; // Assuming 'Orders' is your table name
    protected $fillable = ['id', 'user_id','payment_id', 'total', 'discount', 'total_amount']; // Specify columns you want to allow mass assignment

    // Define the relationship with OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    // Định nghĩa các quan hệ nếu có
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
