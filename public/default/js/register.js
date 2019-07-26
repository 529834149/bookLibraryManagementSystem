;(function($,window){
    var register = {
        init:function(){
            //this.show_exam_status();
			//is_show_status 状态是否存在
			//this.validation();//表单验证
			this.submitCompletion();
			this.clickMsg();
        } ,
        //点击发送短信
        clickMsg:function(){
        	$('#veriCodeBtn').click(function(){
        		register.sendCode();
        	})
        },
		submitCompletion:function(){
			$("form").submit( function () {
				if(register.validation()){
				  	var mobile = $('input[name="mobile"]').val();
				  	var password = $('input[name="password"]').val();
				  	var q_password = $('input[name="q_password"]').val();
				  	var code = $('input[name="code"]').val();
				  	var key = $('input[name="sendCode_key"]').val();
					//提交表单
					$.ajax({
					    type:'post',
					    url:'/register',
					    data:{
					        mobile:mobile,
					        password:password,
					        q_password:q_password,
					        mobile:mobile,
					        code:code,
					        key:key,
					    },
					    dataType:'json',
					    beforeSend:function(){
					        // 加载层
					        var index = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
					    },
					    success:function(data){
							if(data.code ==200){
								layer.closeAll();
								layer.msg('注册成功，请登录',{
	                            	time:1000,
	                           	 	end:function () {
	                            		location.href = "/login"
	                            	}
								})
								
							}else{
								alert(data.message)
							}
						 },	
					});

				}
				return false;

			} );
		},
		//点击按钮
		//表单验证
		validation:function(){
				//手机号
	            var mobile = $('input[name="mobile"]').val();
	            var myreg = /^[1][3,4,5,6,7,8][0-9]{9}$/;  
	            if (!myreg.test(mobile)) {
	            	
					layer.msg('手机号格式不正确',{
				        icon:5
				    });
	            	return false;
	            }
	            //密码 8到16位数字与密码组合的密码
	            var password = $('input[name="password"]').val();
	            var q_password = $('input[name="q_password"]').val();
	            if(password ==q_password){
	            	var pwdReg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/;
            	 	if(!pwdReg.test(password)){
		                layer.msg('请设置8~16位数字字母组成的密码',{
					        icon:5
					    });
					    return false;
		            }
	            }else{
	            	layer.msg('用户密码和确认密码不相同',{
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
	           
				return true;
	        
		},
		sendCode:function(){
			var vercode	 = 0;
			var time = 120;
			var flag = true;   //设置点击标记，防止60内再次点击生效
				//发送验证码
		        $('#veriCodeBtn').click(function(){
		            $(this).attr("disabled",true);
					var mobile = $('#mobile').val();
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
		                            url : 'send',
		                            data : {
		                                "mobile" : mobile
		                            },
		                            dataType:"json",
		                            success : function(data) {

		                                if(data.hasOwnProperty('key')){
		                                    document.getElementById("veriCodeBtn").value = "已发送";
	                                     	document.getElementById("sendCode_key").value =data.key;//将key复制在input中
										}else {
		                                    flag = true;
		                                    time = 120;
		                                    clearInterval(timer);
		                                }
		                            }
		                        });
							}else if(time == 0){
		                        $("#veriCodeBtn").removeAttr("disabled");
                                document.getElementById("veriCodeBtn").value = "免费获取验证码";
		                        clearInterval(timer);
		                        time = 120;
		                        flag = true;
		                    }else {
		                         document.getElementById("veriCodeBtn").value = time+" s 重新发送";
		                        time--;
		                    }
		                },1000);
					}
		 
				});
		// 	let count = 120;
		//     const countDown = setInterval(() => {
		//        if (count === 0) {
		// 	       $('#veriCodeBtn').val('重新发送').removeAttr('disabled');
		// 	       $('#veriCodeBtn').css({
		// 	           background: '#ff9400',
		// 	           color: '#fff',	
		//            });
		//            clearInterval(countDown);
		//       } else {
		//           $('#veriCodeBtn').attr('disabled', true);
		//           $('#veriCodeBtn').css({
		//              background: 'rgb(216, 216, 216)',
		//              color: '#707070',
		//           });
		//           $('#veriCodeBtn').val(count + '秒后可重新获取');
		//       }
		//       count--;
		//      }, 1000);

		}
		
    }
    window.register = register;
    $(function(){
        register.init();
    });
}(jQuery,window));
