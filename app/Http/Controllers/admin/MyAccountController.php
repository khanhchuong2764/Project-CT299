<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class MyAccountController extends Controller
{
    public function index(Request $request,string $id) {   
        $record = Account::find($id);
        return view('admin.pages.myaccount.index',[
            'titlePage' => 'Thông Tin Cá Nhân',
            'record' => $record
        ]);
    }

    public function edit(Request $request,string $id) { 
        $find = [
            'delete' => false,
            'id' => $id
        ];
        try {
            $record = Account::where($find)->first();
            return view('admin.pages.myaccount.edit',[
                'titlePage' => 'Chỉnh Sửa Thông Tin Cá Nhân',
                'record' => $record
            ]);
        } catch (\Throwable $th) {
            return redirect("/admin/account");
        }
    }
    
    public function editPatch(Request $request ,string $id) {   
        $find = [
            'delete' => false,
            'email' => $request->input('email')
        ];
        $EmailExist = Account::where($find)->where('id', '<>', $id)->exists();
        if ($EmailExist) {
            session()->flash('error', "Email " .  $request->input('email') .  " Đã Tồn Tại");
        }else {
            if ($request->input('password')) {
                $request['password']= md5($request->input('password'));
            }else {
                $request->request->remove('password');
            }
            if ($request->file('file')) {
                $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
                $request['avatar']= $uploadedFileUrl;
            }
            Account::find($id)->update($request->all());
            session()->flash('success', 'Tài Khoản Đã Được Cập Nhật Thành Công');
        }
        return redirect()->back();
    }

}
