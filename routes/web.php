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
Route::get('/admin/event/{sort}', 'AdminController@eventInsert');
Route::get('/admin/product', 'AdminController@productInsert');
Route::get('/admin/{sort}', 'AdminController@admin');
Route::get('/admin4', 'AdminController@admin4');
Route::post('/admin4', 'AdminController@admin4');
Route::get('/admin5', 'AdminController@admin5');
Route::post('/admin5', 'AdminController@admin5');
Route::get('/admin6', 'AdminController@admin6');
Route::get('/admin7', 'AdminController@admin7');
Route::get('/admin8', 'AdminController@admin8');
Route::get('/admin9', 'AdminController@admin9');
Route::get('/admin10', 'AdminController@admin10');
Route::get('/orderUpdate/{id}', 'OrderProductController@update');
Route::get('/answer/{id}', 'AdminController@answer');
Route::post('/answerInsert', 'questionController@answer');


Route::get('/admin/productSearch', 'AdminController@admin2Search');

#사용자 화면 라우팅
Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');
Route::get('/product/detail/{id}', 'IndexController@productDetail');
Route::get('/products', 'IndexController@products');
Route::post('/products', 'IndexController@products');
Route::get('/products/{category}', 'IndexController@products');
Route::post('/products/{category}', 'IndexController@products');
Route::get('/productsFillter/{fillter}', 'IndexController@products');
Route::get('/eventSebu/{id}', 'IndexController@eventSebu');
Route::get('/payment', 'IndexController@payment');
Route::post('/payment', 'IndexController@payment');
Route::post('/payment2', 'IndexController@payment2');
Route::get('/coupon', 'IndexController@coupon');
Route::post('/pay', 'OrderListController@insert')->name('pay');
Route::post('/pay2', 'OrderListController@insert2');
Route::get('/orderList', 'IndexController@orderList');
Route::get('/orderList/{date}', 'IndexController@orderList');
Route::get('/ordersebu/{id}', 'IndexController@ordersebu');
Route::get('/orderConfirm/{id}', 'OrderProductController@confirm');
Route::get('/review/{id}/{product_id}', 'IndexController@review');
Route::post('/reviewInsert/{id}', 'CommentController@insert');
Route::get('/question/{id}', 'IndexController@question');
Route::post('/questionInsert', 'questionController@insert');
Route::get('/questionlist', 'IndexController@questionlist');
Route::get('/questcontent/{id}', 'IndexController@questcontent');

#장바구니 라우팅
Route::get('/cart', 'IndexController@cart')->middleware('admin.deny', 'auth');
Route::post('/cart/add', 'CartController@insert')->middleware('admin.deny', 'auth');
Route::post('/cart/delete/{id}', 'CartController@delete')->middleware('admin.deny', 'auth');
Route::get('/cartadd', 'CartController@add')->name('cartadd');
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
Route::post('/event/update', 'EventController@update');
Route::post('/event/insert', 'EventController@insert');
Route::post('/event/delete', 'EventController@delete');
Route::post('/event/softDelete', 'EventController@softDelete');
Route::post('/event/restore', 'EventController@restore');


Route::get('/logincheck', 'IndexController@index')->middleware('admin.login');
Route::get('/login/idcheck', 'UserController@idcheck')->name('check');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


