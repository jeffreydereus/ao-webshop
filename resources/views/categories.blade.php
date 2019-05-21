@extends('layouts.app')

@section('content')

@foreach($categories as $category)
    <a href="/product/showproducts/{{$category->id}}">{{ $category->name }}</a>

@endforeach
    {{ $categories->links() }}

@endsection