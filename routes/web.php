<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Cart;
use App\Models\TransactionHeader;

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


Route::get('/', [FoodController::class, 'showMainCourse'])->name('home');

Route::get('/food/show/{type}', [FoodController::class, 'showOtherType'])->name('otherTypeFood');

Route::get('/food/detail/{id}', [FoodController::class, 'foodDetail'])->name('food.detail');


// GUEST ROUTE
Route::middleware(['guest'])->group(function () {

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [UserController::class, 'login'])->name('login.post');

    Route::get('/register', function () {
        return view('register');
    }) ->name('register');

    Route::post('/register', [UserController::class, 'register'])->name('register.post');

});

// AUTHENTICATED ROUTE
Route::middleware(['auth'])->group(function () {

    Route::get('/user/cart', [CartController::class, 'show'])->name('user.cart');

    Route::post('/food/detail/{id}', [CartController::class, 'add'])->name('cart.add');


    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/food/search', function () {
        return view('search');
    })->name('food.search');

    // Route::get('/food/add', function () {
    //     return view('addfood');
    // })->name('food.add');

    // Route::get('/food/manage', function () {
    //     return view('managefood');
    // })->name('food.manage');

// LEX
    Route::get('/checkout', [TransactionHeader::class, 'create'])->name('checkout');
    Route::post('/checkout', [TransactionHeader::class], 'store')->name('checkout.store');

    Route::get('/addnewfood', [FoodController::class, 'create'])->name('food.add');
    Route::post('/addnewfood', [FoodController::class, 'store'])->name('addnewfood.store');

    Route::get('/food', [FoodController::class, 'index'])->name('managefood.index');
    Route::get('/food/search', [FoodController::class, 'search'])->name('managefood.search');
    Route::get('/food/filter', [FoodController::class, 'filter'])->name('managefood.filter');
    Route::get('/managefood/{id}/edit', [FoodController::class, 'edit']);
    Route::post('/managefood/edit', [FoodController::class, 'update'])->name('managefood.edit');
    Route::delete('/managefood/{food}', [FoodController::class, 'destroy'])->name('managefood.destroy');

    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/history', function () {
        return view('history');
    });


    Route::get('/profile', [UserController::class, 'edit']);
    Route::post('/profile', [UserController::class, 'update'])->name('user.edit');

});

//lex
// Route::get('/checkout', [TransactionHeader::class, 'create'])->name('checkout');
// Route::post('/checkout', [TransactionHeader::class], 'store')->name('checkout.store');

// Route::get('/addnewfood', [FoodController::class, 'create'])->name('addnewfood');
// Route::post('/addnewfood', [FoodController::class, 'store'])->name('addnewfood.store');

// Route::get('/managefood', [FoodController::class, 'index'])->name('managefood.index');
// Route::get('/managefood/search', [FoodController::class, 'search'])->name('managefood.search');
// Route::get('/managefood/filter', [FoodController::class, 'filter'])->name('managefood.filter');
// Route::get('/managefood/{id}/edit', [FoodController::class, 'edit']);
// Route::post('/managefood/edit', [FoodController::class, 'update'])->name('managefood.edit');
// Route::delete('/managefood/{food}', [FoodController::class, 'destroy'])
// ->name('managefood.destroy');

// Route::get('/profile', function () {
//     return view('profile');
// });

// Route::get('/history', function () {
//     return view('history');
// });
