@extends('layouts.app')
@section('title', '个人中心')


@section('content')
<div class="layui-container" > 
    <blockquote class="layui-elem-quote layui-text">
    朋友们有好的文章分享出来哦，
    </blockquote>
    <form class="layui-form" action="" lay-filter="example" style="border:1px solid #E6E6E6">

        <div class="layui-form-item">
            <label class="layui-form-label">分类</label>
            <div class="layui-input-block">
              <select name="interest" lay-filter="aihao">
                @foreach($get_cate as $v)
                <option value="{{$v['id']}}">{{$v['title']}}</option>
                @endforeach
               <!--  <option value="1">阅读</option>
                <option value="2">游戏</option>
                <option value="3">音乐</option>
                <option value="4">旅行</option> -->
              </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">作者</label>
            <div class="layui-input-block">
                <input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
            </div>
        </div>
        <input type="hidden" name="_token" class="tag_token" value="<?php echo csrf_token(); ?>">      
        <div class="layui-form-item">
            <label class="layui-form-label">首图</label>
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" name="img_upload" class="layui-btn btn_upload_img">
                        <i class="layui-icon">&#xe67c;</i>上传图片
                    </button>
                    <br>
                    <br>
                    <img class="layui-upload-img img-upload-view" src="/default/res/static/images/header.png" width="280" height="180">
                    <p id="demoText"></p>
                </div>
            </div>
            <input type="hidden" name="pic" id="pic" value="">
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容</label>
            <div class="layui-input-block"> <textarea id="content" style="display: none;"></textarea></div>
           
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">发布</button>
            </div>
        </div>
    </form>
</div>          

<script type="text/javascript" src="/default/res/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['form', 'layedit', 'laydate','upload'], function(){
    var form = layui.form,
        layer = layui.layer,
        layedit = layui.layedit
        layedit.build('content',{
            tool: [
                  'strong' //加粗
                  ,'italic' //斜体
                  ,'underline' //下划线
                  ,'del' //删除线
                  
                  ,'|' //分割线
                  
                  ,'left' //左对齐
                  ,'center' //居中对齐
                  ,'right' //右对齐
                  ,'link' //超链接
                  ,'unlink' //清除链接
                  ,'face' //表情
                  // ,'image' //插入图片
                  ,'help' //帮助
                ]
      
        }); //建立编辑器
        var upload = layui.upload;
        var tag_token = $(".tag_token").val();
        //编辑器图片上传
        layui.layedit.set({
            uploadImage: {
                url: '/editor/upload' //接口url
                ,type: 'post' //默认post
            }
        });
        //当前首图上传
        var uploadInst = upload.render({
            elem: '.btn_upload_img'
            ,type : 'images'
            ,exts: 'jpg|png|gif' //设置一些后缀，用于演示前端验证和后端的验证
            //,auto:false //选择图片后是否直接上传
            //,accept:'images' //上传文件类型
            ,url: '/upload'
            ,data:{'_token':tag_token}
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('.img-upload-view').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                $('.layui-upload-img').attr('src',res.message)
                //如果上传失败
                if(res.status == 1){
                    return layer.msg('上传成功');
                }else{//上传成功
                    layer.msg(res.message);
                }
            }
            ,error: function(){
                //演示失败状态，并实现重传
                return layer.msg('上传失败,请重新上传');
            }
        });
  // //监听提交
  // form.on('submit(demo1)', function(data){
  //   layer.alert(JSON.stringify(data.field), {
  //     title: '最终的提交信息'
  //   })
  //   return false;
  // });
  
});
</script>


@stop
@section('footer')
   @include('layouts._footer')
@endsection