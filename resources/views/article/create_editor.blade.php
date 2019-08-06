@extends('layouts.app')
@section('title', '个人中心')


@section('content')
          
<blockquote class="layui-elem-quote layui-text">
    朋友们有好的文章分享出来哦，
</blockquote>
<form class="layui-form" action="" lay-filter="example">
    <div class="layui-form-item">
        <label class="layui-form-label">文章分类</label>
        <div class="layui-input-block">
          <select name="interest" lay-filter="aihao">
            <option value=""></option>
            <option value="0">写作</option>
            <option value="1">阅读</option>
            <option value="2">游戏</option>
            <option value="3">音乐</option>
            <option value="4">旅行</option>
          </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章标题</label>
        <div class="layui-input-block">
            <input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章作者</label>
        <div class="layui-input-inline">
            <input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章内容</label>
        <textarea id="demo" style="display: none;"></textarea>
    </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
    </div>
  </div>
</form>
<script type="text/javascript" src="/default/res/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
    var form = layui.form,
        layer = layui.layer,
        layedit = layui.layedit
        layedit.build('demo'); //建立编辑器
  //监听提交
  form.on('submit(demo1)', function(data){
    layer.alert(JSON.stringify(data.field), {
      title: '最终的提交信息'
    })
    return false;
  });
  
});
</script>


@stop
@section('footer')
   @include('layouts._footer')
@endsection