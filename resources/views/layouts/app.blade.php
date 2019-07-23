<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', '玉梅金香')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="/default/res/layui/css/layui.css">
  <link rel="stylesheet" type="text/css" href="/default/res/static/css/main.css">

</head>
<body class="micronews {{ route_class() }}-page ">
  <!-- 首页导航 -->
  @include('layouts._header')
  <!-- 轮播设置 -->
  @include('layouts._carousel')
  <!-- 文章内容 -->
  @yield('content')
 
  
  <!-- content-laytpl -->
  <script id="demo" type="text/html">
    @verbatim
      {{#  layui.each(d.itemCont, function(index, item){ }}
        <div class="item">
          {{# if(item.img){ }}
          <a href="details.html">
            <img src="{{item.img}}">
          </a>
          {{#  } }}  

          <div class="item-info">
            <h4><a href="details.html">{{item.title}}</a></h4>
            <div class="b-txt">
              <span class="label">{{item.label}}</span>
              <span class="icon message">
                <i class="layui-icon layui-icon-dialogue"></i>
                {{item.message}}
              </span>
              <span class="icon time">
                <i class="layui-icon layui-icon-log"></i>
                {{item.time}}
              </span>
            </div>
          </div>
        </div>
      {{#  }); }}
  @endverbatim
  </script>
  <!-- end-content-laytpl-->


  @include('layouts._footer')
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="/default/res/layui/layui.js"></script>

  <script>
    layui.config({
      base: '/default/res/static/js/' 
    }).use('index',function(){
      var index = layui.index;
      index.banner()
      index.seachBtn()
      index.arrowutil()
    });
  </script>
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</body>
</html>