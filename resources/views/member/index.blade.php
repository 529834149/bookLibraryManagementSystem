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
							    	<li>我的收藏</li>
							  	</ul>
							  	<div class="layui-tab-content">
							    	<div class="layui-tab-item">
							    		<form class="layui-form layui-form-pane">
										  	<div class="layui-form-item">
											    <label class="layui-form-label">昵称</label>
											    <div class="layui-input-inline">
											      	<input type="text" value="{{$member['realname']}}" readonly="readonly" style="cursor:not-allowed;"  name="realname" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
											    </div>
										  	</div>
										  	<div class="layui-form-item">
											    <label class="layui-form-label">邮箱</label>
											    <div class="layui-input-inline">
											      	<input type="text" value="{{$member['email']}}" name="email" readonly="readonly"  style="cursor:not-allowed;" required  lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
											    </div>
										  	</div>
										  	<div class="layui-form-item">
											    <label class="layui-form-label">用户名</label>
											    <div class="layui-input-inline">
											      	<input type="text" value="{{$member['username']}}" name="username" readonly="readonly" style="cursor:not-allowed;" required  lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
											    </div>
										  	</div>

										  	<input type="hidden" name="uid" value="{{Auth::id() }}">
									        <div class="layui-form-item">
									          	<label class="layui-form-label">手机号</label>
									          	<div class="layui-input-inline"  >
									            	<input type="text" id="mobile" name="mobile" required="" value="{{$member['mobile']}}" lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input" >
									          	</div>
									        </div>
									        <div class="layui-form-item">
									          	<label class="layui-form-label"> 输入验证码</label>
									          	<div class="layui-input-inline">
									            	<input type="text" id="code" name="code" @if($is_bind_status =="n") readonly="readonly" style="cursor:not-allowed;"  @else  @endif  required="" lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input">
									          	</div>
									          	<input type="hidden" name="status" id="status" value="{{$is_bind_status}}">
									          	<span class="layui-form-label" id="codenames" name="codenames" style="cursor:pointer;background-color:#D1D1D1 ">获取短信验证码</span>
									          	
									        </div>
									        <input type="hidden" name="sendCode_key" id="sendCode_key">
									        <div class="layui-form-item">
									          	<button class="layui-btn @if($is_bind_status =='n') layui-btn-disabled @else @endif" id="submit_botton" onclick="return false;">立即提交</button>
									        </div>
								      	</form>

							    	</div>
							    	<div class="layui-tab-item">
							    		<table class="layui-table">
										  	<colgroup>
											    <col width="10%">
											    <col width="60%">
											    <col width="20%">
											    <col>
										  	</colgroup>
										  	<thead>
											    <tr>
											      	<th>文章ID</th>
											      	<th>文章标题</th>
											      	<th>收藏时间</th>
											    </tr> 
											  </thead>
										  	<tbody>
										  		@foreach($article_list as $v)
										
											    <tr>
											    	<td>{{$v->aid}}</td>
											      	<td><a href="/article/{{$v->aid}}">{{$v->article_title}}</a></td>
											      	<td>{{$v->created_at}}</td>
											    </tr>
											   	@endforeach
										  	</tbody>

										</table>
										{{$article_list->links('common.pagination')}}
							    	</div>
							    	
							    	</div>
							    	<!-- <div class="layui-tab-item">
							    		<form class="layui-form layui-form-pane" action="">
									        <div class="layui-form-item">
									          	<label class="layui-form-label">原密码</label>
									          	<div class="layui-input-inline"  >
									            	<input type="text" name="mobile" required="" lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input" >
									          	</div>
									        </div>
									        <div class="layui-form-item">
									          	<label class="layui-form-label">新密码</label>
									          	<div class="layui-input-inline">
									            	<input type="text" name="code" required="" lay-verify="required" placeholder="请输入新密码" autocomplete="off" class="layui-input">
									          	</div>
									        </div>
									        <div class="layui-form-item">
									          	<button class="layui-btn" lay-submit="" lay-filter="formDemoPane">立即提交</button>
									        </div>
								      	</form>
							    	</div>
							    		 -->
							    			
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
<script type="text/javascript" src="/default/js/memberinfo.js"></script>

<script>

	
$(".layui-tab-title li").click(function(){
		var picTabNum = $(this).index();
		// console.log("当前图片标题下标是："+picTabNum);
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