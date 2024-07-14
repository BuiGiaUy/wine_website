<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id','name', 'slug', 'icon_path', 'parent_id', 'model_type'];
    protected $hidden = ['created_at', 'updated_at'];

    //  Tạo mối quan hệ một nhiều. trả ve danh sách các category con cua 1 category
    public function subCategories():HasMany {
        return $this->hasMany(Category::class, "parent_id", "id");
    }

    // Xoá các category con của một category
    public function deleteChildren(): void
    {
        foreach ($this-> subCategories() as $child) {
            $child->deleteChildren();
            $child->delete();
        }
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    //cấu hình boot cho model category
    public static function boot() : void
    {
        //trước khi xóa 1 category sẽ xóa các category con
        parent::boot();
        static ::deleting(function ($category) {
            $category->deleteChildren();
        });
    }
}
