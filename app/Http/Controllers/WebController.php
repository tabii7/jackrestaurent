<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Extra;
use App\Models\Drink;
use App\Models\Sauce;
use App\Models\Coupon;
use App\Models\NewUserCoupon;
use App\Models\PpickupDiscount;
use App\Models\LoyaltyProgram;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
    public function signin()
    {
        return view('signin');
    }
    public function signup()
    {
        return view('signup');
    }
    public function shop()
    {
        $categories = Category::all();
        $products = Product::with('category')->get(); // Eager load categories
        return view('shop', compact('products', 'categories'));
    }
    public function product_detail($id)
    {
        $product = Product::findOrFail($id);

        
        return view('product_detail' ,compact('product'));
    }
    public function checkout()
    {
        return view('checkout');
    }
    
    public function headerData()
    {
        $cartItems = [
            ['name' => 'Egg Sandwich', 'quantity' => 1, 'price' => 80.58, 'image' => 'vp-3.png'],
            // Add more items
        ];
        $cartTotal = array_sum(array_column($cartItems, 'price'));
        $cartCount = count($cartItems);

        return view('header', compact('cartItems', 'cartTotal', 'cartCount'));
    }

    public function profile()
    {
        return view('profile');
    }
    public function orders()
    {
        return view('orders');
    }
    public function saved_address()
    {
        return view('saved_address');
    }
   
    public function select_address()
    {
        $cart = Session::get('cart', []);
      
        return view('address', compact('cart'));
    }
    public function payment()
    {
        $cart = Session::get('cart', []);
        return view('payment', compact('cart'));
    }
    public function confirm_order()
    {
        return view('confirm_order');
    }
   
    

}
