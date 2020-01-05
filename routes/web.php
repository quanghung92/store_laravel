<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//............ fronEnd....................
//index
Route::get('','frontend\IndexController@getFornEndIndex');
//about
Route::get('about', 'frontend\IndexController@getFrontEndAbout');
//contact
Route::get('contact','frontend\IndexController@getFrontEndContact' );
//cart
 Route::group(['prefix' => 'cart'], function () {
    Route::get('', 'frontend\CartController@getCart');
 });

//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('', 'frontend\CheckOutController@getCheckOut');

    Route::post('', 'frontend\CheckOutController@postCheckOut');
    //conplete
    Route::get('complete', 'frontend\CheckOutController@getChekOutConplete');
});

// product
Route::group(['prefix' => 'product'], function () {
    Route::get('shop','frontend\ProductController@getProntEndProduct' );
    //detail
    Route::get('detail', 'frontend\ProductController@getFrontEndDetail');
});



//..............BackENd...............
//login
Route::get('login', 'backend\LoginController@getLogin');

Route::post('login', 'backend\LoginController@postLogin');
    //admin
Route::group(['prefix' => 'admin'], function () {
Route::get('', 'backend\IndexController@getIndex');

//category
Route::group(['prefix' => 'category'], function () {
    Route::get('','backend\categoryController@getCategory' );
    // edit category
    Route::get('edit','backend\categoryController@getEditCategory' );

    Route::post('','backend\categoryController@postCategory' );
    // edit category
    Route::post('edit','backend\categoryController@postEditCategory' );
});

//order
Route::group(['prefix' => 'order'], function () {
    Route::get('', 'backend\OrderController@GetOrder');
    // Detail Order
    Route::get('detail', 'backend\OrderController@getDetailOrder');
    //Oder process
    Route::get('process', 'backend\OrderController@getProcess');
});

//product
Route::group(['prefix' => 'product'], function () {
    Route::get('','backend\ProductController@getProduct' );
    //add product
    Route::get('add','backend\ProductController@getProductAdd');
    // Edit Product
    Route::get('edit', 'backend\ProductController@getProductEdit');

    Route::post('add','backend\ProductController@postProductAdd');
    // Edit Product
    Route::post('edit', 'backend\ProductController@postProductEdit');
});

//User
Route::group(['prefix' => 'user'], function () {
    Route::get('','backend\UserController@getUser' );
    //Add User
    Route::get('add','backend\UserController@getUserAdd' );
    // Edit User
    Route::get('edit', 'backend\UserController@getUserEdit');
    Route::post('add', 'backend\UserController@postAddUser');
    Route::post('edit','backend\UserController@postEditUser');
    });


});

//-------------------------------Lý thuyết-----------------------

// SCHEMA
Route::group(['prefix' => 'schema'], function () {
    //------ tạo bảo----------------
    //- Dùng lệnh ROUTE group
    // - dùng lệnh ROUTE Get
    // - Dùng lệnh schema : crate-table
    Route::get('create-table', function () {
        Schema::create('users', function ($table) { // 'users' là tên bảng
            $table->bigIncrements('id'); // tạo cột có tên id  kiểu dữ liệu bigint , tự tăng, là khóa chính, unsigned( không tính giá trị âm)
            $table->string('name')->nullable(); // tạo trường dữ liệu dạng varchar, 255 ký tự , nullable là cho phép null (để thêm cột string ta dùng lện colstr)
            $table->integer('phone')->unsigned()->nullable(); // dạng số int, không dấu và cho phpe1 null
            $table->string('address', 100)->nullable(); // dạng dữ liệu varchar, 100 ký tự, cho phép null
            $table->boolean('level')->nullable()->default(1);// dang boolen cho phép null và mặc định là 1
            $table->timestamps(); // tự động tạo 2 trường thời gian created_at, updated_at
        });

        Schema::create('post', function ( $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned(); // unsigned có ý nghỉa là phải
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // references('id')->on('users') liên kết tới của bảng users
        });
    });
    // bảng chứa khóa phụ


    // xóa bảng
Route::get('del-table', function () {
    Schema::dropIfExists('users');
});

// Sửa tên bảng
Route::get('rename-table', function () {
Schema::rename('users', 'thanhvien');
});

// tương tác với cột
// thêm cột
Route::get('add-col', function () {
    Schema::table('users', function ( $table) {
    $table->integer('id-number')->unsigned()->nullable()->after('address');// after thêm cột sau cột address
    });
    });

// sửa xóa cột
// sử dụng thư viện docttrine/dbal :composer require doctrine/dbal
Route::get('edit-col', function () {
// Sửa tên cột
Schema::table('users', function  ($table) {
    $table->renameColumn('name', 'full');
});
// xóa cột
Schema::table('users', function ( $table) {
    $table->dropColumn('id-number');
});
});















});



