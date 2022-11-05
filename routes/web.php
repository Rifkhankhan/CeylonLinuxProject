<?php

use App\Facades\Student;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IssueController;

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
   return redirect()->route('product.home');
});

Route::get('/product', function () {
    return redirect()->route('product.home');
 });

 Route::get('/customer', function () {
    return redirect()->route('customer.home');
 });

 Route::get('/issue', function () {
    return redirect()->route('issue.home');
 });

 Route::get('/order', function () {
    return redirect()->route('order.home');
 });


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/create',[App\Http\Controllers\HomeController::class,'create'])->name('create');
// Route::get('/view/{id}',[App\Http\Controllers\HomeController::class,'view'])->name('view');
// Route::get('/edit/{id}',[App\Http\Controllers\HomeController::class,'edit'])->name('edit');
// Route::get('/delete/{id}',[App\Http\Controllers\HomeController::class,'delete'])->name('delete');
// Route::post('/store',[App\Http\Controllers\HomeController::class,'store'])->name('store');
// Route::post('/update/{id}',[App\Http\Controllers\HomeController::class,'update'])->name('update');
// Route::get('/status/{id}',[App\Http\Controllers\HomeController::class,'changeStatus'])->name('status');


Route::prefix('product')->group(function(){
    Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('product.home');
    Route::get('/view/{id}',[App\Http\Controllers\ProductController::class,'view'])->name('product.view');
    Route::get('/edit/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');
    // Route::get('/delete/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('product.delete');
    Route::post('/store',[App\Http\Controllers\ProductController::class,'store'])->name('product.store');
    Route::post('/update/{id}',[App\Http\Controllers\ProductController::class,'update'])->name('product.update');
    Route::get('/create',[App\Http\Controllers\ProductController::class,'create'])->name('product.create');

});


Route::prefix('customer')->group(function(){
    Route::get('/home', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.home');
    Route::get('/view/{id}',[App\Http\Controllers\CustomerController::class,'view'])->name('customer.view');
    Route::get('/edit/{id}',[App\Http\Controllers\CustomerController::class,'edit'])->name('customer.edit');
    // Route::get('/delete/{id}',[App\Http\Controllers\CustomerController::class,'delete'])->name('customer.delete');
    Route::post('/store',[App\Http\Controllers\CustomerController::class,'store'])->name('customer.store');
    Route::post('/update/{id}',[App\Http\Controllers\CustomerController::class,'update'])->name('customer.update');
    Route::get('/create',[App\Http\Controllers\CustomerController::class,'create'])->name('customer.create');

});

Route::prefix('issue')->group(function(){
    Route::get('/home', [App\Http\Controllers\IssueController::class, 'index'])->name('issue.home');
    Route::get('/view/{id}',[App\Http\Controllers\IssueController::class,'view'])->name('issue.view');
    Route::get('/edit/{id}',[App\Http\Controllers\IssueController::class,'edit'])->name('issue.edit');
    // Route::get('/delete/{id}',[App\Http\Controllers\IssueController::class,'delete'])->name('issue.delete');
    Route::post('/store',[App\Http\Controllers\IssueController::class,'store'])->name('issue.store');
    Route::post('/update/{id}',[App\Http\Controllers\IssueController::class,'update'])->name('issue.update');
    Route::get('/create',[App\Http\Controllers\IssueController::class,'create'])->name('issue.create');

});

Route::prefix('order')->group(function(){
    Route::get('/home', [App\Http\Controllers\OrderController::class, 'index'])->name('order.home');
    Route::get('/view/{id}',[App\Http\Controllers\OrderController::class,'view'])->name('order.view');
    Route::get('/edit/{id}',[App\Http\Controllers\OrderController::class,'edit'])->name('order.edit');
    // Route::get('/delete/{id}',[App\Http\Controllers\OrderController::class,'delete'])->name('order.delete');
    Route::post('/store',[App\Http\Controllers\OrderController::class,'store'])->name('order.store');
    // Route::post('/update/{id}',[App\Http\Controllers\OrderController::class,'update'])->name('order.update');
    Route::get('/create',[App\Http\Controllers\OrderController::class,'create'])->name('order.create');

});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

