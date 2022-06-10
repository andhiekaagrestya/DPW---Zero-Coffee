<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }
    
    public function checkout(Request $request)
    {
        $data = $request->all();
 
        $customer = User::where('email', $data['email'])->first();
        $orders = Order::where([
            ['customer_id', '=' , $customer->id],
            ['order_status', '=' ,'checkout']
            ])->get();
        return OrderResource::collection($orders);
    }


    // post
    public function store(Request $request)
    {
        // auth customer
        $data = $request->all();
        // akan diganti
        // $customer_id = 1;
        $customer = User::where('email', $data['email'])->first();
        // dd($data['email']);
        $customer_id = $customer->id;
        $porduct = Product::find($data['id']);
        
        $order = Order::where([
            ['customer_id', '=' , $customer_id],
            ['order_status', '=' ,'checkout']
        ])->first();

        if(!is_null($order)){
            // cek jika ada product yang sama dalam satu orderan
            $order_detail = OrderDetail::where('product_id', $porduct->id)->where('order_id', $order->id)->first();
            if(is_null($order_detail)){
                // kondisi jika satu
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $porduct->id,
                    'amount' => 1,
                    'price' => $porduct->price,
                ]);
                return response()->json([
                    "status" => true,
                    "message" => "Data Berhasil dimasukan kedalam keranjang.",
                    "data" => []
                ]);
            }else{
                $order_detail->update([
                    'amount' => $order_detail->amount + 1,
                    'price' => $porduct->price * ($order_detail->amount + 1)
                ]);
                return response()->json([
                    "status" => true,
                    "message" => "Data Berhasil dimasukan kedalam keranjang.",
                    "data" => []
                ]);
            }
        }
        $order = Order::create([
            "customer_id" => $customer_id,
            "shipment" => "grab",
            "order_status" => "checkout",
            "payment_method" => "OVO"
        ]);

        OrderDetail::create([
            "product_id" => $porduct->id,
            "order_id" => $order->id,
            "amount" => 1,
            "price" => $porduct->price
        ]);
        
        return response()->json([
            "status" => true,
            "message" => "Data Berhasil dimasukan kedalam keranjang.",
            "data" => []
        ]);
    }

    public function delete($id){
        $order_detail = OrderDetail::find($id);
        $order_detail->delete();
        return response()->json([
            "status" => true,
            "message" => "Data behasil dihapus"
        ]);
    }

    public function buying(Request $request){
        $data = $request->all();
        $order = Order::find($data['id']);
        $order->update([
            "shipment" => $data['kurir'],
            "payment_method" => $data['method'],
            "order_status" => "buy"
        ]);
        return response()->json([
            "status" => true,
            "message" => "Item Berhasil di checkout."
        ]);
    }
}
