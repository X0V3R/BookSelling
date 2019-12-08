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

Route::get('/', 'BookController@index','CategoryController@index')->name('home');
Auth::routes();
/**
 * Book router
 */
Route::get('create', 'BookController@create')->name('create');
// Route::get('/home', 'BookController@index')->name('home');
// Route::get('book/{id}',['uses' => 'BookController@ShowbyID']);
// Route::get('/home', 'BookController@showAll');
Route::post('edit', 'BookController@edit')->name('edit');
Route::post('store', 'BookController@store')->name('store');
Route::resource('book', 'BookController');
/**
 * Show category
 */


Auth::routes();
/**
 * Search book
 */
Route::get('/search', ['uses'=>'BookController@search'])->name('search');
// // Testing
// Route::get('test-case', function () {
//     return "Xin chao";
// });

// Route::get('hello', function () {
//     return view('hello',['name' => 'Phong']);

// });

// Route::get('test_view', function () {
//     return view('test_view');
// });
// Route::get('login', function () {
//     return view('auth.login');
// });
// Route::get('users/{id?}', function ($id = "Vô danh") {
//     return "Tên của bạn là $id";
// });
// Route::get('thongtin/{hoten}/{sodienthoai}', function ($hoten,$sododienthoai) {
//     return "Xin chao $hoten, co so dien thoai la: $sododienthoai";
// }) -> where(['hoten'=>'[a-zA-Z]+','sodienthoai'=>'[0-9]{10}']);
// Route::get('xinchao', 'HomeController@test_view');
// Route::get('view', function () {
//     $hoten = "Lê Thanh Phong";
//     $view1 = "View để test";
//     return view('new_view',compact('hoten','view1'));
// });
// //định danh
// Route::get('chuyenhuong', 'HomeController@test_action');
// Route::get('ho-chi-minh', ['as'=>'hcm', function (){
//     return "Chu tich Ho Chi Minh";
// }]);
//     //tạo nhóm route
//     Route::group(['prefix' => 'thucdon'], function () {
//         Route::get('bunbo', function () {
//             return "bun bo";
//         });
//         Route::get('bunmam', function () {
//             return "bun mam";
//         });
//         Route::get('bunmang', function () {
//             return "bun mang";
//         });
//     });
//     //Viewshare share tên biến cho tất cả các view khác
//     view()->share('title', "lập trình laravel");
// Route::get('laptrinh', function () {
//     return view('hienthi');
// });
//     //View::Composer share biến cho view được chỉ định
//     //kiểm tra view
//     Route::get('check-view', function () {
//     if (view()->exists('layout.sub.layout')) {
//         return 'tồn tại view';
//     }else {
//         return 'Không tồn tại view';
//     }
//     });
//     //Thao tác với blade template
//     Route::get('goi-master', function () {
//         return view('layouts.app');
//     });
// //create database
// Route::get('schema/create', function () {
//     Schema::create('books', function ($table) {
//         $table->Increments('id');
//         $table->string('name');
//         $table->integer('price');
//         $table->integer('cate_id') -> unsigned();
//         $table->foreign('cate_id')->references('id')->on('category');
//         $table->timestamps();
//     });
// });
// //Select database
// Route::get('query/select_all', function () {
//     $data = DB::table('books')->get();
//     echo "<pre>";
//     print_r($data);
//     echo "</pre>";
// });
// //order select
// Route::get('query/order', function () {
//     $data = DB::table('category')->select('name')->orderBy('id','DESC')->get();
//     echo "<pre>";
//     print_r($data);
//     echo "</pre>";
// });
// Route::get('model/all', function () {
//     $data = App\category::all()->toJson();
//     echo "<pre>";
//     print_r($data);
//     echo "</pre>";
// });
// Route::get('model/select_id', function () {
//     $data = App\books::find(1)->toArray();
//     echo "<pre>";
//     print_r($data);
//     echo "</pre>";
// });
// //authentication
// Route::get('authen/login', ['as' => 'getLogin' ,'uses' => 'AdminController@getLogin']);
// Route::post('authen/login', ['as' => 'postLogin' ,'uses' => 'AdminController@postLogin']);

// Route::get('authen/register', ['as' => 'getRegister' ,'uses' => 'RegisterController@getRegister']);
// Route::post('authen/register', ['as' => 'postRegister' ,'uses' => 'RegisterController@postRegister']);
// Route::get('test/testing', function () {
//     return view('home1');
// });

