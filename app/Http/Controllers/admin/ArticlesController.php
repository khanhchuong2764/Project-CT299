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

    public function ChangeStatus(Request $request,string $id,string $status) {   
        Articel::find($id)->update(['status' => $status]);
        session()->flash('success', 'Cập nhật Trạng Thái thành công');
        return redirect()->back();
    }


    public function edit(Request $request,string $id) { 
        $recordcategory = CategoryArticle::where('delete', false)->get(); 
        $record = Articel::find($id);
        return view('admin.pages.articles.edit',[
            'titlePage' => 'Chỉnh Sửa Sản Phẩm',
            'record' => $record,
            'recordcategory' => $recordcategory
        ]);
    }

    public function Delete(Request $request,string $id) {
        // dd("helo");   
        Articel::find($id)->update(['delete' => true,'DeleteAt' => date('Y-m-d H:i:s')]);
        session()->flash('success', 'Đã Xóa Thành Công Bài Viết');
        return redirect()->back();  
    }

    public function changeMulti(Request $request) { 
        $ids = explode(',',$request->input('ids'));
        $type = $request->input('type');
        switch ($type) {
            case 'active':
                Articel::whereIn('id', $ids)->update(['status' => 'active']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " bài viết thành công");
                break;
            case 'inactive':
                Articel::whereIn('id', $ids)->update(['status' => 'inactive']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " bài viết thành công");
                break;
            case 'delete':
                Articel::whereIn('id', $ids)->update(['delete' => true,'DeleteAt' => date('Y-m-d H:i:s')]);
                session()->flash('success', "Đã Xóa Thành Công " . count($ids) .  " Bài Viết");
                break;
            case 'posittion':
                foreach ($ids as $key => $value) {
                    [$id,$posittion] = explode('/',$value); 
                    $posittion = (int)$posittion;
                    Articel::find($id)->update(['posittion' => $posittion]);
                    session()->flash('success', 'Đã cập nhật vị trí ' . count($ids) . " bài viết thành công" );
                }
                break;
        }
        return redirect()->back();
    }


    public function editPatch(Request $request ,string $id) {   
        if ($request->file('file')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
            $request['thumbnail']= $uploadedFileUrl;
        }
        $posittion = $request->input('posittion');
        $find = [
            'delete' => false,
        ];
        if ($posittion) {
            $posittion = (int)$posittion;
        }else {
            $posittion =Articel::where($find)->count() + 1;   
        }   
        $request['posittion'] = $posittion;
        Articel::find($id)->update($request->all());
        session()->flash('success', 'Đã Cập Nhật Thành Công Danh Mục');
        return redirect()->back();
    }
    
    public function detail(Request $request,string $id) {   
        $record = Articel::find($id);
        return view('admin.pages.articles.detail',[
            'titlePage' => 'Chi Tiết Bài Báo',
            'record' => $record
        ]);
    }
}
