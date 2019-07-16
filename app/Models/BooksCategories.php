<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use App\Models\BooksInformation;

class BooksCategories extends Model
{
	use ModelTree, AdminBuilder;
    protected $connection = 'mysql';
    protected $table = 'books_categories';
    public $timestamps = true;
    protected $guarded = [];
 	  protected $title ='书籍分类';
    protected $primaryKey = 'id';//定义主键
    public function infomation()
    {
        return $this->hasMany(BooksInformation::class);
    }
 	// public function __construct(array $attributes = [])
  //   {
  //       parent::__construct($attributes);

  //       $this->setParentColumn('pid');
  //       $this->setOrderColumn('sort');
  //       $this->setTitleColumn('name');
  //   }
}
