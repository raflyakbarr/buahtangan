<?php

namespace App\Http\Controllers;

use App\Models\Product; //memanggil model produk untuk menampilkan jumlah total prduk
use App\Models\Article; //memanggil model produk untuk menampilkan jumlah total prduk
use App\Models\Member; //memanggil model produk untuk menampilkan jumlah total prduk
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $articles = Article::all();
        $members = Member::all();
        $totalProducts = $products->count();
        $totalArticle = $articles->count();
        $totalMember = $members->count();
        return view('dashboard', compact('totalProducts', 'totalArticle', 'totalMember'));
    }
}
