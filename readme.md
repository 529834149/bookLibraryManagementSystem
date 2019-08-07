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
	php artisan make:provider EasySmsServiceProvider  创建组件
##  前台开发

创建辅助函数
	1、touch app/helpers.php
	2、 在composer.json中autoload选项下加入
		"files": [
            "app/helpers.php"
        ]
    3、composer dump-autoload  重新加载文件

## 前台开发 遇见的问题
	- [1、在开发的时候很多js也运用{{}}语法，导致遇laravel自身的语法重合，在这里官方文档已经有过介绍](https://laravel.com/docs/5.4/blade#displaying-data).
## 使用的composer包
	1、验证码类： 
			（1）composer require "mews/captcha:~2.0"
			（2）php artisan vendor:publish --provider='Mews\Captcha\CaptchaServiceProvider'  生成配置文件
	2、短信发送组件：
			（1）composer require "overtrue/easy-sms"
			（2）https://learnku.com/courses/laravel-advance-training/5.8/sms-provider/3994
	3、微信登录
			 (1)composer require socialiteproviders/weixin
			 (2)app/Providers/EventServiceProvider.php设置当前组件 
			 protected $listen = [
				    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
				        // add your listeners (aka providers) here
				        'SocialiteProviders\Weixin\WeixinExtendSocialite@handle'
				    ],
				];
	4、PHP 一个比较合理的解决方案是 HTMLPurifier 。HTMLPurifier 本身就是一个独立的项目，运用『白名单机制』对 HTML 文本信息进行 XSS 过滤。这种过滤机制可以有效地防止各种 XSS 变种攻击。只通过我们认为安全的标签和属性，对于未知的全部过滤。
			（1）composer require "mews/purifier:~2.0"
			（2）php artisan vendor:publish --provider="Mews\Purifier\PurifierServiceProvider"
			 (3)config/purifier.php
			 		<?php
						return [
						    'encoding'      => 'UTF-8',
						    'finalize'      => true,
						    'cachePath'     => storage_path('app/purifier'),
						    'cacheFileMode' => 0755,
						    'settings'      => [
						        'user_topic_body' => [
						            'HTML.Doctype'             => 'XHTML 1.0 Transitional',
						            'HTML.Allowed'             => 'div,b,strong,i,em,a[href|title],ul,ol,ol[start],li,p[style],br,span[style],img[width|height|alt|src],*[style|class],pre,hr,code,h2,h3,h4,h5,h6,blockquote,del,table,thead,tbody,tr,th,td',
						            'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,margin,width,height,font-family,text-decoration,padding-left,color,background-color,text-align',
						            'AutoFormat.AutoParagraph' => true,
						            'AutoFormat.RemoveEmpty'   => true,
						        ],
						    ],
						];
				（4)调用$topic->body = clean($topic->body, 'user_topic_body');
https://blog.csdn.net/Dimo__/article/details/84936685
http://www.clcn.net.cn/
http://primo.clcn.net.cn:1701/primo_library/libweb/action/search.do?fn=search&ct=search&initialSearch=true&mode=Basic&tab=default_tab&indx=1&dum=true&srt=rank&vid=ST&frbg=&scp.scps=scope%3A%28ST%29+AND+scope%3A%28MGTS%29&vl%2823971421UI0%29=title&vl%28freeText0%29=%E4%B8%89%E5%9B%BD%E6%BC%94%E4%B9%89#
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
