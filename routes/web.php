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
Route::get('/brands', [App\Http\Controllers\ViewController::class, 'brandsIndex']);

/*Admin Routes*/
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/admin/articles', [App\Http\Controllers\ArticleController::class, 'index']);
Route::get('/admin/tags', [App\Http\Controllers\TagController::class, 'index']);
Route::get('/admin/brands', [App\Http\Controllers\BrandController::class, 'index']);
Route::get('/admin/caseStudies', [App\Http\Controllers\StudyController::class, 'index']);
Route::get('/admin/enquiries', [App\Http\Controllers\EnquiryController::class, 'index']);
Route::get('/admin/gallery', [App\Http\Controllers\ImageController::class, 'index']);
Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('/admin/brands', [App\Http\Controllers\BrandController::class, 'store'])->name('createBrand');
Route::get('/admin/brand/{id}', [App\Http\Controllers\BrandController::class, 'show'])->name('showBrand');

Route::post('/admin/products', [App\Http\Controllers\ProductController::class, 'store'])->name('createProduct');
Route::get('/admin/product/{id}', [App\Http\Controllers\ProductController::class, 'show']);

Route::post('/admin/gallery', [App\Http\Controllers\ImageController::class, 'store'])->name('createImage');
Route::get('/admin/gallery/{id}', [App\Http\Controllers\ImageController::class, 'show']);

Route::post('/admin/brand/image', [App\Http\Controllers\BrandImageController::class, 'store'])->name('assignBrandImage');