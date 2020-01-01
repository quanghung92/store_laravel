<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUser() {
        return view('backend.user.listuser');
    }
    function getUserAdd() {
        return view('backend.user.adduser');
    }
    function getUserEdit() {
        return view('backend.user.edituser');
    }

    function postUserAdd(Request $r) {

    }
    function postUserEdit(Request $r) {

    }

}
