<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'category_id', 'product_url', 'images', 'slug'
    ];
    protected $casts = [
        'images' => 'array', // Mengatur kolom images sebagai array
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
