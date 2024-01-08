<?php

use App\Http\Controllers\Guest\BookingController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Guest\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Guest\GuestArticleController;
use App\Http\Controllers\Guest\GuestGalleryController;

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

Route::get('/', [IndexController::class, 'index'])->name('guest.index');


Route::get('/galeria', [GuestGalleryController::class, 'index'])->name('guest.galeria');
Route::get('/udulokozpont', function () { return view('guest.udulo');})->name('guest.udulo');

Route::get('/kapcsolat', function () { return view('guest.kapcsolat');})->name('guest.kapcsolat');
Route::post('/kapcsolat', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/szallasfoglalas', function () { return view('guest.szallas');})->name('guest.szallas');
Route::post('/szallasfoglalas', [BookingController::class, 'sendEmail'])->name('szallas.send');

Route::get('/csomagajanlatok', function () { return view('guest.csomagajanlatok');})->name('guest.csomagajanlatok');
Route::get('/csomagajanlatok/osztalykirandulas', function () { return view('guest.csomagok.osztaly');})->name('guest.csomagok.osztaly');
Route::get('/csomagajanlatok/golyatabor', function () { return view('guest.csomagok.golya');})->name('guest.csomagok.golya');
Route::get('/csomagajanlatok/cegeknek', function () { return view('guest.csomagok.cegeknek');})->name('guest.csomagok.cegeknek');
Route::get('/adatkezeles', function () { return view('guest.adatkezeles');})->name('guest.adatkezeles');


Route::get('/akutalis', [GuestArticleController::class, 'index'])->name('guest.hirek');
route::get('/akutalis/{hir}', [GuestArticleController::class, 'singleArticle'])->name('guest.hir');

Auth::routes(['register' => false]);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('/admin/gallery', [AdminGalleryController::class, 'index'])->name('admin.gallery');
    Route::post('/admin/gallery/category', [AdminGalleryController::class, 'storeCategory'])->name('admin.gallery.storeCategory');
    Route::delete('/admin/gallery/category/{category}', [AdminGalleryController::class, 'destroyCategory'])->name('admin.gallery.destroyCategory');
    Route::post('/admin/gallery/subcategory', [AdminGalleryController::class, 'storeSubcategory'])->name('admin.gallery.storeSubcategory');
    Route::delete('/admin/gallery/subcategory/{subcategory}', [AdminGalleryController::class, 'destroySubcategory'])->name('admin.gallery.destroySubcategory');
    Route::post('/admin/gallery/image', [AdminGalleryController::class, 'storeImage'])->name('admin.gallery.storeImage');
    Route::delete('/admin/gallery/image/{image}', [AdminGalleryController::class, 'destroyImage'])->name('admin.gallery.destroyImage');
    // Routes for handling articles
    Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('/admin/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/admin/articles/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/admin/articles/{article}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');
    Route::post('/admin/ckeditor/upload', [ArticleController::class, 'upload'])->name('ckeditor.upload');

    // Routes for handling article categories
    Route::get('/article-categories', [ArticleCategoryController::class, 'index'])->name('article_categories.index');
    Route::get('/article-categories/create', [ArticleCategoryController::class, 'create'])->name('article_categories.create');
    Route::post('/article-categories', [ArticleCategoryController::class, 'store'])->name('article_categories.store');
    Route::get('/article-categories/{articleCategory}/edit', [ArticleCategoryController::class, 'edit'])->name('article_categories.edit');
    Route::put('/article-categories/{articleCategory}', [ArticleCategoryController::class, 'update'])->name('article_categories.update');
    Route::delete('/article-categories/{articleCategory}', [ArticleCategoryController::class, 'destroy'])->name('article_categories.destroy');
});
