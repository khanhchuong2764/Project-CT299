<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryArticle;

class CategoryArticleController extends Controller
{

    public function index(Request $request) {
        $find = [
            'delete' => false
        ];
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
        $productsQuery = CategoryArticle::where($find);
        
        // Search
        $keyword = $request->input('keyword');
        if ($keyword) {
            $productsQuery->where('title', 'regexp', $keyword);
        }
        $ObjectPagination = [
            'currentPage' => 1,
            'limitItemt' => 3
        ];
        $count = $productsQuery->count();
        $ObjectPagination['totalPage'] = ceil($count / ($ObjectPagination['limitItemt']) );
        $ObjectPagination['currentPage'] =  $request->input('page');    
        $ObjectPagination['skip'] = (($ObjectPagination['currentPage'] - 1 ) * ($ObjectPagination['limitItemt']));
        $record = $productsQuery->skip($ObjectPagination['skip'])->take($ObjectPagination['limitItemt'])->orderBy('posittion', 'desc')->get()  ;
        return view('admin/pages/categoryArticle/index',[
            'titlePage' => 'Danh Mục Sản Phẩm',
            'record' => $record,
            'keyword' => $keyword,
            'FillterStatus' => $FillterStatus,
            'objectPagi' => $ObjectPagination
        ]);
    }
    public function create() {
        $find = [
            'delete' => false
        ];
        $record = CategoryArticle::where($find)->get(); 
        return view('admin/pages/categoryArticle/create',[
            'titlePage' => 'Thêm Danh Mục Bài Viết',
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
            $posittion =CategoryArticle::where($find)->count() + 1;   
        }
        $request['posittion'] = $posittion;
        CategoryArticle::create($request->all());
        session()->flash('success', 'Thêm Danh Mục Thành Công');
        return redirect("/admin/category-article");
    }

    public function ChangeStatus(Request $request,string $id,string $status) {   
        CategoryArticle::find($id)->update(['status' => $status]);
        session()->flash('success', 'Cập nhật Trạng Thái thành công');
        return redirect()->back();
    }

    public function Delete(Request $request,string $id) {
        CategoryArticle::find($id)->update(['delete' => true,'DeleteAt' => date('Y-m-d H:i:s')]);
        session()->flash('success', 'Đã Xóa Thành Công Sản Phẩm');
        return redirect()->back();
    }

    public function edit(Request $request,string $id) {   
        $record = CategoryArticle::find($id);
        $recordcategory = CategoryArticle::where('delete', false)
                                     ->where('id', '!=', $record->id)
                                     ->get();
        return view('admin.pages.category.edit',[
            'titlePage' => 'Chỉnh Sửa Sản Phẩm',
            'record' => $record, 
            'recordcategory' => $recordcategory
        ]);
    }
}
