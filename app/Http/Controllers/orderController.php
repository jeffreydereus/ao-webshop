<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Session;


class orderController extends Controller
{

    public function placeOrder(){
        if (!Auth::check()) {
            return redirect('/login');
        }
        if (!Session::get('cart')) {
            return redirect()->back()->with('message', "U kunt geen leeg winkelmandje kopen");
        }

        $totalPrice = 0;
        foreach (Session::get('cart') as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $order = new Order();
        $order->name = Auth::id() . "-" . date('d') . date('m') . date('y') . "-" . date('hi');
        $order->user_id = Auth::id();
        $order->total_price = $totalPrice;
        $order->save();

        foreach(Session::get('cart') as $item) {
            $order->products()->attach($item['id']);
        }

        Session::forget('cart');

        return redirect('/');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        $orders = $user->orders()->get();

        return view('orders', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
