<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        // return ["id" => Auth::user()->id];
        return ProductResource::collection($product);
    }

    public function hapus($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            "status" => true,
            "message" => "Berhasil dihapus."
        ]);
    }

    public function store(Request $request){
        // dd($request->all());
        $file = $request->file('image');
        $file->move('images/products',$file->getClientOriginalName());
        $data = $request->all();
        Product::create([
            "name" => $data['name'],
            "slug" => Str::slug($data['name']),
            "price" => $data['price'],
            "description" => $data['description'],
            "image" => 'images/products/'.$file->getClientOriginalName()
        ]);
        return response()->json([
            "status" => true,
            "message" => "Berhasil di tambah."
        ]);
    }

    public function update(Request $request){
        // dd($request->all());
        if($request->file('image') != null){
            $file = $request->file('image');
            $file->move('images/products',$file->getClientOriginalName());
            $data = $request->all();
            $product = Product::find($data['id']);
            $product->update([
                "name" => $data['name'],
                "slug" => Str::slug($data['name']),
                "price" => $data['price'],
                "description" => $data['description'],
                "image" => 'images/products/'.$file->getClientOriginalName()
            ]);
        }else{
            $data = $request->all();
            $product = Product::find($data['id']);
            $product->update([
                "name" => $data['name'],
                "slug" => Str::slug($data['name']),
                "price" => $data['price'],
                "description" => $data['description'],
                // "image" => 'images/products/'.$file->getClientOriginalName()
            ]); 
        }
        return response()->json([
            "status" => true,
            "message" => "Berhasil di update"
        ]);
    }

    public function product($id)
    {
        $product = Product::find($id);
        return response()->json([
            "data" => $product,
        ]);
    }

    
}
