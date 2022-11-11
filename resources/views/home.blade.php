@extends('layouts.app')

@section('title', 'Maiboutique | Home')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center flex-wrap card-container gap-3">
        @foreach ($products as $product)
            <div class="card" style="width: 16rem;">
                <img src="{{asset('storage/'.$product->product_image)}}" class="card-img-top" alt="..." style="aspect-ratio: 16 / 10; object-fit: cover">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{$product->product_name}}</h5>
                    <p class="card-text flex-grow-1">Rp. {{number_format($product->product_price, 0, ',', '.')}}</p>
                    <a href="{{route('product.detail',['id'=>$product->id])}}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination-wrapper d-flex justify-content-center mt-4">
        {{$products->onEachSide(2)->links()}}
    </div>
</div>
@endsection
