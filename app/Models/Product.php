<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'quantity',
        'status'
    ];

    // 定義狀態常量
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_OUT_OF_STOCK = 'out_of_stock';

    // 定義與分類的關聯
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // 獲取所有可能的狀態
    public static function getStatuses()
    {
        return [
            self::STATUS_ACTIVE => '上架',
            self::STATUS_INACTIVE => '下架',
            self::STATUS_OUT_OF_STOCK => '缺貨'
        ];
    }
}
