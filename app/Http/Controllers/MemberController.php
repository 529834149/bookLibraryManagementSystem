<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\BooksCategories;
use App\Models\Article;
use App\Models\Comments;
use App\Models\BooksCollection;
class MemberController extends Controller
{
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
        $login_uid = $request->uid;
        $uinfo = Member::find($login_uid);
        if($uinfo['mobile']){
             return response()->json(['code' => 200,'message'=>'已经绑定']);
        }else{
             return response()->json(['code' => 500,'message'=>'未绑定手机号']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function bind_mobile(Request $request)
    {
        return view('member.mobile_bind');
    }

    //个人中心
    public function member(Request $request)
    {
        $uid = \Auth::id();
        $member = Member::find($uid);
        //获取收藏
        $article_list = \DB::table('books_collection')
            ->leftJoin('books_article', 'books_collection.aid', '=', 'books_article.id')
            ->leftJoin('books_comments', 'books_article.id', '=', 'books_comments.article_id')
            ->where('books_collection.uid',$uid)
            ->paginate(20);
            // ->orderBy('created_at','desc')
            // ->paginate(20);
        return view('member.index',compact('member','article_list'));
    }
    // 手机号绑定
    public function bind_mobile_update(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'mobile' => 'required',
            'key' => 'required',
            'code' => 'required',
            'uid'=>'required',
        ]);
        if ($validator->fails()) {
             return response()->json(['code' => 500,'message'=>'网络异常']);
        }
        //验证当前手机号是否被注册，验证当前手机验证码是否正确，验证手机验证码是否生效
        $data['mobile'] = $request->input('mobile');
        //判断是否被注册
        $is_mobile = Member::where('mobile',$data['mobile'])->first();
        if($is_mobile){
            return response()->json(['code' => 500,'message'=>'该手机号已经注册']);
        }
        $data['code'] =$request->input('code');
        $data['key'] = $request->input('key');
        //判断验证码和手机还是否相同
        $verifyData = \Cache::get($data['key']);
        if (!$verifyData) {
             return response()->json(['code' => 500,'message'=>'验证码已经失效']);
        }

        if (!hash_equals($verifyData['code'],  $data['code'])) {
            // 返回401
            return response()->json(['code' => 500,'message'=>'验证码错误']);
        }

        $member = Member::where('member_id',intval($request->input('uid')))->update([
            'mobile' => $data['mobile'],
           
        ]);
        if($member){
            $mobiles = Member::where('mobile',intval($data['mobile']))->first();
             // 清除验证码缓存
            \Cache::forget($data['key']);
            return response()->json(['code' => 200,'message'=>'注册成功','data'=>$mobiles['mobile']]);
            // 
        }else{
             \Cache::forget($data['key']);
            return response()->json(['code' => 500,'message'=>'网络异常']);
        }
       
      
    }

}
