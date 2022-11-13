@extends('layouts.app')

@section('title', 'Maiboutique | '.$product->name)

@section('content')
<div class="container d-flex gap-4">
    <img src="{{asset('storage/'.$product->imageUrl)}}" alt="Product Image" class="rounded" style="width: max(33%, 240px); aspect-ratio: 16 / 10; object-fit: cover;">
    <div class="card flex-grow-1">
        <div class="card-body">
            <h2 class="fw-bold">{{$product->name}}</h2>
            <p class="fs-5">Rp. {{number_format($product->price, 0, ',', '.')}}</p>
            <div class="description">
                <h5 class="fw-bold">Description:</h5>
                <p class="card-text">{{$product->description}}</p>
            </div>
            <div class="d-flex align-items-end my-3 w-100 gap-3">
                @auth
                    @if (Auth::user()->role === 'member')
                    <form method="POST" action="{{ route('login') }}" class="col-8">
                        @csrf
                        <div class="col">
                            <label for="quantity" class="form-label">{{ __('Quantity:') }}</label>
                            <div class="col-md-6 w-100">
                                <div class="input-group w-100">
                                    <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" autofocus>
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                  </div>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                    @elseif (Auth::user()->role === 'admin')
                        <button type="button" class="btn btn-danger col-3" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Delete
                        </button>
                    @endif
                @endauth
                <a href="{{route('home')}}" class="btn btn-warning col-3">Back</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <strong>{{$product->name}}</strong> from the database?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{route('product.delete', ['id' => $product->id])}}" method="POST" class="form col-3">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
