<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $categories = KategoriArtikel::all();
        return view('kategori_artikel.index', compact('categories'));
    }

    public function create()
    {
        return view('kategori_artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        KategoriArtikel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Generate slug from name
        ]);

        return redirect()->route('kategori_artikel.index')->with('success', 'Kategori artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = KategoriArtikel::findOrFail($id);
        return view('kategori_artikel.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = KategoriArtikel::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Generate slug from name
        ]);

        return redirect()->route('kategori_artikel.index')->with('success', 'Kategori artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = KategoriArtikel::findOrFail($id);
        $category->delete();

        return redirect()->route('kategori_artikel.index')->with('success', 'Kategori artikel berhasil dihapus.');
    }
}
