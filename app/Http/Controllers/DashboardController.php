<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article; 
use App\Models\Member; 
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Carbon\Carbon;


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
        $totalAdmin = User::whereIn('role', ['admin', 'content_writer'])->count();
        $totalProducts = $products->count();
        $totalArticle = $articles->count();
        $totalMember = $members->count();

         // Total kunjungan
         $totalVisits = DB::table('visits')->count();

         // Kunjungan hari ini
         $todayVisits = DB::table('visits')
             ->whereDate('created_at', Carbon::today())
             ->count();
 
         // Kunjungan per hari dalam 7 hari terakhir
         $dailyVisits = DB::table('visits')
             ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as visits'))
             ->where('created_at', '>=', Carbon::now()->subDays(7))
             ->groupBy('date')
             ->orderBy('date', 'asc')
             ->get()
             ->pluck('visits', 'date')
             ->toArray();
 
         // Format data untuk Chart.js
         $dates = array_keys($dailyVisits);
         $visits = array_values($dailyVisits);

        return view('dashboard', compact('totalProducts', 'totalArticle', 'totalMember', 'totalAdmin', 'totalVisits', 'todayVisits', 'dates', 'visits'));
    }
}
