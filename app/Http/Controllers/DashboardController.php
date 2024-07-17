<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article; 
use App\Models\Member; 
use Illuminate\Http\Request;
use App\Models\User;

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
        $totalAdmin = User::where('role', 'admin')->count();
        $totalProducts = $products->count();
        $totalArticle = $articles->count();
        $totalMember = $members->count();
        return view('dashboard', compact('totalProducts', 'totalArticle', 'totalMember', 'totalAdmin'));
    }
}
