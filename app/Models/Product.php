<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'price',
        'image',
        'images',
        'sizes',
        'colors',
        'stock',
        'rating',
        'description',
        'badge',
        'category',
    ];

    protected $casts = [
        'images' => 'array',
        'sizes' => 'array',
        'colors' => 'array',
        'price' => 'integer',
        'stock' => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
