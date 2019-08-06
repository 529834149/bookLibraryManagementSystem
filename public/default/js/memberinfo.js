;(function($,window){
    var bind_mobile = {
        init:function(){
            //this.show_exam_status();
			//is_show_status 状态是否存在
			//this.validation();//表单验证
			this.submit_botton();//修改个人资料
            this.sendCode();// 发送验证码
        } ,
        //表单提交
        submit_botton:function(){
            $('#submit_botton').click(function(){
                var uid =  $("input[name='uid']").val();
                var code = $("input[name='code']").val();
                var mobile = $('input[name="mobile"]').val();
                var sendCode_key = $('input[name="sendCode_key"]').val(); 
                var myreg = /^[1][3,4,5,6,7,8][0-9]{9}$/;  
                if (!myreg.test(mobile)) {
                    layer.msg('手机号格式不正确',{
                        icon:5
                    });
                    return false;
                }
                 //验证码
                var code = $('input[name="code"]').val();
                var codereg=/^\d{4}$/;
                if (!codereg.test(code)) {
                    layer.msg('验证码格式不正确',{
                        icon:5
                    });
                    return false;
                }
                //提交表单
                $.ajax({
                    type:'post',
                    url:'/bind_mobile',
                    data:{
                        mobile:mobile,
                        key:sendCode_key,
                        code:code,
                        uid:uid,
                    },
                    dataType:'json',
                    beforeSend:function(){
                        // 加载层
                        var index = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                    },
                    success:function(data){
                        if(data.code ==200){
                            layer.closeAll();
                            layer.msg('修改成功',{
                                time:3000,
                                end:function () {
                                    location.reload();
                                }
                            })
                            
                        }else{
                            layer.closeAll();
                            layer.msg(data.message,{
                                time:3000,
                                // end:function () {
                                //     location.reload();
                                // }
                            })
                        }
                     }, 
                });

            })
        },
        //发送短信验证码
        sendCode:function(){
            var vercode  = 0;
            var time = 120;
            var flag = true;   //设置点击标记，防止60内再次点击生效
                //发送验证码
                $('#codenames').click(function(){
                    $(this).attr("disabled",true);
                    var mobile = $('input[name="mobile"]').val();
                    if(!mobile){
                        layer.msg('请输入手机号',{
                            icon:5
                        });
                        return false;
                    }
                    if(flag){
                        var timer = setInterval(function () {
                            if(time == 120 && flag){
                                flag = false;
                                $.ajax({
                                    type : 'post',
                                    url : '/send',
                                    data : {
                                        "mobile" : mobile
                                    },
                                    dataType:"json",
                                    success : function(data) {
                                        if(data.hasOwnProperty('key')){
                                            $('#codenames').html('已发送')
                                            // document.getElementById("codenames").value = "已发送";
                                            document.getElementById("sendCode_key").value =data.key;//将key复制在input中
                                        }else {
                                            flag = true;
                                            time = 120;
                                            clearInterval(timer);
                                        }
                                    }
                                });
                            }else if(time == 0){
                                $("#codenames").removeAttr("disabled");
                                $('#codenames').html('免费获取验证码')
                                // document.getElementById("codenames").value = "免费获取验证码";
                                clearInterval(timer);
                                time = 120;
                                flag = true;
                            }else {
                                  $('#codenames').html(time+" s 重新发送");
                                 // document.getElementById("codenames").value = time+" s 重新发送";
                                time--;
                            }
                        },1000);
                    }
         
                });
        },
        show_form:function(){

        }
    }
    window.bind_mobile = bind_mobile;
    $(function(){
        bind_mobile.init();
    });
}(jQuery,window));
