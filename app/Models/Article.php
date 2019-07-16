<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books_article';
    public $timestamps = true;
    protected $guarded = [];
    protected $primaryKey = 'article_id';//定义主键
    protected $title ='文章';
 	
}
