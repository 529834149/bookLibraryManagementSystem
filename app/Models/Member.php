<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
	use Notifiable;
    protected $connection = 'mysql';
    protected $table = 'books_member';
    public $timestamps = true;
    protected $guarded = [];
    protected $primaryKey = 'member_id';//定义主键
    protected $fillable = [
        'username', 'email', 'password',
    ];
}
