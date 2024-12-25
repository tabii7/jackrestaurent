<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'image'];

    public function sauces()
    {
        return $this->belongsToMany(Sauce::class, 'sauce_product', 'product_id', 'sauce_id')->withTrashed();
    }
    
    

}
