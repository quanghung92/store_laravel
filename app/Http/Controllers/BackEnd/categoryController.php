<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modes\category;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    function getCategory() {
        $data['categorys']=category::all();
       return view('backend.category.category',$data);
    }
    function getEditCategory($idCate) {
        $data['categories']=category::all();
        $data['cate']=category::find($idCate);
        return view('backend.category.editcategory',$data);
    }

    function postCategory( AddCategoryRequest $r){
        $cate= new category;
        $cate->name=$r->name;
        $cate->slug=Str::slug($r->name, '-');;
        $cate->parent=$r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã thêm danh mục thành công');

     }
     function postEditCategory(EditCategoryRequest $r) {

     }

     function delCategory( $idCate) {
        $cate=category::find($idCate);
        category::where ('parent',$cate->id)->update(['parent'=>$cate->parent]);
        $cate->delete();
        return redirect('/admin/category')->with('thongbao','đã xóa thành công');
    }
}
