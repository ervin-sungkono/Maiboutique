<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function store(CartRequest $request){
        $validated = $request->validated();
        $cart = Cart::where([
                ['user_id', '=', Auth::user()->id],
                ['product_id', '=', $request->product_id]
                ])->first();
        $status;
        if($cart){
            $cart->quantity = $validated['quantity'];
            $cart->save();
            $status = 'Cart updated successfully!';
        }else{
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'quantity' => $validated['quantity'],
           ]);
           $status = 'Successfully added item to cart!';
        }

        return redirect()->route('product.detail', ['id' => $request->product_id])->with('status', $status);
    }

    public function showCart(){
        $carts = Auth::user()->carts;
        return view('cart.index', compact('carts'));
    }

    public function showForm($id){
        $cart = Cart::findOrFail($id);

        if($cart->user_id != Auth::user()->id){
            return redirect()->route('home')->with('fail','Not authorized to edit this cart');
        }

        return view('cart.edit', compact('cart'));
    }

    public function update($id, CartRequest $request){
        $validated = $request->validated();

        $cart = Cart::findOrFail($id)->update([
            'quantity' => $validated['quantity'],
        ]);

        return redirect()->route('cart.detail')->with('success', 'Cart successfully updated!');
    }

    public function delete($id){
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('cart.detail')->with('success', 'Cart successfully deleted!');
    }
}
