<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('pages/index');
// });
 //Route::get('/', 'App\Http\Controllers\Frontend\FrontendController@index')->name('index');
// Route::get('/san-pham', 'App\Http\Controllers\Frontend\FrontendController@product')->name('product');
// Route::get('/gioi-thieu', 'App\Http\Controllers\Frontend\FrontendController@about')->name('about');
// Route::get('/lien-he', 'App\Http\Controllers\Frontend\FrontendController@contact')->name('contact');
// Route::get('/', 'App\Http\Controllers\Backend\BackendController@index')->name('index');
Route::get('/', [FrontendController::class, 'index']);
Route::get('/{slug}', [ProductController::class, 'index']);