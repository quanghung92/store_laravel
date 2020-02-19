<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\product ;
use App\modes\category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //---------------get list sản phẩm-----------------------
    function getProduct() {
        $data['products']=product::paginate(3);
        return view('backend.product.listproduct',$data);
    }

    //----------------get thêm sản phẩm--------------------

    function getProductAdd() {
        $data['categorys']=category::all();
        return view('backend.product.addproduct',$data);
    }

    //----------- get sửa sản phẩm---------------

    function getProductEdit($prd_id) {
        $data['categorys']=category::all();
        $data['products']= product::find($prd_id);
        return view('backend.product.editproduct',$data);

    }

    //-----------------------post thêm sản phẩm------------------

    function postProductAdd(AddProductRequest $r) {
        $prd = new product;
        $prd->code=$r->code;
        $prd->name=$r->name;
        $prd->slug=Str::slug($r->name,'-');
        $prd->price=$r->price;
        $prd->featured=$r->featured;
        $prd->state=$r->state;
        $prd->info=$r->info;
        $prd->describe=$r->describe;
        if ($r->hasFile('img')) {
            $file=$r->img;// lấy file ảnh
            $fileName=Str::slug($r->name,'-').'.'.$file->getClientOriginalExtension();// lấy tên Ảnh nnoi61 với đuôi ảnh
            $prd->img=$fileName;// lưu tên ảnh vào database
            $file->move('backend/img/',$fileName);// lưu vào public/backend/img
        } else {
           $prd->img='no-img.jpg';
        }

        $prd->category_id=$r->category;
        $prd->save();
        return redirect('../admin/product')->with('thongbao','Đã thêm sản phẩm thành công');
    }

    //--------------post sửa sản phẩm---------------------

    function postProductEdit(EditProductRequest $r ,$prd_id) {
        $prd= product::find($prd_id);
        $prd->code=$r->code;
        $prd->name=$r->name;
        $prd->slug=Str::slug($r->name,'-');
        $prd->price=$r->price;
        $prd->featured=$r->featured;
        $prd->state=$r->state;
        $prd->info=$r->info;
        $prd->describe=$r->describe;
        // if ($r->hasFile('img')) {
        //     $file=$r->img;// lấy file ảnh
        //     $fileName=Str::slug($r->name,'-').'.'.$file->getClientOriginalExtension();// lấy tên Ảnh nnoi61 với đuôi ảnh
        //     $prd->img=$fileName;// lưu tên ảnh vào database
        //     $file->move('backend/img/',$fileName);// lưu vào public/backend/img
        // }

            if($r->hasFile('img')){

                if($prd->img!='no-img.jpg'){
                    unlink('backend/img/'.$prd->img);
                }
                $file=$r->img;// lấy file ảnh
                $fileName=Str::slug($r->name,'-').'.'.$file->getClientOriginalExtension(); // lấy tên file ảnh và dường dẫn
                $prd->img=$fileName;
                $file->move('backend/img',$fileName);

            }else{
                if($r->name!=''){
                    $oldName=$prd->img;
                    $arr=explode(".",$oldName);// cất chuỗi thành phần trong 1 mảng
                    $newName=Str::slug($r->name,'-').'.'.array_pop($arr); // array_pop($arr) là lấy phần tử cuối cùng trong mảng
                    rename(public_path('backend/img/'.$oldName),public_path('backend/img/'.$newName));
                    $prd->img=$newName;
                }
            }
        $prd->category_id=$r->category;
        $prd->save();
        return redirect('../admin/product')->with('thongbao','Đã sửa sản phẩm thành công');
    }
    //---------------- Delete sản phẩm--------------------------
    function getProductDel($prd_id) {
        $del=product::find($prd_id);
        $del->delete();
        unlink('backend/img/'.$del->img);
        return redirect('../admin/product')->with('thongbao','Đã xóa sản phẩm');
    }

}
