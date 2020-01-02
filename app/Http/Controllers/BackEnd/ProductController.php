<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getProduct() {
        return view('backend.product.listproduct');
    }
    function getProductAdd() {
        return view('backend.product.addproduct');
    }
    function getProductEdit() {
        return view('backend.product.editproduct');
    }
    function postProductAdd(AddProductRequest $r) {
        dd($r->all());
    }
    function postProductEdit(EditProductRequest $r) {

    }
}
