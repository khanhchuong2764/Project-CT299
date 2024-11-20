<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class AuthControllerClient extends Controller
{
    public function login(Request $request) {  
        return view('client/pages/auth/login',[
            'titlePage' => 'Trang Đăng Nhập',
        ]);
            
    }

    public function register(Request $request) {  
        return view('client/pages/auth/register',[
            'titlePage' => 'Trang Đăng Ký',
        ]);
            
    }

    public function registerPost(Request $request) {    
        $find = [
            'delete' => false,
            'email' => $request->input('email')
        ];
        $EmailExist = User::where($find)->exists();
        if ($EmailExist) {
            session()->flash('error', "Email " .  $request->input('email') .  " Đã Tồn Tại");
            return redirect()->back();
        }else {
            $request['password']= md5($request->input('password'));
            $usersss=User::create($request->all());
            $user=User::find($usersss->id);
            session()->flash('success', 'Tạo Tài Khoản Thành Công');
            Cookie::queue('tokenUser',$user->tokenUser);
            return redirect("/");
        }
            
    }

    public function loginPost(Request $request) {  
        $find = [
            'delete' => false,
            'email' => $request->input('email')
        ];
        $EmailExist = User::where($find)->exists();
        $user = User::where($find)->first();
        if (!$EmailExist) {
            session()->flash('error', "Email Không Tồn Tại Tồn Tại");
            return redirect()->back();
            return;
        }
        if ($user->password != md5($request->input('password'))) {
            session()->flash('error', "Mật Khẩu Không Đúng Vui Lòng Nhập Lại");
            return redirect()->back();
            return;
        }

        if ($user->status != 'active') {
            session()->flash('error', "Tài Khoản Đã Bị Khóa");
            return redirect()->back();
            return; 
        }
        $find = [
            'user_id' => $user->id, 
        ];
        $cartDetail123 = Cart::where($find)->first();
        if($cartDetail123) {
            Cookie::queue('CartId', $cartDetail123->id);
        }else {
            $cartId = Cookie::get('CartId');
            $cartdetail = Cart::find($cartId);
            $cartdetail->update(['user_id' => $user->id]);
        }
        Cookie::queue('tokenUser',$user->tokenUser);
        return redirect('/');
            
    }

    public function logout(Request $request) { 
        Cookie::queue(Cookie::forget('tokenUser'));
        Cookie::queue(Cookie::forget('CartId'));
        return redirect('/');
    }

    public function forgotPassword(Request $request) {  
        return view('client/pages/auth/forgotpassword',[
            'titlePage' => 'Lấy lại mật khẩu',
        ]);
            
    }

    public function forgotPasswordPost(Request $request) {  
        $find = [
            'delete' => false,
            'email' => $request->input('email')
        ];
        $EmailExist = User::where($find)->exists();
        $user = User::where($find)->first();
        if (!$EmailExist) {
            session()->flash('error', "Email Không Tồn Tại Tồn Tại");
            return redirect()->back();
            return;
        }
            
    }

    public function infor(Request $request) {  
        return view('client/pages/user/infor',[
            'titlePage' => 'Thông tin tài khoản',
        ]);
            
    }
    public function editPatch(Request $request ,string $id) {   
        $find = [
            'delete' => false,
            'email' => $request->input('email')
        ];
        $EmailExist = User::where($find)->where('id', '<>', $id)->exists();
        if ($EmailExist) {
            session()->flash('error', "Email " .  $request->input('email') .  " Đã Tồn Tại");
        }else {
            if ($request->input('password') ) {
                $request['password']= md5($request->input('password'));
            }else {
                $request->request->remove('password');
            }
            if ($request->file('file')) {
                $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
                $request['avatar']= $uploadedFileUrl;
            }
            User::find($id)->update($request->all());
            session()->flash('success', 'Tài Khoản Đã Cập Nhật Thành Công');
        }
        return redirect()->back();
    }

}
