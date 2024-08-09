<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Database\QueryException;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $articles = Article::with('user')->latest()->paginate(10);
        confirmDelete();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'kategori_artikel' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $slug = Str::slug($request->title);
    
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->kategori_artikel = $request->kategori_artikel;
        $article->slug = $slug;
        $article->user_id = auth()->user()->id;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $article->image = 'images/'.$imageName;
        }
    
        try {
            $article->save();
            Alert::success('Success', 'Article created successfully.');
            return redirect()->route('articles.index');
        } catch (QueryException $e) {
            // Handle duplicate slug error
            if ($e->getCode() == '23000' && strpos($e->getMessage(), 'articles_slug_unique') !== false) {
                Alert::error('Error', 'Artikel dengan judul ini sudah ada, gunakan judul lainnya.')->persistent('Close');
                return redirect()->back()->withInput();
            }
            Alert::error('Error', 'Something went wrong.')->persistent('Close');
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $article = Article::findOrFail($id); // Mencari artikel berdasarkan ID

        return view('article', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'kategori_artikel' => 'required',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $article = Article::find($id);
    
        // Generate slug from title
        $slug = Str::slug($request->title);
    
        // Check for duplicate slug in articles other than the current article
        $existingArticle = Article::where('slug', $slug)->where('id', '!=', $id)->first();
    
        if ($existingArticle) {
            // Handle duplicate slug error
            Alert::error('Error', 'Artikel dengan judul ini sudah ada, gunakan judul artikel lain.')->persistent('Close');
            return redirect()->back()->withInput(); // Return to form with input data
        }
    
        $article->title = $request->title;
        $article->content = $request->content;
        $article->kategori_artikel = $request->kategori_artikel;
        $article->slug = $slug;
    
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($article->image && file_exists(public_path($article->image))) {
                unlink(public_path($article->image));
            }
    
            // Upload new image
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $article->image = 'images/'.$imageName;
        }
    
        try {
            $article->save();
            Alert::success('Success', 'Article updated successfully.');
            return redirect()->route('articles.index');
        } catch (QueryException $e) {
            Alert::error('Update Failed', 'Something went wrong.')->persistent('Close');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        Alert::success('Berhasil Dihapus', 'Artikel Berhasil Dihapus.');
        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully');
    }

    public function indexForGuests($slug)
    {
        $article = Article::where('slug', $slug)->first();
        if (!$article) {
            abort(404); // Artikel tidak ditemukan, tampilkan halaman 404
        }

        $relatedArticles = Article::where('id', '!=', $article->id)->latest()->take(5)->get();

        return view('article', compact('article', 'relatedArticles'));
    }
}
