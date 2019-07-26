@extends('layouts.app')
@section('title', '注册')

@section('content')
    <div class="micronews-login-container">
        <div class="form-box">
            <h3>注册</h3>
            <div class="wrap">
                <form class="layui-form" method="POST" action="{{ route('register') }}"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
                     {{ csrf_field() }}
                    <!-- 用户名username-->
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text" name="username" lay-verify="required|username|" value="{{ old('username') }}" id="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- 邮箱 -->
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text" name="email" lay-verify="required|email|" value="{{ old('email') }}" id="email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                 <!--  <div class="layui-form-item">
                    <div class="layui-input-block">
                      <input type="text" name="mobile" lay-verify="required|mobile|" id="mobile" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                    </div>
                  </div> -->
                  <!-- 密码 -->
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text" name="password" lay-verify="required|password" value="{{ old('password') }}" id="password" placeholder="密码" autocomplete="off" class="layui-input">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                  <!-- < !-- 确认密码 --> 
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="text" name="password-confirm" lay-verify="required|password-confirm|" value="{{ old('password-confirm') }}" id="password-confirm" placeholder="确认密码" autocomplete="off" class="layui-input">
                            @if ($errors->has('password-confirm'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password-confirm') }}</strong>
                                </span>
                            @endif
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
                  <!-- <div class="layui-form-item">
                    <div class="layui-input-block">
                      <input type="text"  name="code" id="code" lay-verify="required" placeholder="请输入短信验证码" autocomplete="off" class="layui-input">
                      <input type="button"  id="veriCodeBtn" name="codetime" value="验证码"  class="obtain layui-btn">
                    </div>
                  </div> -->
                  <div class="layui-form-item">
                    <div class="layui-input-block">
                      <!-- <button class="layui-btn" lay-submit lay-filter="submit_button"  >去注册</button> -->
                      <!-- <button class="layui-btn layui-btn-norma" lay-submit lay-filter="login">去注册</button> -->
                      <button type="submit" class="layui-btn">去注册</button>
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
    <!-- <script type="text/javascript" src="/default/js/register.js"></script> -->

@stop   