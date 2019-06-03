@extends('layouts.app')

@section('content')
    <div class="container">

        @if (count(Session::get('cart')) > 0)
            <table class="table table-striped cartTable">
                <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach (Session::get('cart') as $item)
                    <tr class="cartItem">
                        <td>{{$item['name']}}</td>
                        <td>€ {{$item['price']}}</td>
                        <td>{{$item['quantity']}}</td>
                        <td>€ {{$item['price'] * $item['quantity']}}</td>
                        <td>
                            @php
                                $item_index = array_search($item, Session::get('cart'))
                            @endphp
                            <a class="nav-link" href="{{route('cart.addQty', $item_index)}}">
                                <i class="fas fa-plus"></i>
                            </a>
                            <a class="nav-link" href="{{route('cart.removeProduct', $item_index)}}">
                                <i class="fas fa-minus"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h3>Total price: € {{$totalPrice}}</h3>
{{--            <a class="btn btn-primary" href="{{route('order.place')}}">Confirm Order</a>--}}

        @else
            <h5>Your cart is empty</h5>
        @endif

    </div>
@endsection
