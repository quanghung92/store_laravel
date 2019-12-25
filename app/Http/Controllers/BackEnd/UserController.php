<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUser() {
        echo 'User';
    }
    function getUserAdd() {
        echo 'Add User';
    }
    function getUserEdit() {
        echo 'Edit User';
    }
}
