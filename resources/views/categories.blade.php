@extends('layouts.app')

@section('content')

@foreach($categories as $category)
    <p>{{ $category->name }}</p>
    @foreach($category->products as $prod)
        <p>{{ $prod->name }}</p>
    @endforeach
@endforeach
    {{ $categories->links() }}

@endsection