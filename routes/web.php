<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\MainController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Backend\CartController;

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

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

/* products by category */
Route::get('/category/{category_slug}', [HomeController::class, 'category']);

/* dashboard */
Route::group(['prefix' => 'dashboard', 'middleware' => 'AdminAuth'], function () {
    /* main */
    Route::get('/', [MainController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    /* users */
    Route::resource('/users', UserController::class);
    Route::get('/users/change-password/{user}', [UserController::class, 'changePasswordForm']);
    Route::post('/users/change-password/{user}', [UserController::class, 'changePassword']);

    /* categories */
    Route::resource('/categories', CategoryController::class);

    /* products */
    Route::resource('/products', ProductController::class);
    Route::post('/products/{product}/update-is-active', [ProductController::class, 'updateIsActive']);
    Route::post('/products/{product}/update-stock-quantity', [ProductController::class, 'updateStockQuantity']);
    /* Route::post('/products/{product_id}/update-is-active', function(){
        return response('success');
    }); */

    /* products */
    Route::resource('/brands', BrandController::class);

    /* product images */
    Route::resource('/products/{product}/product-images', ProductImageController::class);

    /* slider */
    Route::resource('/sliders', SliderController::class);

    /* slider */
    Route::resource('/reviews', ReviewController::class);
    Route::post('/reviews/{review}/update-is-active', [ReviewController::class, 'updateIsActive']);
    /* Route::post('/reviews', function(){
        return response('success');
    }); */

    Route::resource('/customers', CustomerController::class);
    Route::get('/customers/change-password/{customer}', [CustomerController::class, 'changePasswordForm']);
    Route::post('/customers/change-password/{customer}', [CustomerController::class, 'changePassword']);
});
Route::get('/products/{product}/product-details', [ProductController::class, 'productDetails']);
Route::get('/search-for-products', [ProductController::class, 'searchForProducts']);
Route::get('/test', [ProductController::class, 'getProducts']);

Route::get('/register', [CustomerController::class, 'registerForm']);
Route::post('/register', [CustomerController::class, 'register']);

Route::get('/login', [FrontendAuthController::class, 'loginForm']);
Route::post('/login', [FrontendAuthController::class, 'login']);

/* cart */
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::delete('/delete-cart-item/{cart}', [CartController::class, 'deleteCartItem'])->name('delete-cart-item');
Route::get('/carts', [CartController::class, 'index'])->name('carts');
