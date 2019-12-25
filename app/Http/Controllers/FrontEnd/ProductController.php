<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getProntEndProduct() {
        echo 'product';
    }
    function getFrontEndDetail() {
        echo 'detail';
    }
}
