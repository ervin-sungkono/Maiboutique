@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">
    <form class="card col-6" action="{{route('profile.update')}}" method="POST">
        @method('put')
        @csrf
        <h1 class="text-center p-1">Update Profile</h1>
        <div class="card-body">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                {{-- <input type="text" value="{{$user->username}}" class="form-control" name="username"> --}}
                <div class="col">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="name" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                {{-- <input type="email" value="{{$user->email}}" class="form-control" name="email"> --}}
                <div class="col">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('email') }}" autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                {{-- <input type="text" value="{{$user->phone_number}}" class="form-control" name="phone_number"> --}}
                <div class="col">
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="tel" autofocus>
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                {{-- <input type="text" value="{{$user->address}}" class="form-control" name="address"> --}}
                <div class="col">
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="street-address" autofocus>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Update</button>
            <a class="btn btn-outline-danger ms-3" href="{{route('profile')}}">Back</a>
        </div>
    </form>
</div>
@endsection
