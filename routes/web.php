<?php

use App\Http\Controllers\Operation;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('register');
})->name('Signup');

Route::post('/postsignup',[User::class,'postsignup'])->name('PostSignup');

Route::get('/login', function () {
    return view('login');
})->name('Login');

Route::post('/postlogin',[User::class,'postlogin'])->name('PostLogin');

Route::middleware([CheckStatus::class])->group(function(){
    Route::get('getstatus',function(){
        return " Success";
    });
    Route::get('logout',[User::class,'logout'])->name('Logout');
    //Route::get('layout/dashboard',[Operation::class,'dashBoard'])->name('DashBoard');

    Route::get('layout/dashboard', [Operation::class, 'index'])->name('DashBoard');
    Route::get('layout/myorder', [Operation::class, 'myOrder'])->name('MyOrder');
    Route::get('layout/myprofile', [User::class, 'myProfile'])->name('MyProfile');
    Route::get('layout/myprofileedit', [User::class, 'myProfileEdit'])->name('MyProfileEdit');
    Route::post('layout/postmyprofileedit', [User::class, 'postmyProfileEdit'])->name('PostEditProfile');
    Route::get('cart', [Operation::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [Operation::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [Operation::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [Operation::class, 'remove'])->name('remove.from.cart');
    Route::get('cart/checkout/{total}', [Operation::class, 'checkOut']);
    Route::post('cart/checkout/postorder',[Operation::class,'PostOrder'])->name('PostOrder');
});