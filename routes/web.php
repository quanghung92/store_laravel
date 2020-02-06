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
    Route::get('edit/{idCate}','backend\categoryController@getEditCategory' );

    Route::post('','backend\categoryController@postCategory' );
    // edit category
    Route::post('edit/{idCate}','backend\categoryController@postEditCategory' );
    Route::get('del/{idCate}','backend\categoryController@delCategory' );
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
    Route::get('edit/{idUser}', 'backend\UserController@getUserEdit');
    Route::post('add', 'backend\UserController@postAddUser');
    Route::post('edit/{idUser}','backend\UserController@postUserEdit');
    Route::get('del/{idUser}', 'backend\UserController@delUser');
    });


});

//-------------------------------Lý thuyết-----------------------

// SCHEMA
// Route::group(['prefix' => 'schema'], function () {
//     //------ tạo bảo----------------
//     //- Dùng lệnh ROUTE group
//     // - dùng lệnh ROUTE Get
//     // - Dùng lệnh schema : crate-table
//     Route::get('create-table', function () {
//         Schema::create('users', function ($table) { // 'users' là tên bảng
//             $table->bigIncrements('id'); // tạo cột có tên id  kiểu dữ liệu bigint , tự tăng, là khóa chính, unsigned( không tính giá trị âm)
//             $table->string('name')->nullable(); // tạo trường dữ liệu dạng varchar, 255 ký tự , nullable là cho phép null (để thêm cột string ta dùng lện colstr)
//             $table->integer('phone')->unsigned()->nullable(); // dạng số int, không dấu và cho phpe1 null
//             $table->string('address', 100)->nullable(); // dạng dữ liệu varchar, 100 ký tự, cho phép null
//             $table->boolean('level')->nullable()->default(1);// dang boolen cho phép null và mặc định là 1
//             $table->timestamps(); // tự động tạo 2 trường thời gian created_at, updated_at
//         });

//         Schema::create('post', function ( $table) {
//             $table->bigIncrements('id');
//             $table->bigInteger('user_id')->unsigned(); // unsigned có ý nghỉa là phải
//             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // references('id')->on('users') liên kết tới của bảng users
//         });
//     });
//     // bảng chứa khóa phụ


//     // xóa bảng
// Route::get('del-table', function () {
//     Schema::dropIfExists('users');
// });

// // Sửa tên bảng
// Route::get('rename-table', function () {
// Schema::rename('users', 'thanhvien');
// });

// // tương tác với cột
// // thêm cột
// Route::get('add-col', function () {
//     Schema::table('users', function ( $table) {
//     $table->integer('id-number')->unsigned()->nullable()->after('address');// after thêm cột sau cột address
//     });
//     });

// // sửa xóa cột
// // sử dụng thư viện docttrine/dbal :composer require doctrine/dbal
// Route::get('edit-col', function () {
// // Sửa tên cột
// Schema::table('users', function  ($table) {
//     $table->renameColumn('name', 'full');
// });
// // xóa cột
// Schema::table('users', function ( $table) {
//     $table->dropColumn('id-number');
// });
// });
// });


//-------------------------Query Builder------------------------------
// tương tác với dữ liệu trong database
// Để tương tác với database ta dùng DB::

