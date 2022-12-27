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
                <div class="col">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username}}">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="col">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <div class="col">
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{$user->phone_number}}">
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <div class="col">
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$user->address}}">
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
