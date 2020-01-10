<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modes\category;

class categoryController extends Controller
{
    function getCategory() {
        $data['categorys']=category::all();
       return view('backend.category.category',$data);
    }
    function getEditCategory() {
        return view('backend.category.editcategory');
    }

    function postCategory( AddCategoryRequest $r){

     }
     function postEditCategory(EditCategoryRequest $r) {

     }
}
