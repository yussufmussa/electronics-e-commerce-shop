<?php

use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Client\DashboardController as ClientController;
use App\Http\Controllers\Backend\Admin\GeneralSiteSettingController;
use App\Http\Controllers\Backend\Admin\ProductController;
use App\Http\Controllers\Backend\Admin\RoleController;
use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Client\ClientDashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomePageController::class, 'index']);

Route::controller(PageController::class)->group(function () {
  Route::get('category/{slug}', 'productsByCategory')->name('filter.category');
  Route::get('product/{slug}', 'productDetails')->name('product.details');
  Route::get('products', 'allProducts')->name('product.all');
  Route::get('searchProudct', 'searchProudct')->name('search.product');
  Route::get('cart', 'showCart')->name('cart.show');
  Route::view('contact-us', 'frontend.pages.contact');
  Route::post('/contact-us', 'sendEmail');
});


Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::get('/get-cart-quantity', [CartController::class, 'getCartQuantity']);
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart']);
Route::post('/update-cart-quantity', [CartController::class, 'updateCartQuantity']);



//route for admin section 
Route::middleware('auth', 'verified')->group(function () {
  Route::middleware('role:1')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
      Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

      Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
      Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
      Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

      Route::resource('category', CategoryController::class);
      Route::resource('sliders', SliderController::class);
      Route::resource('products', ProductController::class);

      Route::resource('roles', RoleController::class);

      Route::get('/site-info', [GeneralSiteSettingController::class, 'index']);
      Route::post('/site-info', [GeneralSiteSettingController::class, 'store'])->name('info.save');
    });
});


// Route for client 
Route::middleware('auth', 'verified')->group(function () {
  Route::middleware('role:2')
    ->prefix('client')
    ->name('client.')
    ->group(function () {
      Route::get('orders', [ClientDashboardController::class, 'order'])->name('order');
      Route::get('address', [ClientDashboardController::class, 'address'])->name('address');
      
      Route::get('/checkout', [CartController::class, 'checkout']);
      Route::get('/payment/success', [CartController::class, 'success'])->name('success');
      Route::post('/chargewithStripe', [CartController::class, 'chargewithStripe'])->name('charge.stripe');

      Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
      Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
      Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


require __DIR__ . '/auth.php';
