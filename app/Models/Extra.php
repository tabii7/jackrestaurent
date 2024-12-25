<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'image'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'extra_product', 'extra_id', 'product_id');
    }
    

}
