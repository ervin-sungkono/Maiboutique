@extends('layouts.app')

@section('title', 'Maiboutique | '.$cart->product->name)

@section('content')
    <div class="container d-flex gap-4">
            @if(file_exists(public_path().'\storage/'.$cart->product->imageUrl))
                <img src="{{asset('storage/'.$cart->product->imageUrl)}}" class="card-img-top" alt="..." style="aspect-ratio: 16 / 10; object-fit: cover">
            @else
                <img src="{{$cart->product->imageUrl}}" class="card-img-top" alt="..." style="aspect-ratio: 16 / 10; object-fit: cover">
            @endif
            <div class="card-body">
                <h2 class="fw-bold">{{$cart->product->name}}</h2>
                <p class="fs-5">Rp {{number_format($cart->product->price, 0, ',', '.')}}</p>
                <div class="description">
                    <h5 class="fw-bold">Description:</h5>
                    <p class="card-text">{{$cart->product->description}}</p>
                </div>
                <div class="d-flex align-items-end my-3 w-100 gap-3">
                    <form method="POST" action="{{ route('cart.update', ['id' => $cart->id]) }}" class="col-8">
                        @method('PUT')
                        @csrf
                        <div class="col">
                            <label for="quantity" class="form-label">{{ __('Quantity:') }}</label>
                            <div class="col-md-6 w-100">
                                @error('quantity')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group w-100">
                                    <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $cart->quantity }}" autofocus>
                                    <button type="submit" class="btn btn-primary">Update Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="{{route('cart.detail')}}" class="btn btn-warning col-3">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
