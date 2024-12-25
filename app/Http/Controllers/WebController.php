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
use Carbon\Carbon;

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


        return view('product_detail', compact('product'));
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
        $address = DB::table('addresses')->where('user_id', Auth()->user()->id)->get();
        return view('saved_address', compact('address'));
    }

    public function select_address()
    {
        $cart = Session::get('cart', []);
        $couponAmounts = null;
        $address = null;
        $coupons = null;

        if (auth()->user()) {

            $user = auth()->user();
            $user_id = $user->id;
            $payment = DB::table('payments')->where('user_id', $user_id)->get();
            if ($payment->count() > 0) {
                $payment = $payment->first();
                $address = DB::table('addresses')->where('user_id', $user_id)->get();
                if ($address->count() > 0) {
                    $first_order = 0;
                    $userCreatedAt = Carbon::parse($user->created_at);

                    $newUserCoupons = DB::table('new_user_coupons')->get();

                    $validCoupons = $newUserCoupons->filter(function ($coupon) use ($userCreatedAt) {
                        $couponExpiryDate = Carbon::parse($coupon->created_at)->addDays($coupon->expiry);
                        return $userCreatedAt->lessThanOrEqualTo($couponExpiryDate);
                    });

                    // Get valid coupon amounts (assuming 'amount' column exists)
                    $couponAmounts = $validCoupons->pluck('amount');

                }
            }

            $coupons = DB::table('coupons')->get();

            $coupons = $coupons->filter(function ($coupon) {
                // Ensure we exclude null coupons from the collection
                return !is_null($coupon);
            })->map(function ($coupon) {
                // Check for valid data to avoid errors
                if (!is_null($coupon->created_at) && !is_null($coupon->expiry)) {
                    // Calculate expiry date
                    $createdAt = Carbon::parse($coupon->created_at);
                    $expiryDate = $createdAt->addDays($coupon->expiry);

                    // Calculate remaining days
                    $remainingDays = Carbon::now()->diffInDays($expiryDate, false);

                    // Add new values to the coupon object
                    $coupon->expiry_date = $expiryDate->toDateString();
                    $coupon->remaining_days = $remainingDays;

                } else {
                    // Handle invalid or null coupon properties
                    $coupon->expiry_date = null;
                    $coupon->remaining_days = null;
                }

                return $coupon;
            });

            $address = DB::table('addresses')->where('user_id', $user_id)->get();


            //   dd("ok");
            return view('address', compact('cart', 'couponAmounts', 'address', 'coupons'));
        }
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

    public function store_address(Request $request)
    {
        DB::table('addresses')->insert([
            'user_id' => Auth()->user()->id,
            'label' => $request->label,
            'address' => $request->address,
            'phone' => $request->phone,
            'selected' => 0, // Default value
        ]);
        return redirect()->back()->with('success', 'address add successfully.');

    }
    public function update_address(Request $request)
    {
        DB::table('addresses')
            ->where('id', $request->idd) // Corrected here
            ->update([
                'label' => $request->label,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

        return redirect()->back()->with('success', 'address update successfully.');

    }


}
