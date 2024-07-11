<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleListController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article-list', compact('articles'));
    }
}
