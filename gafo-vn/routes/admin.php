<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SlidebarController;
use App\Http\Controllers\Backend\PostController;
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
//product
//  Route::resource('/product', ProductController::class);
Route::get('/product', [ProductController::class, 'product']);
Route::post('/product', [ProductController::class, 'store']);
Route::delete('/product/{id}',[ProductController::class, 'destroy']);
Route::put('/product/{id}',[ProductController::class, 'update']);
//category
Route::get('/category', [CategoryController::class, 'category']);
Route::post('/category', [CategoryController::class, 'store']);
Route::delete('/category/{id}',[CategoryController::class, 'destroy']);
Route::put('/category/{id}',[CategoryController::class, 'update']);

//sliderbar
Route::get('/slidebar', [SlidebarController::class, 'slidebar']);
Route::post('/slidebar', [SlidebarController::class, 'store']);
Route::delete('/slidebar/{id}',[SlidebarController::class, 'destroy']);
Route::put('/slidebar/{id}',[SlidebarController::class, 'update']);

//post
Route::get('/postnew',[PostController::class,'postnew']);
Route::post('/postadd', [SlidebarController::class, 'store']);