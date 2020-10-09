<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Str;

class Product extends Model
{
    protected $guarded = [];

    // protected static function boot()
    // {
    //     parent::boot();

    //     Product::creating(function ($product) {
    //         $product->slug = Str::slug($product->name);
    //     });

    //     Product::updating(function ($product) {
    //         $product->slug = Str::slug($product->name);
    //     });
    // }


    // Relasi ke Category
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getImage()
    {
        return asset('storage/' . $this->image);
    }



    // public function getPriceInRupiahAttribute()
    // {
    //     return 'Rp. ' . number_format($this->price, 0, ',', '.');
    // }
}
