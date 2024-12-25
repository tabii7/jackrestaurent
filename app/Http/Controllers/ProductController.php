<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'discount' => 'nullable|boolean',
            'discounted_price' => 'nullable|numeric',
            'allergen_info' => 'nullable|array',
            'sauces' => 'nullable|array',
            'extras' => 'nullable|array',
            'drinks' => 'nullable|array',
            'salad'=>'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        ]);
        
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }
        
        // Save product
        $product = Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount', false),
            'salad' => $request->input('salad', false),

            'discounted_price' => $request->input('discounted_price'),
            'allergen_info' => json_encode($request->input('allergen_info', [])),
            'image' => $imagePath,
        ]);
    
        // Sync the many-to-many relationships
        $product->sauces()->sync($request->input('sauces', []));
        $product->extras()->sync($request->input('extras', []));
        $product->drinks()->sync($request->input('drinks', []));
        
       // In your controller, after saving the product
       $product->load('sauces', 'extras', 'drinks');
        return redirect()->back()->with('success', 'Product saved successfully.');
    }
    public function deleteproduct($id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    

    
}
