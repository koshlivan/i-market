<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',
        'name'
    ];

    public function  product()
    {
        return $this->belongsTo(Product::class);
    }
    public function  attachment()
    {
        return $this->hasOne(Attachment::class);
    }
}
