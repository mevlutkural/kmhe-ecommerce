<?php

use App\Http\Controllers\Backend\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\MainController;
use App\Http\Controllers\Backend\Users;

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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/login', [Auth::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [Auth::class, 'login'])->name('login');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'AdminAuth'], function () {
    Route::get('/', [MainController::class, 'index'])->name('dashboard');
    Route::get('/logout', [Auth::class, 'logout'])->name('logout');
    /* users */
    Route::resource('/users', Users::class);
    Route::get('/users/change-password/{user}', [Users::class, 'changePasswordForm']);
    Route::post('/users/change-password/{user}', [Users::class, 'changePassword']);
});
