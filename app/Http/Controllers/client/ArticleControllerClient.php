<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articel;

use App\Models\CategoryArticle;

class ArticleControllerClient extends Controller
{
    public function index(Request $request) {  
        $find = [
            'delete' => false,
            'status' => 'active'
        ];
        $categoryArticle = CategoryArticle::where($find)->get();
       
        $record = Articel::where($find)->get(); 
        return view('client/pages/article/index',[
            'titlePage' => 'Bài Viết',
            'record' => $record,
            'categoryArticle' => $categoryArticle
        ]);
    } 

    public function categorydetail(Request $request,string $id) {  
        $find = [
            'delete' => false,
            'status' => 'active',
            'categoryarticle_id' => $id
        ];
        $record = Articel::where($find)->get(); 
        return view('client/pages/article/categoryArticle',[
            'titlePage' => 'Bài Viết',
            'record' => $record,
        ]);
    } 



    public function CategoryMenu(Request $request,string $id) {
        $categoryproduct=CategoryArticle::find($id);
        $categories = CategoryArticle::getCategoryIdsWithSubcategories($id);
        $products = Articel::whereIn('categoryarticle_id', $categories)
        ->where('delete', false) 
        ->where('status', 'active') 
        ->get();
        return view('client/pages/article/index', [
            'titlePage' => $categoryproduct->title,
            'record' => $products
        ]);
        
    }



    public function detail(Request $request,string $id) {   
        $record = Articel::find($id);
        return view('client/pages/article/detail',[
            'titlePage' => 'Chi Tiết Bài Viết',
            'record' => $record
        ]);
    }
}
