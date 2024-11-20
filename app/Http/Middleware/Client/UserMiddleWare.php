<?php

namespace App\Http\Middleware\Client;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class UserMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Cookie::get('tokenUser')) {
            return redirect('/user/login');
        }else {
            $find = [
                'tokenUser' => Cookie::get('tokenUser')
            ];
            $user = User::where($find)->first();
            if (!$user) {
                return redirect('/user/login');
            }else {
                view()->share('user', $user);
                return $next($request);
            }
        }
    }
}
