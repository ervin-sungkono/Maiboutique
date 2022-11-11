@extends('layouts.app')

@section('title', '{{$product->product_name}}')

@section('content')
<div class="container">
    <img src="{{asset('storage/'.$product->product_image)}}" alt="">
    {{$product->product_desc}}
</div>
@endsection
