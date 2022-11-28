@extends('layouts.app')

@section('title', 'Maiboutique | Search')

@section('content')
<div class="container">
    <form action="{{route('search')}}" method="GET" role="search">
        <div class="input-group w-50 mb-3 m-auto">
            <input name="q" type="text" class="form-control" placeholder="Search products.." aria-label="Search" aria-describedby="search-btn" value="{{$q}}">
            <button type="submit" class="btn btn-primary" type="button" id="search-btn">Search</button>
        </div>
    </form>
    <div class="d-flex justify-content-center flex-wrap card-container gap-3">
        @foreach ($products as $product)
            <div class="card border-0 shadow bg-white" style="width: 16rem;">
                @if(file_exists(public_path().'\storage/'.$product->imageUrl))
                    <img src="{{asset('storage/'.$product->imageUrl)}}" class="card-img-top" alt="..." style="aspect-ratio: 16 / 10; object-fit: cover">
                @else
                    <img src="{{$product->imageUrl}}" class="card-img-top" alt="..." style="aspect-ratio: 16 / 10; object-fit: cover">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold flex-grow-1">{{$product->name}}</h5>
                    <p class="card-text">Rp {{number_format($product->price, 0, ',', '.')}}</p>
                    <a href="{{route('product.detail',['id'=>$product->id])}}" class="btn btn-primary w-100">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination-wrapper d-flex justify-content-center mt-4">
        {{$products->onEachSide(1)->withQueryString()->links()}}
    </div>
</div>
@endsection

@section('script')
<script>

</script>
@endsection
