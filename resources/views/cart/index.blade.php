@extends('layouts.app')

@section('Maiboutique | Cart')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap gap-3 justify-content-center py-3">
            @foreach ($carts as $cart)
                @if($cart->product)
                    <div class="card col-5">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if(file_exists(public_path().'\storage/'.$cart->product->imageUrl))
                                    <img src="{{asset('storage/'.$cart->product->imageUrl)}}" class="w-100 h-100 rounded-start" alt="..." style="object-fit: cover">
                                @else
                                    <img src="{{$cart->product->imageUrl}}" class="w-100 h-100 rounded-start" alt="..." style="object-fit: cover">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <h5 class="card-title fw-bold flex-grow-1">{{$cart->product->name}}</h5>
                                <p class="card-text mb-0">Rp {{number_format($cart->product->price, 0, ',', '.')}}</p>
                                <p class="card-text">Qty: {{$cart->quantity}}</p>
                                <div class="d-flex flex-wrap gap-2">
                                    <form action="{{route('cart.form', ['id' => $cart->id])}}" class="flex-grow-1">
                                        @csrf
                                        <button type="submit" class="btn btn-warning w-100">Ubah</button>
                                    </form>
                                    <form action="{{route('cart.delete', ['id'=> $cart->id])}}" method="POST" class="flex-grow-1">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger w-100">Hapus</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @if ($carts->count() > 0)
            <hr>
            <form action="{{route('transaction.create')}}" method="POST" class="col-6 py-3 m-auto">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Details</h5>
                        @foreach ($carts as $cart)
                        <div class="d-flex justify-content-between">
                            <p class="card-text mb-2">{{$cart->product->name}}<span>&times;{{$cart->quantity}}</span></p>
                            <strong class="card-text mb-2">Rp {{number_format($cart->total_price, 0, ',', '.')}}</strong>
                        </div>
                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title fw-bold mb-3">Total Price</h5>
                            <strong>Rp {{number_format($carts->sum('total_price'), 0, ',', '.')}}</strong>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Checkout <span>&lpar;{{$carts->sum('quantity')}}&rpar;</span></button>
                    </div>
                </div>
            </form>
        @else
        <div class="fs-3 text-center">
            <strong>
                Cart is still empty, buy products <span><a href="{{route('home')}}">here</a></span>
            </strong>
        </div>
        @endif
    </div>
@endsection
