@extends('layouts.app')

@section('Maiboutique | Cart')

@section('content')
    @foreach ($carts as $cart)
        <div class="card border-0 shadow bg-white" style="width: 16rem;">
            <img src="{{asset('storage/'.$cart->product->imageUrl)}}" class="card-img-top" alt="..." style="aspect-ratio: 16 / 10; object-fit: cover">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold flex-grow-1">{{$cart->product->name}}</h5>
                <p class="card-text">Rp. {{number_format($cart->product->price, 0, ',', '.')}}</p>
                <div class="card-text">Qty: {{$cart->quantity}}</div>
                <a href="{{route('product.detail',['id'=>$cart->product->id])}}" class="btn btn-primary w-100">Lihat Detail</a>
            </div>
        </div>
    @endforeach
@endsection
