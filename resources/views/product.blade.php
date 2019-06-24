@extends('layouts.app')

@section('content')

        <img src="{{$viewProduct->image_url}}">
        <h1>{{$viewProduct->name}}</h1>
        <p>{{$viewProduct->description}}</p>
        <a href="{{route('cart.addProduct', $viewProduct->id)}}">Add</a>

@endsection