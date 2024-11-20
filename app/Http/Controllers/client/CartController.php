<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use App\Models\CartDetail;

class CartController extends Controller
{
    public function index(Request $request) {
        
        $cartId = Cookie::get('CartId');
        $find=[
           'cartId' =>$cartId 
        ];
        $cartdetail = CartDetail::where($find)->get();
        $productDetails = [];
        foreach ($cartdetail as $key => $value) {
            $value->cartproduct->final_price =ceil($value->cartproduct->price *(1 - $value->cartproduct->discountPercentage / 100));
            $value->cartproduct->totalPrice =$value->quantity * $value->cartproduct->final_price;
            $productDetails[] = $value;
        }
        $totalPrice = array_reduce($productDetails, function ($sum, $cartDetail) {
            return $sum + $cartDetail->cartproduct->totalPrice;
        }, 0);
        return view('client/pages/cart/index',[
            'titlePage' => 'Giỏ Hàng',
            'productDetails' => $productDetails,
            'totalPrice' => $totalPrice
        ]);
    }




    public function addPost(Request $request ,string $productId) {   
        $quantity=$request->input('quantity');
        $cartId = Cookie::get('CartId');
        $objectCart = [
            'cartID' => $cartId,
            'productId' => $productId, 
            'quantity'  => $quantity
        ];
        $find = [
            'cartID'=> $cartId,
            'productId' => $productId, 
        ];
        // check xem trong cartdetail co cartId chua neu co roi thi cap nhat chua thi tao cartdetail
        $cartDetail = CartDetail::where($find)->first();
        if($cartDetail) {
            $count=$cartDetail->quantity; 
            $quantitynew = $quantity + $count;
            $cartDetail->update(['quantity' => $quantitynew]);
        }else {
            CartDetail::create($objectCart);
        }
        session()->flash('success', 'Đã thêm sản phẩm vào giỏ hàng');
        return redirect()->back();
    }   


    public function Delete(Request $request,string $productId) {
        $cartId = Cookie::get('CartId');
        $find = [
            'cartID'=> $cartId,
            'productId' => $productId, 
        ];
        CartDetail::where($find)->delete();
        session()->flash('success', 'Đã Xóa Sản Phẩm Khỏi Giỏ Hàng');
        return redirect()->back();
    }

    public function update(Request $request,string $productId,string $quantity) {
        $cartId = Cookie::get('CartId');
        $find = [
            'cartID'=> $cartId,
            'productId' => $productId, 
        ];
        $cartDetail = CartDetail::where($find)->first();
        $cartDetail->update(['quantity' => $quantity]);
        // check xem trong cartdetail co cartId chua neu co roi thi cap nhat chua thi tao cartdetail
        $cartDetail = CartDetail::where($find)->first();
        session()->flash('success', 'Cập nhật số lượng thành công');
        return redirect()->back();

    }
}
