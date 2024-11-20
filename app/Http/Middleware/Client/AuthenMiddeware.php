<?php

namespace App\Http\Middleware\Client;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
class AuthenMiddeware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     
        if (!Cookie::get('tokenUser')) {
        }else { 
            $find = [
                'tokenUser' => Cookie::get('tokenUser'),
                'delete' => false,
                'status' => 'active'
            ];
            $user = User::where($find)->first();
            if ($user) {
                view()->share('user', $user);
                return $next($request);
            }
        }
        return $next($request);
    }
}
