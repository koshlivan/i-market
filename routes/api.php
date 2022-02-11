<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ReviewController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\ProductOptionController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\AttachmentController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::group(['middleware' => 'sanctum'], function() {
//   Route::get('');
//});

Route::apiResources([
    'products' => ProductController::class,
    'product-options' => ProductOptionController::class,
    'reviews' => ReviewController::class,
    'orders' => OrderController::class,
    'carts' => CartController::class,
    'categories' => CategoryController::class,
]);

Route::post('attachments', [AttachmentController::class, 'store']);
Route::post('users/register', [UserController::class, 'store']);
Route::post('users/login', [UserController::class, 'login']);
Route::post('users/logout', [UserController::class, 'destroy']);
Route::post('mail', [\App\Http\Controllers\Jobs\SendPurchasesController::class, 'store']);
Route::get('mail', [\App\Http\Controllers\Jobs\SendPurchasesController::class, 'show']);
Route::get('to-category', [\App\Http\Controllers\Jobs\ProductToCategoryController::class, 'testing']);
Route::post('to-category', [\App\Http\Controllers\Jobs\ProductToCategoryController::class, 'store']);
Route::post('mail-gen', [\App\Http\Controllers\Jobs\GenerateMailJobsController::class, 'store']);



