<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'payment_methods'; // Specify the table name if it's different from the model name convention

    protected $fillable = [
        'name',
        'info',
    ];
}
