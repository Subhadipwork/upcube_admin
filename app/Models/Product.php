<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function getbrand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function variant(){
        return $this->hasMany(ProductVariant::class);
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    
}
