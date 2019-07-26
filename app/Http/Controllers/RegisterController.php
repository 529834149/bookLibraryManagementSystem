<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Validator;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.register');
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
         $validator = Validator::make($request->all(), [
            'mobile' => 'required|regex:/^[1][3,4,5,6,7,8][0-9]{9}$/',
            'password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/',
            'q_password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/',
            'key' => 'required',
            'code' => 'required|regex:/^\d{4}$/',
        ]);
        if ($validator->fails()) {
             return response()->json(['code' => 500,'message'=>'提交信息异常，请检查完在提交']);
        }
        //"mobile" => "15510787005"
        // "password" => "CHENBAOJIN1111"
        // "q_password" => "CHENBAOJIN1111"
        // "code" => "3872"
        $data['mobile'] = $request['mobile'];
        //判断是否被注册
        $is_mobile = Member::where('mobile',$data['mobile'])->first();
        if(!$is_mobile){
            return response()->json(['code' => 500,'message'=>'该手机号已经注册']);
        }
        $data['password'] = $request['password'];
        $data['q_password'] = $request['q_password'];
        $data['code'] = $request['code'];
        $data['key'] = $request['key'];
        if($data['password'] !== $data['q_password']){
              return response()->json(['code' => 500,'message'=>'密码与确认密码不一样，请重新输入']);
        }
        //判断验证码和手机还是否相同
        $verifyData = \Cache::get($data['key']);
        if (!$verifyData) {
             return response()->json(['code' => 500,'message'=>'验证码已经失效']);
        }

        if (!hash_equals($verifyData['code'],  $data['code'])) {
            // 返回401
            return response()->json(['code' => 500,'message'=>'验证码错误']);
        }
        $member = Member::create([
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),
        ]);

        // 清除验证码缓存
        \Cache::forget($data['key']);
        return response()->json(['code' => 200,'message'=>'注册成功']);
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'captcha' => ['required', 'captcha'],
        ], [
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',
        ]);
    }
}
