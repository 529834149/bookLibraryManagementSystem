<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BooksCategories;

class BooksInformation extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books_information';
    public $timestamps = true;
    protected $guarded = [];
    protected $primaryKey = 'id';//定义主键
    protected $title ='书籍信息';
 	public function categories()
    {
        return $this->hasMany(BooksCategories::class);
    }
}
