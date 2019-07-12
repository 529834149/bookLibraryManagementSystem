<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books_member';
    public $timestamps = true;
    protected $guarded = [];
    protected $primaryKey = 'member_id';//定义主键
}
