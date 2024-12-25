<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'image'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'drink_product', 'drink_id', 'product_id');
    }
    

}
