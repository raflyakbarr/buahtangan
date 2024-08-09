<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\ImageHome;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $cards = Card::all();
        $images = ImageHome::all();
        return view('welcome', compact('cards', 'images'));
    }
    public function editHome()
    {   
        $cards = Card::all();
        $images = ImageHome::all();
        confirmDelete();
        return view('edithome.index', compact('cards', 'images'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);

		$input = $request->all();
		if ($image = $request->file('image')) {
			$destinationPath = 'cards/';
			$gambarCard = date('YmdHis') . "." . $image->getClientOriginalExtension();
			$image->move(public_path($destinationPath), $gambarCard);
			$input['image'] = "$destinationPath$gambarCard";
		}

		Card::create($input);
        return redirect()->route('edithome.index')->with('success', 'Card created successfully.');
    }
    public function destroy($id)
    {
        $card = Card::findOrFail($id);

        // Hapus gambar terkait jika ada
        if (file_exists(public_path($card->image))) {
            unlink(public_path($card->image));
        }

        $card->delete();
        return redirect()->route('edithome.index')->with('success', 'Card deleted successfully.');
    }
        public function edit($id)
    {
        $card = Card::findOrFail($id);
        return response()->json($card);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);

        $card = Card::findOrFail($id);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'cards/';
            $gambarCard = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $gambarCard);
            
            // Hapus gambar lama jika ada
            if (file_exists(public_path($card->image))) {
                unlink(public_path($card->image));
            }
            
            $input['image'] = "$destinationPath$gambarCard";
        } else {
            unset($input['image']);
        }

        $card->update($input);
        return redirect()->route('edithome.index')->with('success', 'Card updated successfully.');
    }
    public function addImage(Request $request)
    {
        $request->validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:50000',
        ]);
    
        $input = [];
        if ($image = $request->file('image_url')) {
            $destinationPath = 'images/';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $filename);
            $input['image_url'] = "$destinationPath$filename";
            
            Log::info('Image tersimpan: ' . $input['image_url']); 
        } else {
            Log::warning('test debug, tidak ada gambar tersimpan');
        }
    
        ImageHome::create($input);
    
        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
    
    public function deleteImage($id)
    {
        // Temukan gambar berdasarkan ID
        $image = ImageHome::findOrFail($id);
    
        // Hapus gambar dari sistem file
        if (file_exists(public_path($image->image_url))) {
            unlink(public_path($image->image_url));
        }
    
        // Hapus entri gambar dari database
        $image->delete();
    
        return redirect()->back()->with('success', 'Image deleted successfully!');
    }

}
