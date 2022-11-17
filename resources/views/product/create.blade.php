@extends('layouts.app')

@section('title', 'Maiboutique | Add Item')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-3 fw-bold">{{ __('Add New Item') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Clothes Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Clothes Desc') }}</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Clothes Price') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Clothes Stock') }}</label>
                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{old('stock')}}">
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Clothes Image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" onchange="preview()">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center mb-3">
                            <p>{{__('Preview Image')}}</p>
                            <img src="{{asset('images/preview-img.png')}}" class="bg-black rounded shadow-m" id="preview-img" style="width: 300px; object-fit: cover; aspect-ratio: 16 / 10; cursor: pointer;" onclick="openFile()">
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary w-50">
                                    {{ __('Add Item') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-primary mt-4">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function preview() {
        document.getElementById('preview-img').src = URL.createObjectURL(event.target.files[0]);
    }
    function openFile() {
        document.getElementById('image').click();
    }
</script>
@endsection