Route::group(['prefix' => 'query'], function () {
    //---------Thêm bản ghi mới-------------------
    Route::get('insert', function () {
        // thêm 1 bản ghi
        DB::table('users')->insert([
            'email'=>'A@gmail.com',
            'password'=>'123',
            'full'=>'Nguyễn Văn A',
            'phone'=>'0906048552',
            'address'=>'Hà Nội',
            'level'=>'1'
        ]);
        /// Thêm nhiều bản ghi
        DB::table('users')->insert([
            //Bản 1
            ['email'=>'B@gmail.com','password'=>'123','full'=>'Nguyễn Văn B','phone'=>'0906044452','address'=>'Hà Nội','level'=>'1'],
            //Bản 2
            ['email'=>'C@gmail.com','password'=>'123','full'=>'Nguyễn Văn C','phone'=>'0906048449','address'=>'Vĩnh Phúc','level'=>'1'],
            //bản 3
            ['email'=>'D@gmail.com','password'=>'123','full'=>'Nguyễn Văn D','phone'=>'0906048589','address'=>'Bình Dương','level'=>'1']
        ]);
    });
    //------------Sửa bản ghi--------------------
    Route::get('update', function () {
        // Tìm bản ghi theo diều kiện
        // DB::table('users')->where('address','Hà Nội')->update([
        //     'password'=>'123456',
        // ]);
        // //Tìm bản ghi theo nhiều điều kiện thì dùng WHERE
        // DB::table('users')->where('address','Hà Nội')->where('level','1')->update([
        //     'password'=>'123456',
        //     'address'=>'Bắc Ninh'
        // ]);
        // Sửa hoặc thêm bản ghi mới: updateOrInsert([Điều Kiện],[Thay Đổi])
        // Nếu tồn tại bản ghi đúng với điều kiện thì thực hiện update còn không có thì insert bản ghi mới

        DB::table('users')->updateOrInsert(['address'=>'Hà Nội'],['phone'=>'9874563215','address'=>'Bắc Giang']);
    });
    //------------ Xóa bản ghi-------------------
    Route::get('del', function () {
        // Xóa 1 bản ghi
        // DB::table('users')->where('id','6')->delete();
        // Xóa tất cả bản ghi
        DB::table('users')->delete();
    });


    // Nâng cao

    // Lấy dữ liệu trong database
    //Sử dụng các phương thức: get(): lấy tất cả các dữ liệu,first(): lấy dữ liệu đầu,find(): tìm dữ liệu

    Route::get('get', function () {
        // lấy tất cả dữ liệu theo điều kiện trả về dạng mảng
        // $user= DB::table('users')->where('level',0)->get();
        // dd($user->all());

        // lấy bản ghi dầu tiên theo điều kiện
        // $user= DB::table('users')->where('level',0)->first();
        // dd($user);
        // lấy 1 bản ghi theo id mặc định tìm theo ID
    $user=DB::table('users')->find(27);
    dd($user);

    });

    // Điều kiện where
    Route::get('where', function () {
        // WHERE: gồm 3 tham số  trường cần tìm, toán tử so sánh, giá trị cần tìm
        //  $user= DB::table('users')->where('level','<>',0)->get();
        //  dd($user)->all();
         // where and : điều kiện và
        //  $user= DB::table('users')->where('level','<>',0)->where('full','vietpro')->get();
        //  dd($user)->all();

         //where or
        //  $user= DB::table('users')->where('id','<',28)->orwhere('id','>',29)->get();
        //  dd($user);
         // whereBetween
        //  $user =DB::table('users')->whereBetween('id',[27,29])->get();
        //  dd($user);
         // lấy 1 số lượng bản ghi nhất định

    });
    Route::get('take', function () {
        // $user=DB::table('users')->take(3)->get();
        // dd($user);
        //orderBy()
        // $user=DB::table('users')->orderBy('id','desc')->take(3)->get();
        // dd($user);
        //Skip
        $user=DB::table('users')->skip(1)->take(2)->get();
        dd($user);
     });
});
///--------------Đệ Quy ( hàm gọi lại chính nó) test trên php test--------------------///
// $array=[
//     ['id'=>1,'name'=>'Nam','slug'=>'nam','parent'=>0],
//     ['id'=>2,'name'=>'Áo Nam','slug'=>'ao-nam','parent'=>1],
//     ['id'=>3,'name'=>'Quần Nam','slug'=>'quan-nam','parent'=>1],
//     ['id'=>5,'name'=>'Nữ','slug'=>'nu','parent'=>0],
//     ['id'=>6,'name'=>'Áo Nữ','slug'=>'ao-nu','parent'=>5],
//     ['id'=>7,'name'=>'Quần Nữ','slug'=>'quan-nu','parent'=>5]

// ];
// function Showcate($arr,$parent,$tab){
//     foreach($arr as $row){
//         if($row['parent']==$parent){
//             echo '<option>'.$tab.$row['name'].'</option>';
//             Showcate($arr,$row['id'],$tab.'--|');

//         }
//     }
//     }
//     showcate($arr,0,"");

//-----------------------Relationship(Quan hệ giữa các bảng)------------------------------
//-- Bảng chính là bảng chứa khóa chính, bảng phụ là bảng chứa khóa ngoại
//-- Liên kết bắt đầu từ bảng nào thì viết trong model của bảng đó
//-- Liên kết từ bảng chính -> phụ là liên kết xuôi ngược lại là liên kết ngược.
//-- Liên lết 1-1 Xuôi: return $this->hasOne(model liên kết đến, khóa phụ, Khóa chính);
Route::get('lk-1-1-x', function () {
    $user = App\User::find(1);
    $info = $user->info()->first();

});

// liên kết phụ : return $this->belongsTo('model liên kết tới', 'Khóa ngoại', 'khóa bảng phụ');
Route::get('lk-1-1-n', function () {
    $info = App\models\info::find(2);
    $user = $info->User()->first();
});

// Liên kết 1 nhiều sử dụng: return $this->hasMany('Model liên kết', 'Khóa ngoại', 'Khóa chính');
Route::get('lk-1-n', function () {
        $cate = App\modes\category::find(2);
        $prd = $cate->product()->get();
        dd($prd->toarray());
});
// CHiều ngược chính là liên kết 1-1 ngược
Route::get('lk-1-1', function () {
    $prd = App\models\product::find(6);
    $cate= $prd->category()->first(); // category là tên funtion trong model product
    dd($cate->toarray());
});
// Liên kết nhiều nhiều Từ bảng 1 -> bảng 2
//--return $this->belongsToMany('Model liên kết tới', 'bảng chung gian (bảng pivot)', 'Khóa ngoại 1', 'Khóa ngoại 2');
