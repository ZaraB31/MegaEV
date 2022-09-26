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
Route::get('/blog', [App\Http\Controllers\ViewController::class, 'articleIndex']);
Route::get('/blog/{id}', [App\Http\Controllers\ViewController::class, 'articleShow']);
Route::get('/contact', [App\Http\Controllers\ViewController::class, 'contactShow']);
Route::post('/contact', [App\Http\Controllers\ViewController::class, 'contactCreate'])->name('storeEnquiry');


/*Admin Routes*/
Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index']);
Route::post('/admin/details/create', [App\Http\Controllers\DashboardController::class, 'createDetails'])->name('createDetails');
Route::post('/admin/details/{id}/edit', [App\Http\Controllers\DashboardController::class, 'updateDetails'])->name('updateDetails');
Route::post('/admin/socials/create', [App\Http\Controllers\DashboardController::class, 'createSocials'])->name('createSocials');

Route::get('/admin/articles', [App\Http\Controllers\ArticleController::class, 'index']);
Route::get('/admin/tags', [App\Http\Controllers\TagController::class, 'index']);
Route::get('/admin/brands', [App\Http\Controllers\BrandController::class, 'index']);
Route::get('/admin/caseStudies', [App\Http\Controllers\StudyController::class, 'index']);
Route::get('/admin/enquiries', [App\Http\Controllers\EnquiryController::class, 'index']);
Route::get('/admin/gallery', [App\Http\Controllers\ImageController::class, 'index']);
Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('/admin/brands', [App\Http\Controllers\BrandController::class, 'store'])->name('createBrand');
Route::get('/admin/brand/{id}', [App\Http\Controllers\BrandController::class, 'show'])->name('showBrand');
Route::get('/admin/brand/{id}/edit', [App\Http\Controllers\BrandController::class, 'edit'])->name('editBrand');
Route::post('/admin/brand/{id}/edit', [App\Http\Controllers\BrandController::class, 'update'])->name('updateBrand');

Route::post('/admin/brand/image', [App\Http\Controllers\BrandImageController::class, 'store'])->name('assignBrandImage');
Route::post('/admin/brand/image/{id}/edit', [App\Http\Controllers\BrandImageController::class, 'update'])->name('updateBrandImage');

Route::post('/admin/products', [App\Http\Controllers\ProductController::class, 'store'])->name('createProduct');
Route::get('/admin/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('showProduct');
Route::get('/admin/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('editProduct');
Route::post('/admin/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'update'])->name('updateProduct');

Route::post('/admin/product/image', [App\Http\Controllers\ProductImageController::class, 'store'])->name('assignProductImage');
Route::post('/admin/product/image/{id}/edit', [App\Http\Controllers\ProductImageController::class, 'update'])->name('updateProductImage');

Route::post('/admin/gallery', [App\Http\Controllers\ImageController::class, 'store'])->name('createImage');
Route::get('/admin/gallery/{id}', [App\Http\Controllers\ImageController::class, 'show'])->name('showImage');
Route::post('/admin/gallery/{id}/edit', [App\Http\Controllers\ImageController::class, 'update'])->name('updateImage');

Route::get('/admin/caseStudies/create', [App\Http\Controllers\StudyController::class, 'create'])->name('createCaseStudy');
Route::post('/admin/caseStudies/create', [App\Http\Controllers\StudyController::class, 'store'])->name('createStudy');
Route::get('/admin/caseStudies/{id}', [App\Http\Controllers\StudyController::class, 'show'])->name('showStudy');
Route::post('/admin/caseStudies/publish', [App\Http\Controllers\StudyController::class, 'publish'])->name('publishStudy');
Route::post('/admin/caseStudies/unpublish', [App\Http\Controllers\StudyController::class, 'unpublish'])->name('unpublishStudy');

Route::post('/admin/caseStudy/featuredImage', [App\Http\Controllers\StudyImageController::class, 'storeFeatured'])->name('storeStudyFeaturedImage');
Route::post('/admin/caseStudy/featuredImage/{id}/edit', [App\Http\Controllers\StudyImageController::class, 'updateFeatured'])->name('updateStudyFeaturedImage');
Route::post('/admin/caseStudy/gallery', [App\Http\Controllers\StudyImageController::class, 'storeGallery'])->name('storeStudygallery');

Route::post('/admin/tags/create', [App\Http\Controllers\TagController::class, 'store'])->name('createTag');
Route::post('/admin/tags/{id}/edit', [App\Http\Controllers\TagController::class, 'update'])->name('updateTag');

Route::get('/admin/articles/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('createArticle');
Route::post('/admin/articles/create', [App\Http\Controllers\ArticleController::class, 'store'])->name('storeArticle');
Route::get('/admin/articles/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('showArticle');
Route::get('/admin/articles/{id}/edit', [App\Http\Controllers\ArticleController::class, 'edit'])->name('editArticle');
Route::post('/admin/articles/{id}/edit', [App\Http\Controllers\ArticleController::class, 'update'])->name('updateArticle');
Route::post('/admin/articles/publish', [App\Http\Controllers\ArticleController::class, 'publish'])->name('publishArticle');
Route::post('/admin/articles/unpublish', [App\Http\Controllers\ArticleController::class, 'unpublish'])->name('unpublishArticle');

Route::post('/admin/article/featuredImage', [App\Http\Controllers\ArticleImageController::class, 'storeFeatured'])->name('storeArticleFeaturedImage');
Route::post('/admin/article/featuredImage/{id}/edit', [App\Http\Controllers\ArticleImageController::class, 'updateFeatured'])->name('updateArticleFeaturedImage');

Route::post('/admin/article/tags', [App\Http\Controllers\ArticleTagController::class, 'assignTags'])->name('assignArticleTags');
Route::get('/admin/article/tags/{id}/delete', [App\Http\Controllers\ArticleTagController::class, 'destroy'])->name('deleteArticleTags');

Route::get('/admin/enquiries/delete/{id}', [App\Http\Controllers\EnquiryController::class, 'destroy'])->name('deleteEnquiry');