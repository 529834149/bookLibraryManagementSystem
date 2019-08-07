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
Route::get('welcome', 'IndexController@welcome');
//注册页面
//Route::resource('login', 'LoginController');
//Route::resource('register', 'RegisterController');

//文章详情页
Route::get('/article/{article_id}','ArticleController@show');
Route::resource('article','ArticleController');
Route::get('create_post','ArticleController@create');

//发送短信接口
Route::resource('send', 'SendcodeController');

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//判断当前手机号是否绑定
Route::resource('is_bind', 'MemberController');
Route::get('bind_mobile_page', 'MemberController@bind_mobile');
Route::post('send_editor', 'ArticleController@editor_save');
Route::post('collection', 'ArticleController@collection');
//前端首页分类文章
Route::get('category/{id}/{name1}/{name2}', 'ArticleController@get_article');
// 
Route::get('member/center', 'MemberController@member');
Route::post('bind_mobile', 'MemberController@bind_mobile_update');

// 微信登录
Route::post('socials/{social_type}/authorizations', 'AuthorizationsController@bind_mobile_update');
//图片上传
Route::post('upload','ArticleController@upload');
Route::post('editor/upload','ArticleController@editor_upload');



