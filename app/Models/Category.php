<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    // 定義與父級分類的關聯
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // 定義與子分類的關聯
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // 定義與產品的關聯
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
