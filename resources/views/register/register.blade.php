@extends('layouts.app')
@section('title', '注册')

@section('content')
  <div class="micronews-login-container">
    <div class="form-box">
      <h3>注册</h3>
      <div class="wrap">
        <form class="layui-form" method="POST" action="login" id="form"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
          <!-- 手机号 -->
          <div class="layui-form-item">
            <div class="layui-input-block">
              <input type="text" name="mobile" lay-verify="required|mobile|" id="mobile" placeholder="请输入手机号" autocomplete="off" class="layui-input">
            </div>
          </div>
          <!-- 密码 -->
          <div class="layui-form-item">
            <div class="layui-input-block">
              <input type="text" name="password" lay-verify="required|password" id="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
          </div>
          <!-- 确认密码 -->
          <div class="layui-form-item">
            <div class="layui-input-block">
              <input type="text" name="q_password" lay-verify="required|q_password" id="q_password" placeholder="请输入确认密码" autocomplete="off" class="layui-input">
            </div>
          </div>

          <!-- <div class="layui-form-item">
            <div class="layui-input-block">
              <input type="text"  name="captcha" lay-verify="required" id="imgCode" placeholder="验证码" autocomplete="off" class="layui-input form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}">
              <img src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
               @if ($errors->has('captcha'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('captcha') }}</strong>
                  </span>
                @endif
            </div>
          </div> -->
          <div class="layui-form-item">
            <div class="layui-input-block">
              <input type="text"  name="" lay-verify="required" placeholder="请输入短信验证码" autocomplete="off" class="layui-input">
              <input type="button"  id="veriCodeBtn" name="" value="验证码" class="obtain layui-btn">
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
              <button class="layui-btn" lay-submit lay-filter="*" onclick="return false" lay-filter="formDemo">去注册</button>
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
          <a href="/login">
           <i class="layui-icon layui-icon-next"></i> 去登录
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="/default/res/layui/layui.js"></script>
  <script type="text/javascript">
    layui.use('form', function(){
      var form = layui.form;
      
      //监听提交
      form.on('submit(formDemo)', function(data){
        layer.msg(JSON.stringify(data.field));
        return false;
      });
    });
  </script>
 
@stop