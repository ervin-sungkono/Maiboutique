<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    protected $appends = ['total_price'];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function getTotalPriceAttribute(){
        return $this->product->price * $this->quantity;
    }
}
