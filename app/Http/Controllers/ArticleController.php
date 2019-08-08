<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksCategories;
use App\Models\Article;
use App\Models\Member;
use App\Models\Comments;
use App\Models\BooksCollection;
use Validator;
use App\Http\Requests\ArticleRequest;
use App\Handlers\ImageUploadHandler;
class ArticleController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => ['index', 'show','get_article']]);
    }
    public function collection(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uid' => 'required',
            'aid' => 'required',
            'collection' => 'required',
        ]);
        if ($validator->fails()) {
             return response()->json(['code' => 500,'message'=>'服务器繁忙']);
        }
        $collection =BooksCollection::where('aid',intval($request->input('aid')))->where('uid',intval($request->input('uid')))->first();
        if($collection){
            $del = BooksCollection::destroy(intval($collection['id']));
            if($del){
                return response()->json(['code' => 200,'message'=>'取消收藏']);
            }else{
                return response()->json(['code' => 500,'message'=>'网络失败']);
            }
            //取消收藏
        }else{
            //收藏
            $collection = BooksCollection::create([
                'aid' => $request->input('aid'),
                'uid' => $request->input('uid'),
            ]);
            if($collection){
                return response()->json(['code' => 200,'message'=>'收藏成功']);
            }else{
                return response()->json(['code' => 500,'message'=>'网络失败']);
            }
        }
        // BooksCollection::destroy();
    }
    public function get_article(Request $request,$cateid,$short_name)
    {
        // $article_list = Article::take(12)->orderBy('created_at','desc')->get();
        $article_list = \DB::table('books_article')
            ->leftJoin('books_categories', 'books_article.category_id', '=', 'books_categories.id')
            ->select('books_article.*', 'books_categories.title as cate_title', 'books_categories.id as cate_id','books_categories.short_name')
            ->where('books_article.category_id',$cateid)
            ->orderBy('created_at','desc')
            ->paginate(15);
        //评论数
       
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
    public function create(Article $article)
    {
        if(!\Auth::check()){
            return redirect("/login");
        }

        $get_cate = BooksCategories::get();
        return view('article.create_editor',compact('get_cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(ArticleRequest  $request,Article $article)
    {
        $article->fill($request->all());
        $article->article_body = clean($article->article_body, 'user_topic_body');
        $article->article_summary = make_excerpt($article->article_body);
        $article->save();
        return redirect()->route('article.show', $article->id)->with('success', '帖子创建成功！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article,$id)
    {
        //浏览自增
        \DB::table('books_article')->where('id',$id)->increment('click');

        $article = Article::find($id);
        $cate = BooksCategories::find($article['category_id']);
        $article['cate_name'] = $cate['title'];

        //是否收藏
        $uid = \Auth::id();
        $is_coll = BooksCollection::where('uid',$uid)->where('aid',$id)->first();
        
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
        return view('article.detail',compact('article','publish_article','comments_data','is_coll'));
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
        \DB::table('books_article')->where('id',intval($request->input('aid')))->increment('post_num');
        return response()->json(['code' => 200,'message'=>'发帖成功','date'=>$Comments]);

    }
    //图片上传
    public function upload(Request $request)
    {
        if ($_POST) {
            //上传图片具体操作
            $file_name = $_FILES['file']['name'];
            //$file_type = $_FILES["file"]["type"];
            $file_tmp = $_FILES["file"]["tmp_name"];
            $file_error = $_FILES["file"]["error"];
            $file_size = $_FILES["file"]["size"];
             if ($file_error > 0) { // 出错
                $message = $file_error;
            }elseif($file_size > 1048576) { // 文件太大了
                $message = "上传文件不能大于1MB";
            }else{
                $date = date('Ymd');
                $file_name_arr = explode('.', $file_name);
                $new_file_name = date('YmdHis') . '.' . $file_name_arr[1];
                $path = "uploads/".$date."/";
                $file_path = $path . $new_file_name;
                if (file_exists($file_path)) {
                    $message = "此文件已经存在啦";
                } else {
                    //TODO 判断当前的目录是否存在，若不存在就新建一个!
                    if (!is_dir($path)){
                        @mkdir($path,0777);
                    }
                    $upload_result = move_uploaded_file($file_tmp, $file_path); 
                    //此函数只支持 HTTP POST 上传的文件
                    if ($upload_result) {
                        $status = 1;
                        $message = $file_path;
                    } else {
                        $message = "文件上传失败，请稍后再尝试";
                    }
                }
            }   
        } else {
            $message = "参数错误";
        }
        return showMsg($status, $message);
    }
    public function editor_upload(Request $request)
    {
        if ($this->request->isPost()){
            $res['code'] = 0;
            $res['msg']  = "上传成功";
            // 获取表单上传文件
            $file = $this->request->file('file');
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'images');//保存路径
                if ($info){
                    $res['data']['title']= $info->getFilename();
                    $filepath =$info->getSaveName();
                    $res['data']['src'] = "/uploads/images/".$filepath;
                }
         }else{
             $res['code'] = 1;
             $res['msg'] = '上传失败'.$file->getError();
         }
         return $res;
    }

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}
