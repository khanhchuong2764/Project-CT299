<?php

namespace App\Http\Middleware\Client;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\CategoryProduct;
use App\Models\CategoryArticle;

class CategoryMiddelWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $find = [
            'delete' => false,
            'status' => 'active'
        ];
        $category = CategoryProduct::where($find)->get();
        $categoryArticle = CategoryArticle::where($find)->get();
        view()->share('category', $category);
        view()->share('categoryArticle', $categoryArticle);
        return $next($request);
    }
}
