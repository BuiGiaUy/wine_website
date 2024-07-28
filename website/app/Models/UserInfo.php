<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    // Các thuộc tính có thể được gán
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
    ];

    // Quan hệ ngược lại với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
