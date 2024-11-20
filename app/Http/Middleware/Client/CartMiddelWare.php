<?php

namespace App\Http\Middleware\Client;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use App\Models\CartDetail;
class CartMiddelWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {    
        if (!Cookie::get('CartId')) {
            //Tao Gioi Hang
            $cart= Cart::create();
            $expiresCookie = 365 * 24 * 60 * 60 * 1000;   
            $expiresCookieInMinutes = $expiresCookie / 60 / 1000; // Chuyển đổi từ ms sang phút
            Cookie::queue('CartId', $cart->id, $expiresCookieInMinutes);
        }else {
            $find = [
                'cartID'=> Cookie::get('CartId'),
            ];
            $cartdetail = CartDetail::where($find)->get();
            $cartdetail->totalQuantity = $cartdetail->reduce(function ($sum, $cartDetail) {
                return $sum + $cartDetail->quantity;
            }, 0);
            view()->share('minicart', $cartdetail);
        }
        return $next($request);
    }
}
