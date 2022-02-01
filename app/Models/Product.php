<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'code',
        'description',
        'rating',
        'brand',
        'category_id',
    ];

    public function  options()
    {
        return $this->hasMany(ProductOption::class);
    }
    public function  reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function  category()
    {
        return $this->belongsTo(Category::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
    public function  attachment()
    {
        return $this->hasOne(Attachment::class);
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($product) {
            $product->options()->delete();
        });
    }
}
