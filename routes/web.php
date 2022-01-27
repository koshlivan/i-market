<?php

use App\Http\Controllers\AttachmentController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PageController;

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

Route::get('/{any}', [PageController::class, 'index'])->where('any', '.*');

//Route::post('attachments', [AttachmentController::class, 'store']);
