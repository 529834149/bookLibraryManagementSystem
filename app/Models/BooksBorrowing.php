<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BooksBorrowing extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books_borrowing';
    public $timestamps = true;
    protected $guarded = [];
    protected $primaryKey = 'id';//定义主键
    protected $title ='书籍信息';
 	
}
