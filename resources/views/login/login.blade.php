@extends('layouts.app')
@section('title', '登录')

@section('content')
  <div class="micronews-login-container">
    <div class="form-box">
      <h3>登录</h3>
      <div class="wrap">
        <form class="layui-form" method="POST" action="{{ route('login') }}"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
          <div class="layui-form-item">
            <div class="layui-input-block">
              <input type="text" name="mobile" lay-verify="required|phone" id="phone" placeholder="请输入手机号" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-input-block">
              <input type="text"  name="captcha" lay-verify="required" id="imgCode" placeholder="验证码" autocomplete="off" class="layui-input form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}">
              <img src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
               @if ($errors->has('captcha'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('captcha') }}</strong>
                  </span>
                @endif
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-input-block">
              <input type="text"  name="" lay-verify="required" placeholder="请输入短信验证码" autocomplete="off" class="layui-input">
              <input type="button"  id="veriCodeBtn" name="codetime" value="验证码" class="obtain layui-btn">
            </div>
          </div>
          <div class="layui-form-item agreement">
            <div class="layui-input-block">
              <input type="checkbox" name="like1[write]" lay-verify="required" lay-skin="primary" title="我已阅读并同意" checked="">
              <span class="txt"><a href="#">用户协议</a>和<a  href="#">隐私条款</a></span>
              
            </div>
          </div>
          
          <div class="layui-form-item">
            <div class="layui-input-block">
              <button class="layui-btn" lay-submit lay-filter="*" onclick="return false">登录</button>
            </div>
          </div>
          <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
        </form>
        <div class="other-login">
          <a href="#">
            <img src="/default/res/static/images/load1.png">
          </a>
          <a href="#">
            <img src="/default/res/static/images/load2.png">
          </a>
          <a href="/register">
           <i class="layui-icon layui-icon-next"></i> 去注册
          </a>
        </div>
      </div>
      


    </div>
  </div>
  <script type="text/javascript" src="/default/res/layui/layui.js"></script>
@stop