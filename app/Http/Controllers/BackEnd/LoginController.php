<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function getLogin() {
        return view('backend.login.login');
    }
    function postLogin(LoginRequest $r) {
        $email=$r->email;
        $password=$r->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            session()->put('Email',$email);
            return redirect('/admin/');
        }else{
            return redirect()->back()->withInput()->withErrors(['email'=>'Email hoặc mật khẩu không chính xác']);
        };
    }
    function getlogout(){
        Auth::logout();
        session()->forget('Email');
        return redirect('login' );
    }
}
