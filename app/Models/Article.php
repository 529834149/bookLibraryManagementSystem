<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comments;
use App\Models\BooksCategories;
use Carbon\Carbon;
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
    public function getCreatedAtAttribute($date) {
        if (Carbon::now() > Carbon::parse($date)->addDays(15)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }
    
   
}
