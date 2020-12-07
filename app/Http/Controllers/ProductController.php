<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        // mengambil semua data dari tabel Product melalui model
        $product = Product::all();

        // mengembalikan view product.blade.php dengan data dari tabel
        return view('product', compact('product'))
        ->with('i');
    }

    public function addIndex(){
        $action = "add";
        return view('product-form', compact('action'));
    }

    public function add(Request  $request){
        $product = new Product();
        $product->name = $request->namaproduct;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        if ($request->file == null) {
            $product->img_path = "";
        } else {
            $filename = time().str_replace(' ', '', $request->file->getClientOriginalName());
            $request->file->storeAs('public', $filename);
            $product->img_path = $filename;
        }
        $product->save();

        return redirect()->route('product.index')
        ->with('message','Product successfully added.');
    }

    public function updateIndex($id){
        $product = Product::find($id);
        $action = "update";
        return view('product-form', compact('product','action'));
    }

    public function update($id, Request  $request){
        $product = Product::find($id);
        $product->name = $request->namaproduct;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        if ($request->file == null) {
            $product->img_path = $request->img_path;
        } else {
            $filename = time().str_replace(' ', '', $request->file->getClientOriginalName());
            $request->file->storeAs('public', $filename);
            $product->img_path = $filename;
        }
        $product->update();

        return redirect()->route('product.index')
        ->with('message','Product successfully update.');
    }

    public function delete(Request $request){
        $product = Product::find($request->id);
        $filename = $product->img_path;
        Storage::delete($filename);
        $product->delete();
        return redirect()->route('product.index')
        ->with('message','Product successfully delete.');
    }
}
