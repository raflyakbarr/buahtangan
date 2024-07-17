<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

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
            'content' => 'required', // You can adjust this validation as needed
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk gambar
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title);
        $article->user_id = auth()->user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $article->image = 'images/'.$imageName;
        }

        $article->save();

        return redirect()->route('articles.index')
            ->with('success', 'Article created successfully.');
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
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image && file_exists(public_path($article->image))) {
                unlink(public_path($article->image));
            }

            // Upload gambar baru
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $article->image = 'images/'.$imageName;
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
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
