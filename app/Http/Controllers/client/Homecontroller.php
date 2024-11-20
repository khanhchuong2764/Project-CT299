<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;

class Homecontroller extends Controller
{
    public function index() {
        $find = [
            'delete' => false,
            'status' => 'active'
        ];
        $products = Product::where($find)->orderBy('posittion', 'desc')->get();
        
        $records = $products->map(function ($product) {
            $product->final_price =ceil($product->price *(1 - $product->discountPercentage / 100));
            return $product;
        });
        return view('client/pages/home/index', [
            'titlePage' => 'Trang Chủ',
            'record' => $records,
        ]);
        
    }
}
