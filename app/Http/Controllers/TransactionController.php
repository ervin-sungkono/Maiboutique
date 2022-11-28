<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function store(){
        foreach(Auth::user()->carts as $cart){
            $transaction = Transaction::create([
                'user_id' => $cart->user_id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
            ]);
            if(!$transaction){
                return redirect()->route('cart.detail')->with('fail','Fail to checkout');
            }else{
                $cart->delete();
            }
        }
        return redirect()->route('cart.detail')->with('success','Checkout successful!');
    }
}
