<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
        'image',
        'is_published',
        'published_at',
        'views'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
