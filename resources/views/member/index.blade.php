@extends('layouts.app')
@section('title', '个人中心')


@section('content')
<div class="micronews-persInfo-wrap">
    <div class="micronews-container micronews-details-container micronews-persInfo-content w1000">
      	<div class="layui-fluid">
	        <div class="layui-row">
	          	<div class="layui-col-xs12 layui-col-sm12 layui-col-md12">
	            	<div class="main">
	              		<div class="leave-message" id="tabBody">
              				<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
							  	<ul class="layui-tab-title">
							    	<li class="layui-this">个人信息</li>
							    	<li>我的文章</li>
							    	<li>我的收藏</li>
							    	<li>我的评论</li>
							    	<li>写文章</li>
							    	<li>修改密码</li>
							    	<li>绑定手机</li>
							  	</ul>
							  	<div class="layui-tab-content">
							    	<div class="layui-tab-item">
							    		<form class="layui-form" action="">
										  	<div class="layui-form-item">
											    <label class="layui-form-label">昵称</label>
											    <div class="layui-input-block">
											      	<input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
											    </div>
										  	</div>
										  	<div class="layui-form-item">
											    <label class="layui-form-label">性别</label>
											    <div class="layui-input-block">
											      	<select name="city" lay-verify="required">
											        	<option value=""></option>
											        	<option value="0">男</option>
											        	<option value="1">女</option>
											        	<option value="2">保密</option>
											      	</select>
											    </div>
										  	</div>
										  	<div class="layui-form-item layui-form-text">
									    		<label class="layui-form-label">自我介绍</label>
										    	<div class="layui-input-block">
										      		<textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
									    		</div>
										  	</div>
										  <div class="layui-form-item">
										    <div class="layui-input-block">
										      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
										      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
										    </div>
										  </div>
										</form>
										 
										
							    	</div>
							    	<div class="layui-tab-item">
							    		
							    		
							    	</div>
							    	<div class="layui-tab-item">32</div>
							    	<div class="layui-tab-item">33</div>
							    	<div class="layui-tab-item">334</div>
							    	<div class="layui-tab-item">修改密码</div>
							    	<div class="layui-tab-item">

							    		<form class="layui-form layui-form-pane" action="">
									        <div class="layui-form-item">
									          	<label class="layui-form-label">手机号</label>
									          	<div class="layui-input-inline"  >
									            	<input type="text" name="mobile" required="" lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input" >
									          	</div>
									        </div>
									        <div class="layui-form-item">
									          	<label class="layui-form-label"> 输入验证码</label>
									          	<div class="layui-input-inline">
									            	<input type="text" name="code" required="" lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input">
									          	</div>
									          	<label class="layui-form-label" style="cursor:pointer;background-color:#D1D1D1 ">获取短信验证码</label>
									        </div>
									        <div class="layui-form-item">
									          	<button class="layui-btn" lay-submit="" lay-filter="formDemoPane">立即提交</button>
									        </div>
								      	</form>
							    	</div>							
							    </div>
							</div>
	              		</div>
	            	</div>
	          	</div>
	        </div>
      	</div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/default/res/layui/layui.js"></script>
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});
</script>
<script>
$(".layui-tab-title li").click(function(){
		var picTabNum = $(this).index();
		console.log("当前图片标题下标是："+picTabNum);
		sessionStorage.setItem("picTabNum",picTabNum);
	});
	$(function(){
		var getPicTabNum = sessionStorage.getItem("picTabNum");
		$(".layui-tab-title li").eq(getPicTabNum).addClass("layui-this").siblings().removeClass("layui-this");
		$(".layui-tab-content>div").eq(getPicTabNum).addClass("layui-show").siblings().removeClass("layui-show");
	})

</script>
@stop
@section('footer')
   @include('layouts._footer')
@endsection