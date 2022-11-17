@extends('layouts.app')

@section('title', 'Maiboutique | Search')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center flex-wrap card-container gap-3">
        @foreach ($products as $product)
            <div class="card border-0 shadow bg-white" style="width: 16rem;">
                <img src="{{asset('storage/'.$product->imageUrl)}}" class="card-img-top" alt="..." style="aspect-ratio: 16 / 10; object-fit: cover">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold flex-grow-1">{{$product->name}}</h5>
                    <p class="card-text">Rp. {{number_format($product->price, 0, ',', '.')}}</p>
                    <a href="{{route('product.detail',['id'=>$product->id])}}" class="btn btn-primary w-100">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination-wrapper d-flex justify-content-center mt-4">
        {{$products->onEachSide(1)->links()}}
    </div>
</div>
@endsection
