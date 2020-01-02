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
    });

    Route::post('add','backend\UserController@postUserAdd');
    // Edit User
    Route::post('edit','backend\UserController@postUserEdit');
});


