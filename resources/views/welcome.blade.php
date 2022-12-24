@extends('layouts.app')

@section('style')
<style>
    .bg-image-body{
        height: 100vh;
        width: 100%;
    }
</style>
@endsection

@section('inline-style')
    style="background-image: url({{asset('images/background_welcome.png')}})"
@endsection

@section('content')
<div class="bg-image-body">
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <h1 class="fw-bold text-light">Welcome to Maiboutique</h1>
        <p class="text-light">Online Boutique that Provides You with Various Clothes to Suit Your Various Activities</p>
        <a class="btn btn-primary" href="{{route('register')}}">{{__('Sign Up')}}</a>
    </div>

</div>
@endsection
