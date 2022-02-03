<?php

use App\Http\Controllers\AttachmentController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainPageController;

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
//Route::get('products/{id}', function($id) {return \App\Models\Product::with('options')->find($id);});
Route::get('/{any}', [MainPageController::class, 'index'])->where('any', '.*');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
