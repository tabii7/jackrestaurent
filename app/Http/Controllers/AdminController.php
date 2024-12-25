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

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function login(Request $request)
    {
        // Define the correct email and password
        $correctEmail = 'admin@gmail.com';
        $correctPassword = '12345678';

        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the provided credentials match
        if ($request->email === $correctEmail && $request->password === $correctPassword) {
            // Redirect to dashboard if credentials are correct
            return redirect()->route('admin.dashboard')->with('success', 'Welcome to the admin dashboard!');
        } else {
            // Redirect back with an error message if credentials are incorrect
            return redirect()->route('admin.login')->withErrors(['error' => 'Invalid email or password.']);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function allSauces()
    {
        $sauces = Sauce::all(); // Assuming you have a Sauce model
        return view('admin.all_sauce', compact('sauces'));
    }
    public function editSauce($id)
    {
        $sauce = Sauce::findOrFail($id);
        return response()->json($sauce);
    }

    public function updateSauce(Request $request, $id)
    {
        $sauce = Sauce::findOrFail($id);
        $sauce->name = $request->name;
        $sauce->price = $request->price;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $sauce->image = $imagePath;
        }
        $sauce->save();
        return response()->json(['success' => true]);
    }

    public function deleteSauce($id)
    {
        $sauce = Sauce::findOrFail($id);
        $sauce->delete();
        return redirect()->back()->with('success', 'Sauce deleted successfully.');
    }
    public function allDrinks()
    {
        $drinks = Drink::all(); // Assuming you have a Drink model
        return view('admin.all_drinks', compact('drinks'));
    }

    public function editDrink($id)
    {
        $Drink = Drink::findOrFail($id);
        return response()->json($Drink);
    }

    public function updateDrink(Request $request, $id)
    {
        $Drink = Drink::findOrFail($id);
        $Drink->name = $request->name;
        $Drink->price = $request->price;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $Drink->image = $imagePath;
        }
        $Drink->save();
        return response()->json(['success' => true]);
    }

    public function deleteDrink($id)
    {
        $Drink = Drink::findOrFail($id);
        $Drink->delete();
        return redirect()->back()->with('success', 'Drink deleted successfully.');
    }

    // All products function
    public function allProducts()
    {
        $products = Product::all();
    
        return view('admin.all_products', compact('products'));
    }
    
 

    public function addNewProduct()
    {
        $categories = Category::all();
        $sauces = Sauce::all();
        $drinks = Drink::all();
        $extras = Extra::all();
        return view('admin.add_new_product', compact('sauces', 'drinks', 'extras', 'categories'));
    }
    // All orders function
    public function allOrders()
    {
        return view('admin.all_orders');
    }

    // All extras function
    public function allExtras()
    {
        $extras = Extra::all();
        return view('admin.all_extras', compact('extras'));
    }

    public function editExtra($id)
    {
        $extra = Extra::findOrFail($id);
        return response()->json($extra);
    }

    public function updateExtra(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $extra = Extra::findOrFail($id);

        // If a new image is uploaded, update the image path
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $extra->image = $imagePath;
        }

        $extra->name = $request->input('name');
        $extra->price = $request->input('price');
        $extra->save();

        return response()->json(['success' => 'Extra updated successfully!']);
    }

    public function deleteExtra($id)
    {
        $extra = Extra::findOrFail($id);
        $extra->delete();

        return redirect()->back()->with('success', 'Extra deleted successfully!');
    }


    // Add new sauce function
    public function addNewSauce()
    {
        return view('admin.add_new_sauce');
    }



    // Add new extras function
    public function addNewExtras()
    {
        return view('admin.add_new_extras');
    }

    // Add new drinks function
    public function addNewDrinks()
    {
        return view('admin.add_new_drinks');
    }

    // Add new category function
    public function category()
    {
        $categories = Category::all();
        return view('admin.add_new_category', compact('categories'));
    }
    /* Store a new category */
    public function storecategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate a unique filename for the image
        $imageName = time() . '.' . $request->image->extension();

        // Store the image in the 'categories' folder in the public disk
        $request->image->storeAs('categories', $imageName, 'public');

        // Create the category with the relative image path
        Category::create([
            'name' => $request->name,
            'image' => 'categories/' . $imageName, // Store the relative path
        ]);

        return redirect()->route('admin.add_new_category')->with('success', 'Category added successfully.');
    }

    /* Edit category details */
    public function editcategory($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }



    /* Update an existing category */
    public function updatecategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->name;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($category->image) {
                Storage::delete('public/' . $category->image); // Correctly delete the image using the full path
            }
            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $category->image = $request->file('image')->storeAs('categories', $imageName, 'public');
        }

        $category->save(); // Save the updated category

        return response()->json(['success' => 'Category updated successfully.']);
    }


    /* Delete a category */
    public function destroycategory($id)
    {
        $category = Category::findOrFail($id);

        // Delete the image from storage before deleting the category
        if ($category->image) {
            Storage::delete('public/' . $category->image); // Ensure you delete the image
        }

        $category->delete(); // Delete the category
        return redirect()->route('admin.add_new_category')->with('success', 'Category deleted successfully.');
    }
    // Order details function
    public function orderDetail()
    {
        // You can fetch the order details by ID here
        return view('admin.order_detail'); // Pass the order ID to the view
    }

    // Admin login function
    public function adminLogin()
    {
        return view('admin.admin_login'); // Return the login view
    }
    public function storeExtra(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle file upload
        $imagePath = $request->file('image')->store('uploads', 'public');

        // Save the data to the database
        Extra::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Extra added successfully!');
    }
    public function storeDrink(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        Drink::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Drink added successfully!');
    }

    public function storeSauce(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        Sauce::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Sauce added successfully!');
    }

       

    public function loyalty_program()
    {
        $loyaltyProgram = LoyaltyProgram::first();
        $coupons = Coupon::all();

        return view('admin.loyalty', compact('loyaltyProgram', 'coupons'));
    }

    public function storeCoupon(Request $request)
    {
        $request->validate([
            'points' => 'required|integer',
            'discount' => 'required|numeric',
            'expiry' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle the image upload
        $imagePath = $request->file('image')->store('coupons', 'public');

        // Save coupon
        Coupon::create([
            'points' => $request->points,
            'discount' => $request->discount,
            'expiry' => $request->expiry,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Coupon added successfully!');
    }

    public function updateCoupon(Request $request)
{
    $request->validate([
        'points' => 'required|integer',
        'discount' => 'required|numeric',
        'expiry' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $coupon = Coupon::findOrFail($request->id);

    // Handle optional image update
    if ($request->hasFile('image')) {
        // Delete the old image
        if ($coupon->image && file_exists(storage_path('app/public/' . $coupon->image))) {
            unlink(storage_path('app/public/' . $coupon->image));
        }
        // Save the new image
        $imagePath = $request->file('image')->store('coupons', 'public');
        $coupon->image = $imagePath;
    }

    // Update other fields
    $coupon->update([
        'points' => $request->points,
        'discount' => $request->discount,
        'expiry' => $request->expiry,
    ]);

    return redirect()->back()->with('success', 'Coupon updated successfully!');
}
public function deleteCoupon($id)
{
    $coupon = Coupon::findOrFail($id);

    // Delete the image
    if ($coupon->image && file_exists(storage_path('app/public/' . $coupon->image))) {
        unlink(storage_path('app/public/' . $coupon->image));
    }

    $coupon->delete();

    return redirect()->back()->with('success', 'Coupon deleted successfully!');
}

    public function new_user_voucher()
    {
        $vouchers = NewUserCoupon::all();

        return view('admin.new_user_voucher', compact('vouchers'));
    }

    public function storeVoucher(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'expiry' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('vouchers', 'public');

        // Save voucher data
        NewUserCoupon::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'expiry' => $request->expiry,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Voucher added successfully!');
    }

    public function deleteVoucher($id)
{
    // Find the voucher by its ID
    $voucher = NewUserCoupon::findOrFail($id);

    // Delete the image file from storage
    if ($voucher->image && \Storage::exists('public/' . $voucher->image)) {
        \Storage::delete('public/' . $voucher->image);
    }

    // Delete the voucher
    $voucher->delete();

    return redirect()->back()->with('success', 'Voucher deleted successfully!');
}

    public function discount_voucher()
    {
        $discount = PpickupDiscount::first();
        return view('admin.discount_voucher', compact('discount'));
    }

    public function updatePpickupDiscount(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:0',
    ]);

    $discount = PpickupDiscount::first(); // Check if a record exists
    if ($discount) {
        $discount->update(['amount' => $request->amount]);
    } else {
        PpickupDiscount::create(['amount' => $request->amount]);
    }

    return redirect()->back()->with('success', 'Pickup Discount updated successfully!');
}
}
