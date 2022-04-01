<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SecretsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransactionController;

use App\Http\Controllers\DropdownController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});  //->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//routes for user

Route::get('dependent-dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);

Route::get('users/create',[UserController::class,'create'])->name('users.create');
Route::get('users/index',[UserController::class,'index'])->name('users.index');
Route::post('users/store',[UserController::class,'store'])->name('users.store');
Route::get('users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
Route::post('users/update/{id}',[UserController::class,'update'])->name('users.update');
Route::get('users/delete/{id}',[UserController::class,'delete'])->name('users.delete');



//routes for product

Route::get('product/create',[ProductController::class,'create'])->name('product.create');
Route::post('product/store',[ProductController::class,'store'])->name('product.store');
Route::get('product/index',[ProductController::class,'index'])->name('product.index');
Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('delete/{id}',[ProductController::class,'delete'])->name('product.delete');

//routes for roles

Route::get('roles/create',[RoleController::class,'create'])->name('roles.create');
Route::post('roles/store',[RoleController::class,'store'])->name('roles.store');
Route::get('roles/index',[RoleController::class,'index'])->name('roles.index');
Route::get('roles/edit/{id}',[RoleController::class,'edit'])->name('roles.edit');
Route::post('roles/update/{id}',[RoleController::class,'update'])->name('roles.update');
Route::get('roles/delete/{id}',[RoleController::class,'delete'])->name('roles.delete');

// routes for secrets

Route::get('secrets/index',[SecretsController::class,'index'])->name('secrets.index');
Route::get('secrets/edit{id}',[SecretsController::class,'edit'])->name('secrets.edit');
Route::post('secrets/update{id}',[SecretsController::class,'update'])->name('secrets.update');
Route::get('secrets/delete{id}',[SecretsController::class,'delete'])->name('secrets.delete');

// routes for orders

Route::get('orders/index',[OrderController::class,'index'])->name('orders.index');
Route::get('orders/edit/{id}',[OrderController::class,'edit'])->name('orders.edit');
Route::post('orders/update/{id}',[OrderController::class,'update'])->name('orders.update');
Route::get('orders/delete/{id}',[OrderController::class,'delete'])->name('orders.delete');


// Routes for transaction

Route::get('transactions/index',[TransactionController::class,'index'])->name('transactions.index');
Route::get('transactions/edit/{id}',[TransactionController::class,'edit'])->name('transactions.edit');
Route::post('transactions/update/{id}',[TransactionController::class,'update'])->name('transactions.update');
Route::get('transactions/delete/{id}',[TransactionController::class,'delete'])->name('transactions.delete');

Route::view('/dashboard','dash')->name('dash');
