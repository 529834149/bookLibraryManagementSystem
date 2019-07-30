<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BooksCollection;

class BooksCollection extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books_collection';
    public $timestamps = true;
    protected $guarded = [];
    protected $primaryKey = 'id';//定义主键
    protected $title ='收藏';
 	
}
