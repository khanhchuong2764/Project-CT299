<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
class AccountController extends Controller
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
        $productsQuery = Account::where($find);
        
        // Search
        $keyword = $request->input('keyword');
        if ($keyword) {
            $productsQuery->where('fullname', 'regexp', $keyword);
        }
        $ObjectPagination = [
            'currentPage' => 1,
            'limitItemt' => 3
        ];
        $count = $productsQuery->count();
        $ObjectPagination['totalPage'] = ceil($count / ($ObjectPagination['limitItemt']) );
        $ObjectPagination['currentPage'] =  $request->input('page');    
        $ObjectPagination['skip'] = (($ObjectPagination['currentPage'] - 1 ) * ($ObjectPagination['limitItemt']));
        $record = $productsQuery->skip($ObjectPagination['skip'])->take($ObjectPagination['limitItemt'])->select('id','email','tokenacc','fullname','phone','avatar','status','delete')->get();
        return view('admin/pages/account/index',[
            'titlePage' => 'Danh Sách Tài Khoản',
            'record' => $record,
            'keyword' => $keyword,
            'FillterStatus' => $FillterStatus,
            'objectPagi' => $ObjectPagination
        ]);
        // $record = Account::where($find)->select('id','email','tokenacc','fullname','phone','avatar','status','delete')->get();
    }
    public function ChangeStatus(Request $request,string $id,string $status) {   
        Account::find($id)->update(['status' => $status]);
        session()->flash('success', 'Cập nhật Trạng Thái thành công');
        return redirect()->back();
    }
    public function create(Request $request) {  
        return view('admin/pages/account/create',[
            'titlePage' => 'Thêm Tài Khoản'
        ]);
    }

    public function createPost(Request $request) {  
        $find = [
            'delete' => false,
            'email' => $request->input('email')
        ];
        $EmailExist = Account::where($find)->exists();
        if ($EmailExist) {
            session()->flash('error', "Email " .  $request->input('email') .  " Đã Tồn Tại");
            return redirect()->back();
        }else {
            if ($request->file('file')) {
                $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
                $request['avatar']= $uploadedFileUrl;
            }
            $request['password']= md5($request->input('password'));
            Account::create($request->all());
            session()->flash('success', 'Tạo Tài Khoản Thành Công');
            return redirect("/admin/account ");
        }
    }

    public function Delete(Request $request,string $id) {
        Account::find($id)->update(
            [
                'delete' => true
            ]
        );
        session()->flash('success', 'Đã Xóa Tài Khoản Thành Công');
        return redirect()->back();
    }   


    public function edit(Request $request,string $id) { 
        $find = [
            'delete' => false,
            'id' => $id
        ];
        try {
            $record = Account::where($find)->first();
            return view('admin.pages.account.edit',[
                'titlePage' => 'Chỉnh Sửa Tài Khoản',
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
            session()->flash('success', 'Tài Khoản Đã Cập Nhật Thành Công');
        }
        return redirect()->back();
    }

    public function detail(Request $request,string $id) {   
        $record = Account::find($id);
        return view('admin.pages.account.detail',[
            'titlePage' => 'Chi Tiết Tài Khoản',
            'record' => $record
        ]);
    }


    public function changeMulti(Request $request) { 
        $ids = explode(',',$request->input('ids'));
        $type = $request->input('type');
        switch ($type) {
            case 'active':
                Account::whereIn('id', $ids)->update(['status' => 'active']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " tài khoản thành công");
                break;
            case 'inactive':
                Account::whereIn('id', $ids)->update(['status' => 'inactive']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " tài khoản thành công");
                break;
            case 'delete':
                Account::whereIn('id', $ids)->update(
                    [
                        'delete' => true
                    ]
                );
                session()->flash('success', "Đã Xóa Thành Công " . count($ids) .  " Tài Khoản");
                break;
        }
        return redirect()->back();
    }
}
