;(function($,window){
    var bind_mobile = {
        init:function(){
            //this.show_exam_status();
			//is_show_status 状态是否存在
			//this.validation();//表单验证
			this.is_bind_mobile();
        } ,
        //点击发送短信
        is_bind_mobile:function(){
        	var uid = $('input[name="login_uid"]').val();
            if(uid){
                $.ajax({
                    type:'post',
                    url:'/is_bind',
                    data:{
                        uid:uid,
                    },
                    dataType:'json',
                    beforeSend:function(){
                        
                    },
                    success:function(data){
                        if(data.code ==500){
                            
                        }
                     }, 
                });
            }
        },
    }
    window.bind_mobile = bind_mobile;
    $(function(){
        bind_mobile.init();
    });
}(jQuery,window));
