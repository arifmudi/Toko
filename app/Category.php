<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // cara 1
    // protected $fillable = ['name', 'slug'];

    // cara 2
    protected $guarded = [];

    // mengatur untuk mengirim tanpa timestamps
    public $timestamps = false;

    // relasi ke product
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
