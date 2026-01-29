<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'category_id',
        'brand_id',
        'price',
        'old_price',
        'stock',
        'thumbnail',
        'thumbnail_large',
        'hover_thumbnail',
        'hover_thumbnail_large',
        'description',
        'is_hot',
        'is_sale',
        'discount_percent',
        'is_featured',    
        'is_popular',     
        'is_new', 
        'status'
    ];

    protected $casts = [
        'is_hot' => 'boolean',
        'is_sale' => 'boolean',
        'is_featured' => 'boolean',
        'is_popular' => 'boolean',
        'is_new' => 'boolean',
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getStockStatusAttribute()
    {
        if ($this->stock > 20) {
            return 'in_stock';
        } elseif ($this->stock > 1) {
            return 'low_stock';
        } else {
            return 'out_stock';
        }
    }


    // public function getDiscountPercentageAttribute()
    // {
    //     if ($this->old_price && $this->old_price > $this->price) {
    //         $discount = (($this->old_price - $this->price) / $this->old_price) * 100;
    //         return round($discount);
    //     }
    //     return 0;
    // }
}
