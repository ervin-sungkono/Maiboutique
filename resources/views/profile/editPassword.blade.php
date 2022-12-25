@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <form class="card col-6" action="{{route('password.update')}}" method="POST">
        @method('put')
        @csrf
        <h1 class="text-center p-2">Update Password</h1>
        <div class="card-body">
            <div class="mb-3">
                <label for="current_password" class="form-label">Old Password</label>
                <input type="password" class="form-control" name="current_password">
              </div>
              <div class="mb-3">
                  <label for="new_password" class="form-label">New Password</label>
                  <input type="password" class="form-control" name="new_password" placeholder="5-20 characters">
                </div>
              <button type="submit" class="btn btn-primary">Save Update</button>
              <a class="btn btn-outline-danger ms-3" href="{{route('profile')}}">Back</a>
        </div>
    </form>
</div>

@endsection
