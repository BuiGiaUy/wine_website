<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'barcode',
        'description',
        'quantity',
        'price',
        'discount_percent',
        'viewer',
        'rating_number',
        'rating_value',
        'brand_id',
        'post_id',
    ];
    //    protected $with =["posts", "categories", "brands", "images"];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
    public function featuredImage(): HasOne
    {
        return $this->hasOne(Image::class, 'model_id', 'id')
            ->where('model_type', self::class)
            ->orderBy('created_at'); // Order by created_at to get the first image
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity', 'price', 'discount_percent')
            ->withTimestamps();
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'model_id','id')->where('model_type', self::class);
    }

    public function deleteImages()
    {
        $images = Image::where('model_type', 'post')->where('model_id', $this->id)->get();
        foreach ($images as $image) {
            $image->delete();
        }
    }

    public static function boot()
    {
        // Trước khi xóa 1 post sẽ xóa các images, comments
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($post) {
            $post->deleteImages();
        });
    }
}
