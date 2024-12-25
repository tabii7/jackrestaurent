<?php

namespace App\Http\Controllers;
use App\Models\Extra;
use App\Models\Drink;
use App\Models\Sauce;
use App\Models\Category;
use App\Models\Product;
use App\Models\Address;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request)
    {


        $cart = Session::get('cart', []);

        $product_price = Product::where('id', $request->product_id)->pluck('price')->first();



        foreach ($cart as $index => $item) {


            // Use sauces IDs directly if they are already a flat array
            $sauceIds = !empty($newItem['sauces']) && is_array($newItem['sauces']) ? $newItem['sauces'] : [];

            // If $sauceIds is not empty, retrieve the name and price for each sauce
            $newItem['sauces'] = !empty($sauceIds)
                ? Sauce::whereIn('id', $sauceIds)
                    ->get(['name', 'price']) // Fetch both 'name' and 'price' columns
                    ->map(function ($sauce) {
                        return [
                            'name' => $sauce->name,
                            'price' => $sauce->price,
                        ];
                    })
                    ->toArray()
                : [];

            // Fetch extras names
            if (!empty($item['extras'])) {
                foreach ($item['extras'] as $key => $extra) {
                    $extraName = Extra::where('id', $extra['id'])->pluck('name')->first();
                    $extraprice = Extra::where('id', $extra['id'])->pluck('price')->first();
                    $cart[$index]['extras'][$key]['name'] = $extraName;
                    $cart[$index]['extras'][$key]['price'] = $extraprice;
                }
            }

            // Fetch drinks names
            if (!empty($item['drinks'])) {
                foreach ($item['drinks'] as $key => $drink) {
                    $drinkName = Drink::where('id', $drink['id'])->pluck('name')->first();
                    $drinkprice = Drink::where('id', $drink['id'])->pluck('price')->first();
                    $cart[$index]['drinks'][$key]['name'] = $drinkName;
                    $cart[$index]['drinks'][$key]['price'] = $drinkprice;
                }
            }
        }

        // Add the new item to the cart
        $newItem = [
            'product_id' => $request->product_id,
            'product_price' => $product_price,
            'product_name' => $request->product_name,
            'salad' => $request->salad,
            'sauces' => $request->sauces,
            'extras' => $request->extras,
            'drinks' => $request->drinks,
            'total_price' => $request->total_price,
        ];

        // Process the new item for names
        $sauceIds = !empty($newItem['sauces']) && is_array($newItem['sauces']) ? $newItem['sauces'] : [];

        // If $sauceIds is not empty, retrieve the name and price for each sauce
        $newItem['sauces'] = !empty($sauceIds)
            ? Sauce::whereIn('id', $sauceIds)
                ->get(['name', 'price']) // Fetch both 'name' and 'price' columns
                ->map(function ($sauce) {
                    return [
                        'name' => $sauce->name,
                        'price' => $sauce->price,
                    ];
                })
                ->toArray()
            : [];

        if (!empty($newItem['extras'])) {
            foreach ($newItem['extras'] as $key => $extra) {
                $extraName = Extra::where('id', $extra['id'])->pluck('name')->first();
                $extraprice = Extra::where('id', $extra['id'])->pluck('price')->first();
                $newItem['extras'][$key]['name'] = $extraName;
                $newItem['extras'][$key]['price'] = $extraprice;
            }
        }

        if (!empty($newItem['drinks'])) {
            foreach ($newItem['drinks'] as $key => $drink) {
                $drinkName = Drink::where('id', $drink['id'])->pluck('name')->first();
                $drinkprice = Drink::where('id', $drink['id'])->pluck('price')->first();
                $newItem['drinks'][$key]['name'] = $drinkName;
                $newItem['drinks'][$key]['price'] = $drinkprice;
            }
        }

        // Append the processed new item to the cart
        $cart[] = $newItem;


        // dd($cart);

        Session::put('cart', $cart);


        return response()->json(['message' => 'Product added to cart successfully!', 'cart' => $cart]);
    }


    // View cart items
    public function viewCart()
    {


        $cart = Session::get('cart', []);
        return view('checkout', compact('cart'));
    }

    // Clear the cart
    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->back()->with('message', 'Cart cleared successfully.');
    }

    public function removeFromCart($index)
    {
        $cart = Session::get('cart', []);
        unset($cart[$index]); // Remove the item by its index
        Session::put('cart', array_values($cart)); // Re-index the array
        return redirect()->route('cart.show')->with('success', 'Item removed from cart.');
    }

    // In your Controller
    public function saveGuestAddress(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        if (auth()->check()) {
            // Save the address to the database for logged-in users
            $newAddress = \App\Models\Address::create([
                'label' => $validated['label'],
                'address' => $validated['address'],
                'phone' => $validated['phone'],
                'selected' => 0, // Default value
                'user_id' => auth()->id(), // Assuming you have a `user_id` column for relationships
            ]);

            return response()->json([
                'success' => true,
                'address' => $newAddress,
            ]);
        } else {
            // Store in session for the guest user
            $newAddress = [
                'label' => $validated['label'],
                'address' => $validated['address'],
                'phone' => $validated['phone'],
            ];

            $addresses = session()->get('guest_addresses', []);
            $addresses[] = $newAddress;
            session()->put('guest_addresses', $addresses);

            return response()->json([
                'success' => true,
                'address' => $newAddress,
            ]);
        }

    }


    // In your Controller
    public function updateGuestAddress(Request $request)
    {

        $validated = $request->validate([
            'label' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'index' => 'integer',
        ]);

        // If the user is authenticated, update their address in the database
        if (auth()->check()) {
            $user = auth()->user();
            $address = $user->addresses()->find($validated['index'] + 1); // Assuming the relationship is defined

            if ($address) {
                // Update the user's address in the database
                $address->update([
                    'label' => $validated['label'],
                    'address' => $validated['address'],
                    'phone' => $validated['phone'],
                ]);

                return response()->json([
                    'success' => true,
                    'address' => $address,
                    'index' => $validated['index'],
                ]);
            }

            return response()->json(['success' => false, 'message' => 'Address not found']);
        }

        // If the user is a guest, update the address in the session
        $addresses = session()->get('guest_addresses', []);

        // Check if the address exists and update it
        if (isset($addresses[$validated['index']])) {
            $addresses[$validated['index']] = [
                'label' => $validated['label'],
                'address' => $validated['address'],
                'phone' => $validated['phone'],
            ];
            session()->put('guest_addresses', $addresses);

            return response()->json([
                'success' => true,
                'address' => $addresses[$validated['index']],
                'index' => $validated['index'],
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Address not found']);
    }

    public function updateSelectedAddress(Request $request)
    {
        $addressId = $request->address_id;

        // Check if the user is authenticated
        if (auth()->check()) {
            // For authenticated users, update the selected field in the database
            $address = Address::find($addressId);
            if ($address) {
                // Unselect all addresses for the user
                Address::where('user_id', auth()->id())->update(['selected' => false]);

                // Mark the selected address as true
                $address->selected = true;
                $address->save();

                return response()->json(['success' => true, 'address_id' => $address->id]);
            }
        } else {
            // For guest users, update the selected address in the session
            $addresses = session()->get('guest_addresses', []);
            if (isset($addresses[$addressId])) {
                // Unselect all guest addresses first
                foreach ($addresses as &$address) {
                    $address['selected'] = false;
                }

                // Mark the selected address as true
                $addresses[$addressId]['selected'] = true;
                session()->put('guest_addresses', $addresses);

                return response()->json(['success' => true, 'address_id' => $addressId]);
            }
        }

        return response()->json(['success' => false]);
    }




    public function storePaymentDetails(Request $request)
    {
        // Retrieve data from session and request
        if (auth()->check()) {
            // Retrieve the user's address from the address table where 'selected' is 1
            $userAddress = Address::where('user_id', auth()->id())
                ->where('selected', 1)
                ->first(); // Fetch the first selected address

            if (!$userAddress) {
                return response()->json(['error' => 'No selected address found for logged-in user'], 400);
            }

            // Use the address, phone, and label from the selected address
            $address = $userAddress->address;
            $phone = $userAddress->phone;
            $label = $userAddress->label;
        } else {
            // If the user is not logged in, check the guest addresses in the session
            $addressSession = session()->get('guest_addresses', []);

            // Find the address where selected = 1
            $addressDetails = collect($addressSession)->firstWhere('selected', 1);

            if (!$addressDetails) {
                return response()->json(['error' => 'No selected address found for guest'], 400);
            }

            // Use the address, phone, and label for the guest
            $address = $addressDetails['address'] ?? 'N/A';
            $phone = $addressDetails['phone'] ?? 'N/A';
            $label = $addressDetails['label'] ?? 'Guest';
        }

        // Get payment method from request
        $paymentMethod = $request->input('payment_method', 'Unknown');

        // Prepare items purchased and total amount
        $cartSession = session()->get('cart', []); // Assuming 'cart' holds items and total amount
        $itemsPurchased = $cartSession[0]['product_name'] ?? 'N/A'; // Assuming 'items' is an array in cart session


        $totalAmount = 0;

        // Loop through cart items and add the total_price of each item
        foreach ($cartSession as $item) {
            // Add the total_price of the item to the total amount
            $totalAmount += $item['total_price'] ?? 0;
        }

        $totalAmount = $request->price;

        // Save the payment details in the database
        $payment = Payment::create([
            'user_id' => auth()->check() ? auth()->id() : null, // Null if guest, user_id if logged in
            'name' => auth()->check() ? auth()->user()->name : 'Guest', // Use logged-in user's name or 'Guest'
            'phone' => $phone,
            'address' => $address,
            'items_purchased' => $itemsPurchased,
            'amount' => $totalAmount,
            'payment_method' => $paymentMethod,
            'status' => 'completed', // Assuming payment was successful
        ]);
        $pointsUsed = $request->input('points_used'); // Points used by the user

        // Optionally, reduce the user's points if needed
        $user = Auth::user();
        $user->points -= $pointsUsed; // Subtract the points used from the user's balance
        $user->new_user_coupen = $request->new_user_coup; // Subtract the points used from the user's balance

        $user->save();

        $lp = DB::table('loyalty_program')->first();

        $pointsPerAmount = $lp->points; // Points for a specific amount, e.g., 4 points for 20 amount
        $amountPerUnit = $lp->amount;  // The amount for which the points are given, e.g., 20

        // Calculate total points
        $calculatedPoints = ($totalAmount / $amountPerUnit) * $pointsPerAmount;

        // Step 3: Insert the points into the users table (assuming you're updating the currently authenticated user)
        DB::table('users')->where('id', Auth::id()) // or you can insert a new row if needed
            ->increment('points', $calculatedPoints); // Increments the existing points for the user

        // Clear session data if necessary
        session()->forget('guest_addresses');
        session()->forget('cart');

        // Return success response
        return response()->json(['success' => true, 'payment_id' => $payment->id]);
    }


}
