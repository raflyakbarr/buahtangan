<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ArticleListController;
use App\Http\Controllers\AdminController;
use App\Models\Article;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Group route dengan prefix 'dashboard' untuk products dan exportExcel
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('members', MemberController::class);
    Route::post('/members/add-points', [MemberController::class, 'addPoints'])->name('members.addPoints');
    Route::delete('/members/{member_number}/riwayat-points', [MemberController::class, 'deleteRiwayatPoint'])->name('members.deleteRiwayatPoint');
    Route::post('/members/{member}/reset-points', [MemberController::class, 'resetPoints'])->name('members.resetPoints');
    Route::post('/members/{member_number}/tukar-poin', [MemberController::class, 'tukarPoin'])->name('members.tukarPoin');
    Route::resource('articles', ArticleController::class);
    Route::resource('products', ProductController::class);
    Route::get('/exportExcel', [ProductController::class, 'exportExcel'])->name('products.exportExcel');
});
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('admins', AdminController::class);
    });
});
Route::get('/member-list/{member_number}', [MemberController::class, 'indexForGuests'])->name('member.list');
Route::get('/article-list', [ArticleListController::class, 'index'])->name('article-list');
Route::get('/article-list/search', [ArticleListController::class, 'search'])->name('article-list.search');
Route::get('/article/{slug}', [ArticleController::class, 'indexForGuests'])->name('article');
Route::get('/product-list', [ProductController::class, 'indexForGuests'])->name('product.list');
Route::get('/product-list/search', [ProductController::class, 'search'])->name('product-list.search');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');