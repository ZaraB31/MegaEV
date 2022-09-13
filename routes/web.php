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
Route::get('/caseStudies', [App\Http\Controllers\ViewController::class, 'caseStudyIndex']);
Route::get('/caseStudies/{id}', [App\Http\Controllers\ViewController::class, 'caseStudyShow']);


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

Route::post('/admin/brand/image', [App\Http\Controllers\BrandImageController::class, 'store'])->name('assignBrandImage');

Route::post('/admin/products', [App\Http\Controllers\ProductController::class, 'store'])->name('createProduct');
Route::get('/admin/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('showProduct');

Route::post('/admin/product/image', [App\Http\Controllers\ProductImageController::class, 'store'])->name('assignProductImage');

Route::post('/admin/gallery', [App\Http\Controllers\ImageController::class, 'store'])->name('createImage');
Route::get('/admin/gallery/{id}', [App\Http\Controllers\ImageController::class, 'show'])->name('showImage');

Route::get('/admin/caseStudies/create', [App\Http\Controllers\StudyController::class, 'create'])->name('createCaseStudy');
Route::post('/admin/caseStudies/create', [App\Http\Controllers\StudyController::class, 'store'])->name('createStudy');
Route::get('/admin/caseStudies/{id}', [App\Http\Controllers\StudyController::class, 'show'])->name('showStudy');
Route::post('/admin/caseStudies/publish', [App\Http\Controllers\StudyController::class, 'publish'])->name('publishStudy');
Route::post('/admin/caseStudies/unpublish', [App\Http\Controllers\StudyController::class, 'unpublish'])->name('unpublishStudy');

Route::post('/admin/caseStudy/featuredImage', [App\Http\Controllers\StudyImageController::class, 'storeFeatured'])->name('storeStudyFeaturedImage');
Route::post('/admin/caseStudy/gallery', [App\Http\Controllers\StudyImageController::class, 'storeGallery'])->name('storeStudygallery');

Route::post('/admin/tags/create', [App\Http\Controllers\TagController::class, 'store'])->name('createTag');

Route::get('/admin/articles/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('createArticle');
Route::post('/admin/articles/create', [App\Http\Controllers\ArticleController::class, 'store'])->name('storeArticle');
Route::get('/admin/articles/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('showArticle');
Route::post('/admin/articles/publish', [App\Http\Controllers\ArticleController::class, 'publish'])->name('publishArticle');
Route::post('/admin/articles/unpublish', [App\Http\Controllers\ArticleController::class, 'unpublish'])->name('unpublishArticle');

Route::post('/admin/article/featuredImage', [App\Http\Controllers\ArticleImageController::class, 'storeFeatured'])->name('storeArticleFeaturedImage');