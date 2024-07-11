<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        confirmDelete();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'price' => 'required|numeric',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$input = $request->all();
		if ($image = $request->file('image')) {
			$destinationPath = 'images/';
			$gambarProduk = date('YmdHis') . "." . $image->getClientOriginalExtension();
			$image->move(public_path($destinationPath), $gambarProduk);
			$input['image'] = "$destinationPath$gambarProduk";
		}

		Product::create($input);
		Alert::success('Added Successfully', 'Product Data Added Successfully.');
		return redirect()->route('products.index');
	}
		public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $gambarProduk = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $gambarProduk);
            $input['image'] = "$destinationPath$gambarProduk";
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
        } else {
            unset($input['image']);
        }

        $product->update($input);
        Alert::success('Changed Successfully', 'Products Data Changed Successfully.');
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

    public function indexForGuests()
    {
        $products = Product::all(); // Ambil semua data produk dari database
        return view('product-list', compact('products'));
    }

}
