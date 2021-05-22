<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

#관리자 화면 라우팅
Route::get('/admin', 'AdminController@admin');
Route::get('/admin2', 'AdminController@admin2');
Route::get('/admin3/{id}', 'AdminController@admin3');
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/event', 'AdminController@eventInsert');
Route::get('/admin/product', 'AdminController@productInsert');

Route::get('/admin/productSearch', 'AdminController@admin2Search');

#사용자 화면 라우팅
Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');
Route::get('/product/detail/{id}', 'IndexController@productDetail');
Route::get('/products', 'IndexController@products');
Route::get('/products/{category}', 'IndexController@products');
Route::get('/productsFillter/{fillter}', 'IndexController@products');

#장바구니 라우팅
Route::get('/cart', 'IndexController@cart')->middleware('admin.deny', 'auth');
Route::post('/cart/add', 'CartController@insert')->middleware('admin.deny', 'auth');
Route::post('/cart/delete/{id}', 'CartController@delete')->middleware('admin.deny', 'auth');
#배송지 관리 라우팅
Route::get('/address', 'IndexController@address')->middleware('admin.deny', 'auth');
Route::post('/address/insert', 'AddressController@insert')->middleware('admin.deny', 'auth');
Route::post('/address/update', 'AddressController@update')->middleware('admin.deny', 'auth');
Route::post('/address/delete', 'AddressController@delete')->middleware('admin.deny', 'auth');

#상품 등록, 수정, 삭제
Route::post('/product/update', 'ProductController@update');
Route::post('/product/insert', 'ProductController@insert');
Route::post('/product/delete', 'ProductController@delete');
Route::post('/product/softDelete', 'ProductController@softDelete');
Route::post('/product/restore', 'ProductController@restore');
#이벤트 등록, 수정, 삭제
Route::post('/event/update', 'eventController@update');
Route::post('/event/insert', 'eventController@insert');
Route::post('/event/delete', 'eventController@delete');
Route::post('/event/softDelete', 'eventController@softDelete');
Route::post('/event/restore', 'eventController@restore');


Route::get('/logincheck', 'IndexController@index')->middleware('admin.login');
Route::get('/login/idcheck', 'UserController@idcheck')->name('check');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


