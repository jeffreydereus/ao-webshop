@extends('layouts.app')

@section('content')

    @foreach($products as $product)
        <img src="{{$product->image_url}}" class="">
        <h1><a href="/product/viewproduct/{{$product->id}}">{{$product->name}}</a></h1>

    @endforeach

@endsection