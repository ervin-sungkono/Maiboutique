@extends('layouts.app')

@section('content')

<div class="container text-center justify-content-center">
    <h2 class="mb-3 fw-bold">My Profile</h2>
    <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">{{$user->username}} </h5>
          <span class="badge bg-secondary mb-3">{{$user->role}}</span>
          <p class="card-text"><b><i>Email</i> :</b> {{$user->email}}</p>
          <p class="card-text"><b><i>Address</i> :</b> {{$user->address}}</p>
          <p class="card-text"><b><i>Phone Number</i> :</b> {{$user->phone_number}}</p>
          <div class="d-flex gap-2 justify-content-center">
            @if ($user->role != 'admin')
                <a href="{{route('profile.form')}}" class="btn btn-primary">Edit Profile</a>
            @endif
                <a href="{{route('password.form')}}" class="btn btn-outline-primary">Edit Password</a>
          </div>
        </div>
      </div>
</div>

@endsection
