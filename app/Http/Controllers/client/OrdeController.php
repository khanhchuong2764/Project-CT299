<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Product;

class OrdeController extends Controller
{
    public function index() {
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
        return view('client/pages/checkout/index', [
            'titlePage' => 'Đặt Hàng',
            'productDetails' => $productDetails,
            'totalPrice' => $totalPrice
        ]);
        
    }


    public function order(Request $request) {
        $cartId = Cookie::get('CartId');
        $finduser = [
            'tokenUser' => Cookie::get('tokenUser')
        ];
        $user = User::where($finduser)->first();
        $user_id = null;

        if (isset($user)) {
            $user_id = $user->id;
        }
        // Tạo đơn hàng mới
        $find = [
            'cartID' => $cartId,
            'userId' => $user_id,
            'fullname' => $request->input('fullname'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ];
        $order = Order::create($find);
        // Lấy chi tiết giỏ hàng
        $findcart = [
            'cartId' => $cartId,
        ];
        $cartdetail = CartDetail::where($findcart)->get();

        foreach ($cartdetail as $value) {
            // Tạo chi tiết đơn hàng mới từ dữ liệu `CartDetail`
            OrderDetail::create([
                'orderId' => $order->id,
                'productId' => $value->productId,
                'quantity' => $value->quantity,
                'price' => $value->cartproduct->price,
                'discountPercentage' => $value->cartproduct->discountPercentage,
            ]);
            
            // Cập nhật lại số lượng sản phẩm trong product với stock
            $product123=Product::find($value->productId);
            $stock = $product123->stock - $value->quantity;
            $product123->update(['stock' => $stock]);
            
        }
        CartDetail::where($findcart)->delete();
        session()->flash('success', 'Đặt Hàng Thành Công');
        return redirect("/checkout/success/{$order->id}");
    }



    public function success(Request $request,string $orderId) {
        $order = Order::find($orderId);
        $find=[
            'orderId' =>$order->id 
         ];
         $OrderDetail = OrderDetail::where($find)->get();
         $productDetails = [];
         foreach ($OrderDetail as $key => $value) {
          
             $value->final_price =ceil($value->price *(1 - $value->discountPercentage / 100));
             $value->totalPrice =$value->quantity * $value->final_price;
             $productDetails[] = $value;
         }
         $totalPrice = array_reduce($productDetails, function ($sum, $OrderDetail123) {
             return $sum + $OrderDetail123->totalPrice;
         }, 0);
         
        return view('client/pages/checkout/success', [
            'titlePage' => 'Đặt Hàng Thành Công',
            'productDetails' => $productDetails,
            'totalPrice' => $totalPrice,
            'order' => $order
        ]);
    }
}
