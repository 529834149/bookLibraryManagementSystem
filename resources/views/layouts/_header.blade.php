 <div class="micronews-header-wrap">
    <div class="micronews-header w1000 layui-clear">
      <h1 class="logo">
        <a href="index.html">
          <img src="/public/default/res/static/images/LOGO.png" width="66" style="margin-top: -27px" alt="logo">
          <span class="layui-hide">LOGO</span>
        </a>
      </h1>
      <p class="nav" id="siteMenu">
          <a href="/" class="active">首页</a>
        @foreach($navs as $v)
          <a href="/category/{{$v['id']}}/{{$v['short_name']}}" >{{$v['title']}}</a>
        @endforeach
          <a href="/member/center" class="">关于</a>
       <!--  <a href="list.html">24小时</a>
        <a href="list.html">技术闻言</a>
        <a href="list.html">资讯</a>
        <a href="list.html">文档在线</a>
        <a href="list.html">关于我</a> -->
      </p>
      <!-- <div class="search-bar">
        <form class="layui-form" action="">
          <div class="layui-form-item">
            <div class="layui-input-block">
              <input type="text" name="title" placeholder="搜索你要的内容" autocomplete="off" class="layui-input">
              <button class="layui-btn search-btn"  formnovalidate><i class="layui-icon layui-icon-search"></i></button>
            </div>
          </div>
        </form>
      </div> -->
      <div class="login">
        @guest
           <a href="{{ route('login') }}">  
            登录
          </a>
        @else
      
         <a href="">  
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您确定要退出吗？');">
                  {{ csrf_field() }}
                  <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                </form>
          </a>
        @endguest
       
        
       <!-- <a href="login.html"> -->
        <!-- <img src="../res/static/images/header.png" style="width: 36px; height: 36px;"> -->
       <!-- </a> -->
      </div>
      <div class="menu-icon">
        <i class="layui-icon layui-icon-more-vertical"></i>
      </div>
      <div class="mobile-nav">
        <ul class="layui-nav" lay-filter="">
          <li class="layui-nav-item layui-this"><a href="/">首页</a></li>
          @foreach($navs as $v)
            <li class="layui-nav-item">
                <a href="/category/{{$v['id']}}/{{$v['short_name']}}">{{$v['title']}}</a>
                
          </li>
          @endforeach
        </ul>
      </div>  
    </div>
  </div>

