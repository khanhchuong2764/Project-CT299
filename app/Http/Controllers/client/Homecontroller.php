<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class Homecontroller extends Controller
{
    public function index() {
        $find = [
            'delete' => false,
            'status' => 'active'
        ];
        $product = Product::where($find)->get();
        return view('client/pages/home/index',[
            'TitlePage' => 'Trang Chủ',
            'product' => $product
        ]);
    }
}
