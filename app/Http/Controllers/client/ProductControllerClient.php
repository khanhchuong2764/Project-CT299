<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\producer;

class ProductControllerClient extends Controller
{   
    public function index(Request $request) {
        $find = [
            'delete' => false,
            'status' => 'active'
        ];
        $products = Product::where($find)->orderBy('posittion', 'desc')->get();
        
        $records = $products->map(function ($product) {
            $product->final_price =ceil($product->price *(1 - $product->discountPercentage / 100));
            return $product;
        });
        $producer =Producer::all();
        $count =$records->count();
        return view('client/pages/product/index', [
            'titlePage' => 'Danh Sách Sản Phẩm',
            'record' => $records,
            'countproduct' => $count,
            'producer' => $producer
        ]);
        
    }

    public function detail(Request $request,string $id) {   
        
        $record = Product::find($id);
        $record->final_price =ceil($record->price *(1 - $record->discountPercentage / 100));
        return view('client/pages/product/detail',[
            'titlePage' => 'Chi Tiết Sản Phẩm',
            'record' => $record
        ]);
    }


    public function CategoryMenu(Request $request,string $id) {
        $categoryproduct=CategoryProduct::find($id);
        $categories = CategoryProduct::getCategoryIdsWithSubcategories($id);
            // Truy vấn sản phẩm dựa trên danh mục cha và các danh mục con
        $products = Product::whereIn('category_id', $categories) // Truy vấn với whereIn để tìm các category_id nằm trong mảng
        ->where('delete', false) // Kiểm tra không phải sản phẩm bị xóa
        ->where('status', 'active') // Kiểm tra trạng thái là 'active'
        ->orderBy('posittion', 'desc') // Sắp xếp theo vị trí
        ->get();
        $records = $products->map(function ($product) {
            $product->final_price =ceil($product->price *(1 - $product->discountPercentage / 100));
            return $product;
        });
        $producer =Producer::all();
        $count =$records->count();
        return view('client/pages/product/index', [
            'titlePage' => $categoryproduct->title,
            'record' => $records,
            'countproduct' => $count,
            'producer' => $producer
        ]);
        
    }
}
