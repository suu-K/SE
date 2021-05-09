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


Route::get('/admin', 'AdminController@admin');
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/event', 'AdminController@event');
Route::get('/admin/product', 'AdminController@product');
Route::get('/admin/insert', 'AdminController@productInsert');
Route::get('/admin/event', 'AdminController@eventInsert');

Route::post('/product/update', 'ProductController@update');
Route::post('/product/insert', 'ProductController@insert');
Route::post('/product/delete', 'ProductController@delete');


Route::get('/logincheck', 'IndexController@index')->middleware('admin.login');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
