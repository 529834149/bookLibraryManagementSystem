<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comments;
use App\Models\BooksCategories;

class Article extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books_article';
    public $timestamps = true;
    protected $guarded = [];
    protected $primaryKey = 'id';//定义主键
    protected $title ='文章';
 	public function comments()
    {

        return $this->hasMany(Comments::class);
    }
    public function category()
    {
    	
        return $this->belongsTo(BooksCategories::class);
    }
}