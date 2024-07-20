<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";
    protected $fillable = ["model_type", 'model_id', 'path', 'name', 'alt'];
    protected $hidden = ['created_at', 'updated_at'];

    public function model()
    {
        return $this->morphTo();
    }
    public function post()
    {
        return $this->belongsTo(Post::class, 'model_id', 'id');
    }
}
