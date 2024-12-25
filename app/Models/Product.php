<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'allergen_info',
        'sauces',
        'extras',
        'drinks',
        'price',
        'discount',
        'salad',
        'discounted_price',
        'image'
    ];

    protected $casts = [
        'allergen_info' => 'array',
      
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sauces()
    {
        return $this->belongsToMany(Sauce::class, 'sauce_product', 'product_id', 'sauce_id');
    }

    public function extras()
    {
        return $this->belongsToMany(Extra::class, 'extra_product', 'product_id', 'extra_id');
    }

    public function drinks()
    {
        return $this->belongsToMany(Drink::class, 'drink_product', 'product_id', 'drink_id');
    }



}
