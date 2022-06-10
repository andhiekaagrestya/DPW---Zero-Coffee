<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.customer_id')
                    ->get();
        return response()->json([
            "data" => $pesanan
        ]);
    }

    public function detail($id){
        $pesanan = DB::table('orders')
        // ->join('users', 'users.id', '=', 'orders.customer_id')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->where('customer_id', $id)
        ->select("name", "image", "amount", "products.price")
        ->get();
        return response()->json([
        "data" => $pesanan
        ]);
    }
}
