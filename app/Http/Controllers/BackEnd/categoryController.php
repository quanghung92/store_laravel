<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    function getCategory() {
        echo 'category';
    }
    function getEditCategory() {
        echo 'Edit/category';
    }
}
