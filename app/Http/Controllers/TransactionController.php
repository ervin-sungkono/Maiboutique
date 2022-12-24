<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function store(){
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);
        $carts = Auth::user()->cart->details;
        foreach($carts as $cart){
            $transDetail = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
            ]);
            if(!$transDetail){
                $transaction->delete();
                return redirect()->route('cart.detail')->with('fail','Fail to checkout');
            }else{
                $cart->delete();
            }
        }
        return redirect()->route('cart.detail')->with('success','Checkout successful!');
    }

    public function getTransaction(){
        $transactions = Auth::user()->transactions;
        return view('transaction.history', compact('transactions'));
    }
}
