<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ReviewController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\ProductOptionController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\AttachmentController;

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

Route::apiResources([
    'products' => ProductController::class,
    'product-options' => ProductOptionController::class,
    'reviews' => ReviewController::class,
    'orders' => OrderController::class,
    'categories' => CategoryController::class,
]);
Route::post('attachments', [AttachmentController::class, 'store']);


