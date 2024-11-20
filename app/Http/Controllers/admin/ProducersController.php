<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producer;

class ProducersController extends Controller
{

    public function index(Request $request) {
        $productsQuery = Producer::query();
        $keyword = $request->input('keyword');
        if ($keyword) {
            $productsQuery->where('name', 'regexp', $keyword);
        }

        $record = $productsQuery->get();

        return view('admin/pages/producers/index',[
            'titlePage' => 'Danh Sách Nhà Sản Xuất',
            'record' => $record,
            'keyword' => $keyword,
        ]);
    }


    public function create() {
        return view('admin/pages/producers/create',[
            'titlePage' => 'Thêm Mới Nhà Sản Xuất'
        ]);
    }

    public function createPost(Request $request) {   
        producer::create($request->all());
        session()->flash('success', 'Thêm Nhà Sản Xuất Thành Công');
        return redirect('/admin/producers');
    }

    public function edit(Request $request,string $id) {   
        $record = producer::find($id);
        return view('admin.pages.producers.edit',[
            'titlePage' => 'Chỉnh Sửa Nhà Sản Xuất',
            'record' => $record
        ]); 
    }

    public function editPatch(Request $request ,string $id) {   
        producer::find($id)->update($request->all());
        session()->flash('success', 'Đã Cập Nhật Nhà Sản Xuất Thành Công');
        return redirect()->back();
    }

    public function Delete(Request $request,string $id) {
        producer::find($id)->delete();
        session()->flash('success', 'Đã Xóa Nhà Sản Xuất Thành Công');
        return redirect()->back();
    }
}
