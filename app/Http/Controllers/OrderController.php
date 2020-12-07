<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        // mengambil semua data dari tabel Product melalui model
        $product = Product::all();

        // mengembalikan view order.blade.php dengan data dari tabel
        return view('order', compact('product'));
    }

    public function addIndex($id){
        $product = Product::find($id);
        return view('order-form', compact('product'));
    }

    public function add(Request  $request){
        $order = new Order();
        $order->product_id = $request->productid;
        $order->buyer_name = $request->buyername;
        $order->buyer_contact = $request->buyercontact;
        $order->amount = $request->quantity;
        $order->save();

        $prod = Product::find($request->productid);
        $prod->stock = $prod->stock - $request->quantity;
        $prod->update();

        return redirect()->route('order.index')
        ->with('message','Success buying.');
    }
}
