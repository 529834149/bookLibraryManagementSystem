;(function($,window){
    var editor_article = {
        init:function(){
            //this.show_exam_status();
			//is_show_status 状态是否存在
			//this.validation();//表单验证
			this.is_login();
        } ,
        //点击编辑器判断是否登录
        is_login:function(){
           $('#editor_button').click(function(){
                var content = $("#onInput").val();
                if(!content){
                     layer.msg('不能发空帖');
                     return false;
                }
                var aid = $("input[name='aid']").val();
                var uid =  $("input[name='uid']").val();
                $.ajax({
                    type:'post',
                    url:'/send_editor',
                    data:{
                        uid:uid,
                        aid:aid,
                        content:content,
                    },
                    dataType:'json',
                    beforeSend:function(){
                        var index = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                    },
                    success:function(data){
                        if(data.code ==500){
                            layer.msg('不能发空帖');
                            return false;
                        }
                        if(data.code ==200){
                            layer.closeAll();
                            var conts = data.date;
                            var html = '';
                            var name = '';
                            if(!conts.realname){
                                var name  ='匿名';
                            }else{
                                var name =conts.realname;
                            }
                            console.log(name)
                            html += '<div class="liCont">'
                            html += '<a href="#"><img src="/default/res/static/images/header_img1.png"></a>'
                            html += '<div class="item-cont">'
                            html += '<div class="cont">'
                            html += '<p><span class="name">'+name+'</span><span class="time">'+conts.create1+'</span></p>'
                            html += '<p class="text">'+conts.content+'</p>'
                            html += '</div>'
                            html += '</div>'
                            html += '</div>'
                            $('#nocomm').remove();
                            $('.ulCommentList').prepend(html);
                        }
                     }, 
                });
           })
        },
        
    }
    window.editor_article = editor_article;
    $(function(){
        editor_article.init();
    });
}(jQuery,window));
