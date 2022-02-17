<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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
Route::get('/',function(){
    return 'Hello Page';
});

Route::get('about',function(){
    return 'About Page';
});

Route::get('profile',
[HomeController::class,'showprofile']);

//Product list
Route::get('productlist',
[ProductController::class,'showproduct']
);


    