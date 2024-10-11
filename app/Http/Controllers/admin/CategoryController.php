<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Http\Requests\Admin\CategoryValidate;

class CategoryController extends Controller
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
        $productsQuery = CategoryProduct::where($find);
        
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
        return view('admin/pages/category/index',[
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
        $record = CategoryProduct::where($find)->get();
        return view('admin/pages/category/create',[
            'titlePage' => 'Thêm Mới Danh Mục',
            'record' => $record
        ]);
    }

    public function createPost(CategoryValidate $request) {   
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
            $posittion =CategoryProduct::where($find)->count() + 1;   
        }
        $request['posittion'] = $posittion;
        CategoryProduct::create($request->all());
        session()->flash('success', 'Thêm Danh Mục Thành Công');
        return redirect("/admin/category");
    }

    public function ChangeStatus(Request $request,string $id,string $status) {   
        CategoryProduct::find($id)->update(['status' => $status]);
        session()->flash('success', 'Cập nhật Trạng Thái thành công');
        return redirect()->back();
    }

    public function Delete(Request $request,string $id) {
        // dd("helo");   
        CategoryProduct::find($id)->update(['delete' => true,'DeleteAt' => date('Y-m-d H:i:s')]);
        session()->flash('success', 'Đã Xóa Thành Công Sản Phẩm');
        return redirect()->back();
    }

    public function edit(Request $request,string $id) {   
        $record = CategoryProduct::find($id);
        $recordcategory = CategoryProduct::where('delete', false)
                                     ->where('id', '!=', $record->id)
                                     ->get();
        return view('admin.pages.category.edit',[
            'titlePage' => 'Chỉnh Sửa Sản Phẩm',
            'record' => $record, 
            'recordcategory' => $recordcategory
        ]);
    }

    public function editPatch(CategoryValidate $request ,string $id) {   
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
            $posittion =CategoryProduct::where($find)->count() + 1;   
        }   
        $request['posittion'] = $posittion;
        CategoryProduct::find($id)->update($request->all());
        session()->flash('success', 'Đã Cập Nhật Thành Công Sản Phẩm');
        return redirect()->back();
    }

    public function detail(Request $request,string $id) {   
        $record = CategoryProduct::find($id);
        return view('admin.pages.category.detail',[
            'titlePage' => 'Chi Tiết Sản Phẩm',
            'record' => $record
        ]);
    }

    public function changeMulti(Request $request) { 
        $ids = explode(',',$request->input('ids'));
        $type = $request->input('type');
        switch ($type) {
            case 'active':
                CategoryProduct::whereIn('id', $ids)->update(['status' => 'active']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " sản phẩm thành công");
                break;
            case 'inactive':
                CategoryProduct::whereIn('id', $ids)->update(['status' => 'inactive']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " sản phẩm thành công");
                break;
            case 'delete':
                CategoryProduct::whereIn('id', $ids)->update(['delete' => true,'DeleteAt' => date('Y-m-d H:i:s')]);
                session()->flash('success', "Đã Xóa Thành Công " . count($ids) .  " Sản Phẩm");
                break;
            case 'posittion':
                foreach ($ids as $key => $value) {
                    [$id,$posittion] = explode('/',$value); 
                    $posittion = (int)$posittion;
                    CategoryProduct::find($id)->update(['posittion' => $posittion]);
                    session()->flash('success', 'Cập nhật Trạng Thái thành công');
                }
                break;
        }
        return redirect()->back();
    }
    
}
