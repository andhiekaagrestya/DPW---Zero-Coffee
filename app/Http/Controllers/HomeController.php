<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::get();
        return view('home', ['product' => $product]);
    }

    public function hapus($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back();
    }

    public function edit($id)
    {
        // $porduct = Product::find($id);
        return view('edit', ['id' => $id]);
    }

    public function tambah()
    {
        return view('tambah');
    }


    public function update(Request $request){
        // dd($request->all());
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
        return back();
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
        return back();
    }

    public function detail($id){
        return view('pesanan.detail', ['id'=>$id]);
    }
}
