<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ArticleListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Models\Article;
use App\Http\Controllers\KategoriArtikelController;


Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Group route dengan prefix 'dashboard' untuk products dan exportExcel
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('members', MemberController::class);
        Route::post('/members/add-points', [MemberController::class, 'addPoints'])->name('members.addPoints');
        Route::delete('/members/{member_number}/riwayat-points', [MemberController::class, 'deleteRiwayatPoint'])->name('members.deleteRiwayatPoint');
        Route::post('/members/{member}/reset-points', [MemberController::class, 'resetPoints'])->name('members.resetPoints');
        Route::post('/members/{member_number}/tukar-poin', [MemberController::class, 'tukarPoin'])->name('members.tukarPoin');
        Route::resource('products', ProductController::class);
        Route::get('/exportExcel', [ProductController::class, 'exportExcel'])->name('products.exportExcel');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
});
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('admins', AdminController::class);
    });
});
Route::middleware(['auth', 'role:content_writer'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('articles', ArticleController::class);
        Route::get('edithome', [HomeController::class, 'editHome'])->name('edithome.index');
        Route::post('edithome', [HomeController::class, 'store'])->name('edithome.store');
        Route::delete('/edithome/{id}', [HomeController::class, 'destroy'])->name('edithome.destroy');
        Route::put('/edithome/{id}', [HomeController::class, 'update'])->name('edithome.update');
        Route::post('/edithome/add-image', [HomeController::class, 'addImage'])->name('edithome.addImage');
        Route::delete('/edithome/delete/{id}', [HomeController::class, 'deleteImage'])->name('edithome.deleteImage');
        Route::resource('kategori_artikel', KategoriArtikelController::class);
    });
});
Route::middleware(['track.public'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('welcome');
    Route::get('/member-list/{member_number}', [MemberController::class, 'indexForGuests'])->name('member.list');
    Route::get('/article', [ArticleListController::class, 'index'])->name('article-list');
    Route::get('/article/search', [ArticleListController::class, 'search'])->name('article-list.search');
    Route::get('/article/{slug}', [ArticleController::class, 'indexForGuests'])->name('article');
    Route::get('/product', [ProductController::class, 'indexForGuests'])->name('product.list');
    Route::get('/product/search', [ProductController::class, 'search'])->name('product-list.search');
    Route::get('/product/{slug}', [ProductController::class, 'indexForGuests'])->name('product.detail');
    Route::get('/article/category/{slug}', [ArticleController::class, 'showCategory'])->name('category.articles');
    Route::get('/faq', function () {
        return view('faq');
    })->name('faq');
});