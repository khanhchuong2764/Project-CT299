<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articel;
use App\Models\CategoryArticle;

class ArticlesController extends Controller
{
    public function index(Request $request) {
        $FillterStatus = [
            [
                'name' => 'Tất Cả',
                'status' => '',
                'class' => ''
            ],
            [
                'name' => 'Hoạt Động',
                'status' => 'active',
                'class' => ''
            ],
            [
                'name' => 'Dừng Hoạt Động',
                'status' => 'inactive',
                'class' => ''
            ]
        ];
        $find = [
            'delete' => false
        ];

        //FillterStatus
        
        $status = $request->input('status');
        if ($status) {
            foreach ($FillterStatus as $key => $value) {
                if($value['status'] == $status) {
                    $FillterStatus[$key]['class']='active';
                }
            }
            $find['status'] = $status;
        }else {
            $FillterStatus[0]['class']='active';
        }
        $productsQuery = Articel::where($find);
        
        // Search
        $keyword = $request->input('keyword');
        if ($keyword) {
            $productsQuery->where('title', 'regexp', $keyword);
        }
        $count = $productsQuery->count();
        $ObjectPagination = [
            'currentPage' => 1,
            'limitItemt' => 3
        ];
        $count = $productsQuery->count();
        $ObjectPagination['totalPage'] = ceil($count / ($ObjectPagination['limitItemt']) );
        $ObjectPagination['currentPage'] =  $request->input('page');    
        $ObjectPagination['skip'] = (($ObjectPagination['currentPage'] - 1 ) * ($ObjectPagination['limitItemt']));
        $products = $productsQuery->skip($ObjectPagination['skip'])->take($ObjectPagination['limitItemt'])->orderBy('posittion', 'desc')->get()  ;
        return view('admin/pages/articles/index',[
            'titlePage' => 'Danh Sách Bài Viết',
            'record' => $products,
            'keyword' => $keyword,
            'FillterStatus' => $FillterStatus,
            'objectPagi' => $ObjectPagination
        ]);
    }

    public function create(Request $request) {  
        $find = [
            'delete' => false
        ];
        $record = CategoryArticle::where($find)->get(); 
        return view('admin/pages/articles/create',[
            'titlePage' => 'Thêm Bài Viết',
            'record' => $record
        ]);
    }

    public function createPost(Request $request) {   
        if ($request->file('file')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
            $request['thumbnail']= $uploadedFileUrl;
        }
        $posittion = $request->input('posittion');
        $find = [
            'delete' => false
        ];
        if ($posittion) {
            $posittion = (int)$posittion;
        }else {
            $posittion =Articel::where($find)->count() + 1;   
        }
        $request['posittion'] = $posittion;
        Articel::create($request->all());
        session()->flash('success', 'Thêm Bài Viết Thành Công');
        return redirect("/admin/article");
    }
}
