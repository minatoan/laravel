<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use App\nhanvien;
use App\User;
// use App\tochuc;

class LoginController extends Controller
{
    //Hiện form login
    public function getLogin() {
        return view('admin.login');
    }
    //Đăng nhập
    public function postLogin(Request $request) {
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'username' =>'required|',
            'password' => 'required|'
        ];
        $messages = [
            'username.required' => 'Tài khoản là trường bắt buộc',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            // 'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $username = $request->input('username');
            $password = $request->input('password');
            if( Auth::attempt(['username' => $username, 'password' =>$password])) {
                // Kiểm tra đúng tài khoản và mật khẩu sẽ chuyển trang
            
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
            
            }
        }
        if(Auth::attempt(array('username' => $request->username,'password' => $request->password), false, true))
        {
            return redirect('admin/order');
        }
        else
        {
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng!');
            return redirect('login');
        }
    }

    public function getLogout(Request $req)
    {
        Auth::logout();
        return redirect('login');
    }
}
