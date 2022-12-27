@extends('layouts.app')

@section('content')

<div class="container">
    @if($transactions->count() > 0)
        <h1 class="text-center mb-5">Check What You've Bought</h1>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                @foreach ($transactions as $transaction)
                <div class="card col-5">
                    <div class="card-body">
                    <h5 class="card-title">Transaction Id: {{$transaction->id}}</h5>
                    <ul class="">
                        @foreach ($transaction->details as $td_detail)
                        <li class="card-text"> {{$td_detail->quantity}} pc(s) {{$td_detail->product->name}} <span class="ms-3 fw-bold">Rp {{number_format($td_detail->total_price), 0, ',', '.'}}</span></li>
                        @endforeach
                    </ul>
                    <p><i>Total Price: </i> <strong>Rp {{number_format($transaction->details->sum('total_price'), 0, ',', '.')}}</strong></p>
                    <p class="card-text"><small class="text-muted">{{$transaction->created_at}}</small></p>
                    </div>
                </div>
            @endforeach
            </div>
    @else
        <p class="d-flex text-muted fs-1 justify-content-center w-100">You have not buy anything yet!</p>
    @endif
</div>

@endsection
