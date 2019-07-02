@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($products->chunk(3) as $items)
            <div class="row mt-2">
                @foreach($items as $product)

                    <div class="card productItem ">
                        <div class="card-body">
                            <h3 class="card-title">{{$product->name}}</h3>
                            <img src="{{$product->image_url}}" class="">
                            <h1><a href="/product/viewproduct/{{$product->id}}">Bekijk</a></h1>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>
    <div class="container">
        {{ $products->links() }}
    </div>
@endsection