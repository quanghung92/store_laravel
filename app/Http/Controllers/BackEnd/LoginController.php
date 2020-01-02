<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function getLogin() {
        return view('backend.login.login');
    }
    function postLogin(LoginRequest $r) {

    }
}
