<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'status' // Add 'status' to the $fillable array
    ];

    // In Category model
public function products()
{
    return $this->hasMany(Product::class);
}


    public function subcategory(){
        return $this->hasMany(Subcategory::class);
    }
}
