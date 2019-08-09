<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\BooksCategories;
use App\Models\Article;
class IndexController extends Controller
{
    public function welcome()
    {
        
        
        return view('welcome');
    }
	public function index(BooksCategories $booksCategories)
    {
    	// $article_list = Article::take(12)->orderBy('created_at','desc')->get();
    	$article_list = \DB::table('books_article')
            ->leftJoin('books_categories', 'books_article.category_id', '=', 'books_categories.id')
           	->select('books_article.*', 'books_categories.title as cate_title', 'books_categories.id as cate_id','books_categories.short_name')
           	->take(12)
           	->orderBy('created_at','desc')
            ->get()->toarray();
        //热门资讯
        $hot_article = Article::where('is_publish','y')->orderBy('post_num','desc')->get();

    	//$article = $booksCategories->find(1)->articles()->orderBy('created_at','desc')->get();
    	// $topics = BooksCategories::find(7)->articles;
    	// dd($topics);
        return view('index.list',compact('article_list','hot_article'));
    }
    public function emailVerifyNotice(Request $request)
    {
        return view('index.email_verify_notice');
    }
}
