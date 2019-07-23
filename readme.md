<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## 关于本项目

本项目是一款图书馆项目 包含书籍分类、借阅、 学术交流、图书搜索、图书的录入等功能、资讯内容、用户管理、内容管理等

## 用到的扩展包
- [composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/](https://learnku.com/composer/wikis/30594).
composer require laravel-admin-ext/chartjs


-[ 所有的镜像使用了阿里镜像composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/]
Composer 加速


## 后台开发

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## 开发问题

在每次开发遇见很多不一样的问题，这里我把我出现的问题全部写到这里面了

1、max key length is 1000 bytes [Laravel documentation](https://github.com/529834149/bookLibraryManagementSystem/issues/1).
2、安装代码编辑器:https://www.cc430.cn/index.php/archives/529/
## artisan命令行


 php artisan admin:make MemberController --model=App\\Member   控制器创建

##  前台开发

创建辅助函数
	1、touch app/helpers.php
	2、 在composer.json中autoload选项下加入
		"files": [
            "app/helpers.php"
        ]
    3、composer dump-autoload  重新加载文件

## License
https://blog.csdn.net/Dimo__/article/details/84936685
http://www.clcn.net.cn/
http://primo.clcn.net.cn:1701/primo_library/libweb/action/search.do?fn=search&ct=search&initialSearch=true&mode=Basic&tab=default_tab&indx=1&dum=true&srt=rank&vid=ST&frbg=&scp.scps=scope%3A%28ST%29+AND+scope%3A%28MGTS%29&vl%2823971421UI0%29=title&vl%28freeText0%29=%E4%B8%89%E5%9B%BD%E6%BC%94%E4%B9%89#
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
