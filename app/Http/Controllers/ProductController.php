<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;



class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        $products = Product::all();
        confirmDelete();
        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Validasi untuk gambar
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $input = $request->all();
        
        if ($request->hasFile('images')) {
            $destinationPath = 'images/';
            $imagePaths = [];
    
            foreach ($request->file('images') as $image) {
                $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($destinationPath), $imageName);
                $imagePaths[] = "$destinationPath$imageName";
            }
    
            $input['images'] = $imagePaths;
        }
    
        try {
            Product::create($input);
            return response()->json(['success' => true, 'message' => 'Product Data Added Successfully.']);
        } catch (QueryException $e) {
            if ($e->getCode() == '23000' && strpos($e->getMessage(), 'products_slug_unique') !== false) {
                return response()->json(['success' => false, 'message' => 'Nama produk tidak boleh sama.'], 422);
            }
            return response()->json(['success' => false, 'message' => 'Something went wrong.'], 500);
        }
    }
		public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $input = $request->all();
    
        // Inisialisasi array untuk menyimpan path gambar baru
        $newImages = [];
    
        if ($files = $request->file('images')) {
            $destinationPath = 'images/';
    
            // Hapus gambar lama jika ada
            if ($product->images) {
                foreach (json_decode($product->images) as $image) {
                    if (file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                }
            }
    
            // Upload gambar baru
            foreach ($files as $file) {
                $gambarProduk = date('YmdHis') . "_" . uniqid() . "." . $file->getClientOriginalExtension();
                $file->move(public_path($destinationPath), $gambarProduk);
                $newImages[] = "$destinationPath$gambarProduk";
            }
    
            // Simpan path gambar baru sebagai JSON
            $input['images'] = json_encode($newImages);
        } else {
            unset($input['images']); // Tidak ada gambar baru, jangan ubah field images
        }
    
        try {
            $product->update($input);
            Alert::success('Changed Successfully', 'Products Data Changed Successfully.');
        } catch (QueryException $e) {
            // Handle duplicate slug error
            if ($e->getCode() == '23000' && strpos($e->getMessage(), 'products_slug_unique') !== false) {
                Alert::error('error', 'Nama produk sudah ada, gunakan nama lain.');
                return redirect()->back()->withErrors(['name' => 'Nama produk sudah ada.'])->withInput();
            }
            return redirect()->back()->withErrors(['error' => 'Something went wrong.'])->withInput();
        }
    
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        Alert::success('Deleted Successfully', 'Products Data Deleted Successfully.');
        return redirect()->route('products.index');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'Produk.xlsx');
    }

    public function indexForGuests(Request $request, $slug = null)
    {
        if ($slug) {
            $product = Product::where('slug', $slug)->firstOrFail();
            return view('product-detail', ['product' => $product]);
        }
        $categorySlug = $request->input('category');
    
        $productsQuery = Product::with('category');
        
        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $productsQuery->where('category_id', $category->id);
            }
        }
        
        $products = $productsQuery->paginate(12);
        $selectedCategory = $categorySlug ? Category::where('slug', $categorySlug)->first() : null;
        
        $categories = Category::all();
        
        return view('product-list', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'isCategoryView' => $categorySlug !== null
        ]);
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $productsQuery = Product::with('category'); // Pastikan untuk memuat relasi kategori
        
        if ($keyword) {
            $productsQuery->where('name', 'LIKE', "%{$keyword}%")
                        ->orWhere('description', 'LIKE', "%{$keyword}%");
        }
        
        $products = $productsQuery->get();
        
        // Get unique categories using a join to the categories table
        $categories = Category::all(); // Ambil semua kategori dari tabel kategori
        
        return view('product-list', [
            'products' => $products,
            'categories' => $categories,
            'isCategoryView' => false
        ]);
    }
}
