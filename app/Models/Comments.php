<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;


class Comments extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books_comments';
    public $timestamps = true;
    protected $guarded = [];
    protected $primaryKey = 'id';//定义主键
    protected $title ='文章';
 	public function article()
    {
        return $this->belongsTo(Article::class);
    }
    
}
