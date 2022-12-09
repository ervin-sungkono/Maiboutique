<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(8);
        return view('home', compact('products'));
    }

    public function showForm(){
        return view('product.create');
    }

    public function search(Request $request){
        $text = $request->q;
        $products = Product::where('name','LIKE',"%{$text}%")->paginate(8);
        return view('search', compact('products'))->with('q', $request->q);
    }

    public function viewDetail($id){
        $product = Product::findOrFail($id);
        return view('product.detail', compact('product'));
    }

    public function store(ProductRequest $request){
        $validated = $request->validated();

        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $filename = now()->timestamp.'_'.$name;

        $imageUrl = Storage::disk('public')->putFileAs('images', $file, $filename);
        $product = Product::create([
            'name' => $validated['name'],
            'imageUrl' => $imageUrl,
            'price' => $validated['price'],
            'description' => $validated['description'],
            'stock' => $validated['stock']
        ]);
        return redirect()->route('product.create')->with('status', $product ? 'Product added successfully!' : 'Fail to add product!');
    }

    public function delete($id){
        $product = Product::findOrFail($id);

        Storage::disk('public')->delete($product->imageUrl);
        $product->delete();
        $carts = Cart::where('product_id', '=', $id);
        $carts->delete();

        return redirect()->route('home')->with('success','Product deleted successfully!');
    }
}
