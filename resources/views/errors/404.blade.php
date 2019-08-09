<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><img src="http://demo.demohuo.top/modals/30/3093/demo/files/notfound.gif"></div>
                <div class="row"  id="time" >
                	<!-- <div>页面跳转倒计时:<span class="second"></span></div> -->
                	<input id="timer" type="button" value="开始跳转10秒" onclick="btnClick();"/>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    	<script type="text/javascript" >
	        var time = 10; //时间秒，自己调整!
	        function CountDown() {
	                 if (time >= 0) {
	                     msg = "开始跳转" + time + "秒";
	                     document.all["timer"].value = msg;
	                     --time;
	                 } else{
	                     clearInterval(timer);
	                     window.location.href = "/";//在原来的窗体中直接跳转用
	                 }
	        }
	        timer = setInterval("CountDown()", 1000);

	        function btnClick() {
	            window.location.href = "/";//在原来的窗体中直接跳转用
	            //window.open("https://www.cnblogs.com/weijuanran/");//打开新的窗口页
	        }
	    </script>

    </body>
</html>