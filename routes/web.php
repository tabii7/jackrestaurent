<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\StripeController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [WebController::class, 'index'])->name('index');

Route::get('/shop', [WebController::class, 'shop'])->name('shop.index');
Route::get('/product_detail/{id}', [WebController::class, 'product_detail'])->name('view.product.detail');


Route::get('/signin', [WebController::class, 'signin'])->name('signin');
Route::get('/signup', [WebController::class, 'signup'])->name('signup');

Route::get('/checkout', [WebController::class, 'checkout'])->name('cart.view');
Route::get('/profile', [WebController::class, 'profile'])->name('profile.view');
Route::get('/orders', [WebController::class, 'orders'])->name('orders.index');
Route::get('/saved_address', [WebController::class, 'saved_address'])->name('address.saved');

Route::get('/select_address', [WebController::class, 'select_address'])->name('select.address');
Route::get('/payment', [WebController::class, 'payment'])->name('payment');
Route::get('/confirm_order', [WebController::class, 'confirm_order'])->name('confirm_order');

use App\Http\Controllers\AdminController;


Route::get('/sauces', [AdminController::class, 'allSauces'])->name('all.sauces');

Route::get('/sauces/{id}/edit', [AdminController::class, 'editSauce']);
Route::post('/sauces/update/{id}', [AdminController::class, 'updateSauce']);
Route::delete('/sauces/delete/{id}', [AdminController::class, 'deleteSauce'])->name('delete.sauce');

Route::get('/drinks', [AdminController::class, 'allDrinks'])->name('all.drinks');

Route::get('/drinks/{id}/edit', [AdminController::class, 'editDrink']);
Route::post('/drinks/update/{id}', [AdminController::class, 'updateDrink']);
Route::delete('/drinks/delete/{id}', [AdminController::class, 'deleteDrink'])->name('delete.drink');


Route::get('/all_products', [AdminController::class, 'allProducts'])->name('admin.all_products');
Route::get('/all_orders', [AdminController::class, 'allOrders'])->name('admin.all_orders');
Route::get('/admin/extras', [AdminController::class, 'allExtras'])->name('admin.allExtras');
Route::get('/admin/extras/{id}/edit', [AdminController::class, 'editExtra'])->name('admin.editExtra');
Route::post('/admin/extras/update/{id}', [AdminController::class, 'updateExtra'])->name('admin.updateExtra');
Route::delete('/admin/extras/{id}', [AdminController::class, 'deleteExtra'])->name('admin.deleteExtra');

Route::get('/all_drinks', [AdminController::class, 'allDrinks'])->name('admin.all_drinks');

Route::post('/admin/extras', [AdminController::class, 'storeExtra'])->name('admin.storeExtra');
Route::post('/admin/drinks', [AdminController::class, 'storeDrink'])->name('admin.storeDrink');
Route::post('/admin/sauces', [AdminController::class, 'storeSauce'])->name('admin.storeSauce');
Route::get('/add_new_sauce', [AdminController::class, 'addNewSauce'])->name('admin.add_new_sauce');

Route::get('/add_new_product', [AdminController::class, 'addNewProduct'])->name('admin.add_new_product');
Route::get('/add_new_extras', [AdminController::class, 'addNewExtras'])->name('admin.add_new_extras');
Route::get('/add_new_drinks', [AdminController::class, 'addNewDrinks'])->name('admin.add_new_drinks');
Route::get('/add_new_category', [AdminController::class, 'category'])->name('admin.add_new_category');
Route::post('/save_category', [AdminController::class, 'storecategory'])->name('categories.store');
Route::get('/categories/{id}/edit', [AdminController::class, 'editcategory'])->name('admin.categories.edit');
Route::post('/categories/update/{id}', [AdminController::class, 'updatecategory'])->name('categories.update');
Route::delete('/admin/categories/{id}', [AdminController::class, 'destroycategory'])->name('categories.destroy');
Route::get('/order_detail', [AdminController::class, 'orderDetail'])->name('admin.order_detail');
Route::get('/admin_login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/loyalty_program', [AdminController::class, 'loyalty_program'])->name('admin.loyalty_program');
Route::get('/new_user_voucher', [AdminController::class, 'new_user_voucher'])->name('admin.new_user_voucher');
Route::get('/discount_voucher', [AdminController::class, 'discount_voucher'])->name('admin.discount_voucher');
Route::post('/admin/coupons', [AdminController::class, 'storeCoupon'])->name('admin.storeCoupon');

Route::put('/admin/coupons/update', [AdminController::class, 'updateCoupon'])->name('admin.updateCoupon');
Route::delete('/admin/coupons/{id}', [AdminController::class, 'deleteCoupon'])->name('admin.deleteCoupon');
Route::post('/admin/vouchers', [AdminController::class, 'storeVoucher'])->name('admin.storeVoucher');
Route::delete('/admin/vouchers/{id}', [AdminController::class, 'deleteVoucher'])->name('admin.deleteVoucher');
Route::post('/admin/ppickup-discount', [AdminController::class, 'updatePpickupDiscount'])->name('admin.updatePpickupDiscount');

use App\Http\Controllers\ProductController;

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/product/delete/{id}', [ProductController::class, 'deleteproduct'])->name('delete.product');


use App\Http\Controllers\LoyaltyProgramController;

Route::post('/loyalty-program/update', [LoyaltyProgramController::class, 'update'])->name('loyalty_program.update');
Route::get('/get-product-options/{id}', function ($id) {
    $product = DB::table('products')->where('id', $id)->first();
    $sauceIds = DB::table('sauce_product')->where('product_id', $id)->pluck('sauce_id');
    $sauces = DB::table('sauces')->whereIn('id', $sauceIds)->get();

    $extraIds = DB::table('extra_product')->where('product_id', $id)->pluck('extra_id');
    $extras = DB::table('extras')->whereIn('id', $extraIds)->get();

    $drinkIds = DB::table('drink_product')->where('product_id', $id)->pluck('drink_id');
    $drinks = DB::table('drinks')->whereIn('id', $drinkIds)->get();
    $product->allergen_info = $product->allergen_info ? json_decode($product->allergen_info) : [];

    return response()->json([
        'product' => $product,
        'sauces' => $sauces,
        'extras' => $extras,
        'drinks' => $drinks,
    ]);
});


use App\Http\Controllers\CartController;

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::delete('/cart/remove/{index}', [CartController::class, 'removeFromCart'])->name('cart.remove');


Route::post('/save/guest/address', [CartController::class, 'saveGuestAddress'])->name('save.guest.address');
Route::post('/update/guest/address', [CartController::class, 'updateGuestAddress'])->name('update.guest.address');

Route::post('/update-selected-address', [CartController::class, 'updateSelectedAddress'])->name('update.selected.address');

Route::post('/create-payment', [StripeController::class, 'createPaymentIntent'])->name('create.payment');

Route::post('/save-payment', [CartController::class, 'storePaymentDetails'])->name('save.payment.details');


Route::post('/save-pickup-details', [CartController::class, 'savePickupDetails'])->name('save.pickup.details');
Route::post('/save-delivery-details', [CartController::class, 'saveDeliveryDetails'])->name('save.delivery.details');


require __DIR__.'/auth.php';
