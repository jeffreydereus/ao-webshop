<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function getProducts($id){
        $products = DB::table('products')->join('category_product', 'products.id', '=', 'category_product.category_id')->select('products.image_url', 'products.name', 'products.id')->get();
        echo count($products);
        return $products;
    }
}
