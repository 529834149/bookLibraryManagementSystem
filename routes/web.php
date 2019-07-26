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

//首页列表
Route::get('/', 'IndexController@index')->name('index');
//注册页面
//Route::resource('login', 'LoginController');
//Route::resource('register', 'RegisterController');

//文章详情页
Route::get('/article/{article_id}','ArticleController@show');

//发送短信接口
Route::resource('send', 'SendcodeController');

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//判断当前手机号是否绑定
Route::resource('is_bind', 'MemberController');
