@extends('layouts.app')

@section('content')

<div class="container">
    @if($transactions->count() > 0)
        <h1 class="text-center">Check What You've Bought</h1>
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Transaction {{$t->id}}</h5>
                    @foreach ($transactions as $t)
                    <p class="card-text"> - {{$t->quantity}} pc(s) {{$t->product->name}}</p>
                    @endforeach
                    <p class="card-text"><small class="text-muted">{{$t->created_at}}</small></p>
                    </div>
                </div>

    @else
        <p class="d-flex text-muted fs-1 justify-content-center w-100">You have not buy anything yet!</p>
    @endif
</div>

@endsection
