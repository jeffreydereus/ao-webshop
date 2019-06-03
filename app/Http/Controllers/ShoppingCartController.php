<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
//use App\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
//use App\OrderProducts;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
    public function getShoppingCart()
    {
        return ShoppingCart::getShoppingCart();
    }

    //add products to the cart
    public function addProductToShoppingCart($id)
    {
        return ShoppingCart::addProductToShoppingCart($id);
    }

    //remove products from card if ammount is 0, else remove the products
    public function removeProduct($id)
    {
        return ShoppingCart::removeProduct($id);
    }

    //increase selected products quantity
    public function addProductQty($id)
    {
        return ShoppingCart::addProductQty($id);
    }
}