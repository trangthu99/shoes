<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';
    public $timestamps = false;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_size', 'sizeId', 'productId')->withPivot('quantity');
    }
}
