@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center flex-wrap card-container" style="gap: 2rem;">
        @foreach ($products as $product)
            <div class="card" style="width: 16rem;">
                <img src="{{asset('storage/'.$product->product_image)}}" class="card-img-top" alt="..." style="aspect-ratio: 16 / 10; object-fit: cover">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{$product->product_name}}</h5>
                    <p class="card-text flex-grow-1">Rp. {{number_format($product->product_price, 0, ',', '.')}}</p>
                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
    {{'Halaman: '. $products->currentPage()}} <br>
    {{'Total Data: '. $products->total()}} <br>
    {{$products->links()}}
</div>
@endsection
