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

Route::get('/', 'IndexController@index')->middleware('admin.login');
Route::get('/index', 'IndexController@index');
Route::get('/product/detail/{id}', 'IndexController@productDetail');
Route::get('/products/{category}', 'IndexController@products');
Route::get('/productsFillter/{fillter}', 'IndexController@products');

Route::get('/admin', 'AdminController@admin');
Route::get('/admin2', 'AdminController@admin2');
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/event', 'AdminController@eventInsert');
Route::get('/admin/product', 'AdminController@productInsert');

Route::get('/admin/productSearch', 'AdminController@admin2Search');

Route::get('/cart', 'IndexController@cart');
Route::post('/cart/add', 'CartController@insert');
Route::post('/cart/delete', 'CartController@delete');

Route::post('/product/update', 'ProductController@update');
Route::post('/product/insert', 'ProductController@insert');
Route::post('/product/delete', 'ProductController@delete');

Route::post('/event/update', 'eventController@update');
Route::post('/event/insert', 'eventController@insert');
Route::post('/event/delete', 'eventController@delete');
Route::post('/event/softDelete', 'eventController@softDelete');
Route::post('/event/restore', 'eventController@restore');


Route::get('/logincheck', 'IndexController@index')->middleware('admin.login');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
