<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\producer;

class SearchController extends Controller
{
    public function index(Request $request) {
        $find = [
            'delete' => false
        ];

        $productsQuery = Product::where($find);
        
        // Search
        $keyword = $request->input('keyword');

        if ($keyword) {
            $productsQuery->where('title', 'regexp', $keyword);
        }
        $products = $productsQuery->get();
        $records = $products->map(function ($product) {
            $product->final_price =ceil($product->price *(1 - $product->discountPercentage / 100));
            return $product;
        });
        $producer =Producer::all();
        $count =$records->count();
        return view('client.pages.search.index',[
            'titlePage' => 'Kết Quả Tìm Kiếm',
            'keyword' => $keyword,
            'record' => $records,
            'countproduct' => $count,
            'producer' => $producer
        ]);
    }
}
