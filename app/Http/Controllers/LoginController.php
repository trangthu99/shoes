<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class LoginController extends Controller
{
    protected $title = 'Đăng nhập';

    public function getLogin()
    {
      $this->data['title'] = $this->title;
      return view('login',$this->data);
    }

    public function logout()
    {
        session()->forget('user');
        session()->forget("cart");
        return redirect('/');
    }

    public function postLogin(Request $request)
    {
        $username=$request->username;
        $password=md5($request->password);
        $result=User::where('username',$username)->where('password',$password)->first();
        if ($result==null) {
            $alert='Sai tên đăng nhập hoặc mật khẩu!';
            return redirect()->back()->with('alert',$alert);
        }else{
            session(['user'=>$username]);
            return redirect('/');
        }
    }

    public function user()
    {
        $users = User::where('username',session('user'))->get();
        return view('user', compact('users'));

    }
    public function updateinfo(Request $request){

        User::where('username',session('user'))->update([
            // 'username'=>$request->username,
            'password'=>md5($request->password),
            'fullname'=>$request->fullname,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'address'=>$request->address
        ]);
        return redirect()->back();      
    }
}
