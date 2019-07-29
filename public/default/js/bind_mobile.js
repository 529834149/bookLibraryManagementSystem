;(function($,window){
    var bind_mobile = {
        init:function(){
            //this.show_exam_status();
			//is_show_status 状态是否存在
			//this.validation();//表单验证
			//this.is_bind_mobile();
        } ,
        //点击发送短信
        is_bind_mobile:function(){
                var allUrl = window.location.href;
                var uid = $('input[name="login_uid"]').val();
                if(uid){
                    //登录多长时间执行一次
                    setTimeout(function() { 
                        $.ajax({
                            type:'post',
                            url:'/is_bind',
                            data:{
                                uid:uid,
                                url:allUrl,
                            },
                            dataType:'json',
                            beforeSend:function(){
                                
                            },
                            success:function(data){
                                if(data.code ==500){
                                    layer.msg('手机号未绑定，请绑定手机号 ',{
                                        time:1000,
                                        end:function () {
                                            location.href = "/bind_mobile_page?url="+allUrl
                                        }
                                    })
                                }
                             }, 
                        });
                    },1000);
                }
           
        },
        show_form:function(){

        }
    }
    window.bind_mobile = bind_mobile;
    $(function(){
        bind_mobile.init();
    });
}(jQuery,window));
