<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'name', 'price', 'description'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
