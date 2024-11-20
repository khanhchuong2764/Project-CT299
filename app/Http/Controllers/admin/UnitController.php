<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\unit;

class UnitController extends Controller
{
    public function index(Request $request) {
        $productsQuery = unit::query();
        $keyword = $request->input('keyword');
        if ($keyword) {
            $productsQuery->where('title', 'regexp', $keyword);
        }
        $record = $productsQuery->get();
        return view('admin/pages/units/index',[
            'titlePage' => 'Danh Sách Đơn Vị',
            'record' => $record,
            'keyword' => $keyword,
        ]);
    }


    public function create() {
        return view('admin/pages/units/create',[
            'titlePage' => 'Thêm Mới Đơn Vị'
        ]);
    }

    public function createPost(Request $request) {   
        unit::create($request->all());
        session()->flash('success', 'Thêm Đơn Vị Thành Công');
        return redirect("/admin/unit");
    }

    public function edit(Request $request,string $id) {   
        $record = unit::find($id);
        return view('admin.pages.units.edit',[
            'titlePage' => 'Chỉnh Sửa Đơn Vị',
            'record' => $record
        ]); 
    }

    public function editPatch(Request $request ,string $id) {   
        
        unit::find($id)->update($request->all());
        session()->flash('success', 'Đã Cập Nhật Đơn Vị Thành Công');
        return redirect()->back();
    }

    public function Delete(Request $request,string $id) {
        unit::find($id)->delete();
        session()->flash('success', 'Đã Xóa Đơn Vị Thành Công');
        return redirect()->back();
    }   
}
