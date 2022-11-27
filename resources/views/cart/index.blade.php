@extends('layouts.app')

@section('Maiboutique | Cart')

@section('content')
    <div class="container d-flex gap-3 justify-content-center">
        @foreach ($carts as $cart)
            <div class="card col-6">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$cart->product->imageUrl)}}" class="w-100 h-100 rounded-start" alt="..." style="object-fit: cover">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title fw-bold flex-grow-1">{{$cart->product->name}}</h5>
                        <p class="card-text mb-0">Rp. {{number_format($cart->product->price, 0, ',', '.')}}</p>
                        <p class="card-text">Qty: {{$cart->quantity}}</p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{route('cart.form', ['id' => $cart->id])}}" class="btn btn-warning flex-grow-1">Ubah</a>
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
        @endforeach

    </div>
@endsection
