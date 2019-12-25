<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getProduct() {
        echo 'product';
    }
    function getProductAdd() {
        echo 'Add product';
    }
    function getProductEdit() {
        echo 'Edit product';
    }
}
