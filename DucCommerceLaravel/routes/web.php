<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;

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
    return redirect('/products');
});

// All users
Route::get('/manageusers', [UsersController::class, "index"])
->middleware('auth');

// Delete user
Route::delete(
    '/manageusers/{id}',
    [UsersController::class, 'destroy']
)->middleware('auth');

// All products
Route::get('/products', [ProductController::class, "index"]);



// Create form
Route::get('/products/create', [ProductController::class, "create"])
    ->middleware('auth');

// Store product data
Route::post('/products', [ProductController::class, "store"])
    ->middleware('auth');

// Edit form
Route::get(
    '/products/edit/{id}',
    [ProductController::class, "edit"]
)->middleware('auth');

Route::put(
    '/products/update/{id}',
    [ProductController::class, 'update']
)->middleware('auth');

// Delete product
Route::delete(
    '/products/{id}',
    [ProductController::class, 'destroy']
)->middleware('auth');

// Manage products
Route::get(
    '/products/manage',
    [ProductController::class, 'manage']
)->middleware('auth');

// Single product
Route::get('/products/{id}', [ProductController::class, "show"]);

// End Product routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});