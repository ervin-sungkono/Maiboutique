<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(8);
        return view('home', compact('products'));
    }

    public function search($query){

    }

    public function viewDetail($id){
        $product = Product::findOrFail($id);
        return view('product.detail', compact('product'));
    }

    public function store(Request $request){

    }

    public function update(Request $request){

    }

    public function delete($id){

    }
}
