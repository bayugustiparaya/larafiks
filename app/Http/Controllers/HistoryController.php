<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index(){
        // mengambil semua data dari tabel Product melalui model
        // $order = Order::with('product')->get();
        $order = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.name')
            ->get();

        // mengembalikan view history.blade.php dengan data dari tabel
        return view('history', compact('order'))
        ->with('i');
    }
}
