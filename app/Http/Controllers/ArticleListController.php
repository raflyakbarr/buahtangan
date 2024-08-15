<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class ArticleListController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $latestArticles = Article::latest()->take(5)->get();
        $categories = KategoriArtikel::all();
        return view('article-list', compact('articles', 'latestArticles', 'categories'));
    }
    public function search(Request $request)
    {
        $categories = KategoriArtikel::all();
        $search = $request->input('search');
        $query = Article::query();

        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
        }

        $articles = $query->paginate(10);
        return view('article-list', compact('articles', 'search', 'categories'));
    }
}
