<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
 	$router->resource('members', 'MemberController');//用户
 	$router->resource('booksCategories', 'BooksCategoriesController');//书籍分类
 	$router->resource('booksInformation', 'BooksInformationController');//书籍分类
});
