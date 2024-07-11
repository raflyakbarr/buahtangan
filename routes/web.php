<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ArticleListController;
use App\Models\Article;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Group route dengan prefix 'dashboard' untuk products dan exportExcel
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('members', MemberController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('products', ProductController::class);
    Route::get('/exportExcel', [ProductController::class, 'exportExcel'])->name('products.exportExcel');
});
Route::get('/member-list/{member_number}', [MemberController::class, 'indexForGuests'])->name('member.list');
Route::get('/article-list', [ArticleListController::class, 'index'])->name('article-list');
Route::get('/article/{slug}', [ArticleController::class, 'indexForGuests'])->name('article');
Route::get('/product-list', [ProductController::class, 'indexForGuests'])->name('product.list');
