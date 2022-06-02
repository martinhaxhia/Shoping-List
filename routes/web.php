<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('custom-login', [UserController::class, 'Login'])->name('login.custom');
Route::get('registration', [UserController::class, 'create'])->name('register-user');
Route::post('custom-registration', [UserController::class, 'userCreate'])->name('register.custom');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');
Route::get('frontend', [UserController::class, 'frontend'])->name('frontend');
/*Route::group(['prefix' => 'products'], function (){
    Route::post('/', [ProductController::class, 'store'])->name('product.store');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
});*/
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::resource('products', ProductController::class);
Route::resource('user', UserController::class);

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::post('remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove.from.cart');
Route::post('removeAll', [CartController::class, 'removeAll'])->name('clearCart');
