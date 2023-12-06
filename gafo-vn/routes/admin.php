<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

 Route::get('/dashboard', [BackendController::class, 'index']);

//  Route::resource('product', ProductController::class);
Route::get('/product', [ProductController::class, 'product']);