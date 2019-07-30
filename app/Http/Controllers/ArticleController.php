<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksCategories;
use App\Models\Article;
use App\Models\Member;
use App\Models\Comments;
use Validator;
class ArticleController extends Controller
{
    public function get_article(Request $request,$cateid,$short_name)
    {
        // $article_list = Article::take(12)->orderBy('created_at','desc')->get();
        $article_list = \DB::table('books_article')
            ->leftJoin('books_categories', 'books_article.category_id', '=', 'books_categories.id')
            ->select('books_article.*', 'books_categories.title as cate_title', 'books_categories.id as cate_id','books_categories.short_name')
            ->where('books_article.category_id',$cateid)
            ->orderBy('created_at','desc')
            ->get()->toarray();
        //热门资讯
        $hot_article = Article::whereNotIn('category_id',[$cateid])->orderBy('post_num','desc')->take(12)->get();

        //$article = $booksCategories->find(1)->articles()->orderBy('created_at','desc')->get();
        // $topics = BooksCategories::find(7)->articles;
        // dd($topics);
        return view('article.cateArticle',compact('article_list','hot_article'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article,$id)
    {
        $article = Article::find($id);
        $cate = BooksCategories::find($article['category_id']);
        $article['cate_name'] = $cate['title'];


        //文章推荐
        $publish_article = Article::whereNotIn('id',[$article['id']])->take(10)->get();
      
        //获取当前文章评论
        $comments = $article->comments()->orderBy('created_at','desc')->get()->map(function ($comment) {
                $member_info = Member::find($comment['uid']);
                $comment->pic = $member_info['pic'];
                $comment->realname = $member_info['realname'];
                return $comment->only(['id', 'content', 'created_at','uid','pic','realname']);
        });
        $comments_data = $comments->toarray();
        return view('article.detail',compact('article','publish_article','comments_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function editor_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uid' => 'required',
            'aid' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
             return response()->json(['code' => 500,'message'=>'提交信息异常，请检查完在提交']);
        }

        $Comments = Comments::create([
            'uid' => $request->input('uid'),
            'article_id' => $request->input('aid'),
            'content' => $request->input('content'),
        ]);
        $Comments['create1'] = \Carbon\Carbon::parse($Comments['created_at'])->diffForHumans();
        $member = Member::find($request->input('uid'));
        $Comments['realname'] = $member['realname'];
        return response()->json(['code' => 200,'message'=>'发帖成功','date'=>$Comments]);

    }
}
