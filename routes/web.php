<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\ViewController::class, 'home']);
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index']);
Route::get('/tags', [App\Http\Controllers\TagController::class, 'index']);
Route::get('/brands', [App\Http\Controllers\BrandController::class, 'index']);
Route::get('/caseStudies', [App\Http\Controllers\StudyController::class, 'index']);
Route::get('/enquiries', [App\Http\Controllers\EnquiryController::class, 'index']);
Route::get('/gallery', [App\Http\Controllers\ImageController::class, 'index']);
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);