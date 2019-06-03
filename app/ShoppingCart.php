<?php

namespace App;

use App\Product;
use Illuminate\Support\Facades\Session;

class ShoppingCart
{
    public static function getShoppingCart(){
        $totalPrice = 0;

        if (Session::has('cart')) {
            foreach (Session::get('cart') as $item){
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }

        return view('shoppingCart', compact('totalPrice'));
    }

    public static function addProductToShoppingCart($id){
        if (!is_numeric($id)){
            return redirect('/');
        }
        $product = Product::find($id);

        if (!$product){
            return redirect('/');
        }

        $productData = collect(['id' => $product->id, 'name' => $product->name, 'price' => $product->price, 'quantity' => 1]);

        Session::push('cart', $productData);

        return redirect()->back();
    }

    public static function removeProduct($id){
        $item = Session::get('cart')[$id];

        if (!$item){
            return redirect('/');
        }

        $item['quantity'] == 1 ? Session::forget('cart.' . $id) : $item['quantity'] -= 1;

        return redirect()->back();

    }

    public static function addProductQty($id){

        $item = Session::get('cart')[$id];

        if (!$item) {
            return redirect('/');
        }

        $item['quantity'] += 1;

        return redirect()->back();

    }

}
