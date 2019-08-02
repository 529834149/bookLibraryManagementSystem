@extends('layouts.app')
@section('title', '博客自媒体首页')



@section('content')
 <div class="micronews-container micronews-details-container w1000">
    <div class="layui-fluid">
      <div class="layui-row">
        <div class="layui-col-xs12 layui-col-sm12 layui-col-md8">
          <div class="main">
            <div class="title">
              <h3>{{$article['article_title']}}</h3>
              <div class="b-txt">
                <span class="label">{{$article['cate_name']}}</span>
                <span class="icon">
                  <i class="layui-icon layui-icon-radio"></i>
                  <b>{{$article['click']}}</b>人
                </span>
                <a href="#message">
                <span class="icon message" >
                  <i class="layui-icon layui-icon-dialogue "></i>
                  <b class="nums">{{count($comments_data)}}</b>条
                </span>
                </a>
                <span class="icon time">
                  <i class="layui-icon layui-icon-log"></i>
                   {{$article['created_at']}}
                </span>
              </div>
            </div>
            <div class="article">
              @if($article['is_reproduce'] =="n")
                <p class="source">来源：<span> 原创</span></p>
              @else
                <p class="source">来源：<span> {{$article['http_url']}}</span></p>
              @endif
            
              <p class="original-tit mt30">原标题：<span>{{$article['article_title']}}</span></p>
              <pre style="color: #666;white-space: normal;background-color: #f5f5f5;">{{$article['article_summary']}}</pre>
              <p>{!!$article['article_body']!!}</p>
              <div class="share-title">
                
                <button class="layui-btn Collection">
                    @guest
                        ❤<span id="collection">收藏</span>
                    @else
                        @if($is_coll)
                            ❤<span id="collection">已收藏</span>
                        @else
                             ❤<span id="collection">收藏</span>
                        @endif
                    @endguest
                   
                </button>
              </div>
            </div>
            <div class="leave-message" id="message">
              <div class="tit-box">
                <span class="tit">网友跟帖</span>
                <span class="num"><b class="nums1">{{count($comments_data)}}</b>条</span>
              </div>
                
                <div class="content-box">
                <div class="tear-box">
                    @guest
                        <!-- <a href="/login" style="z-index: 9999999;cursor:pointer;" > -->
                            <!-- <a href="#"><img src="/default/res/static/images/header_img1.png"></a> -->
                            <form class="layui-form">
                                <div class="layui-form-item layui-form-text">
                                    <div class="layui-input-block">
                                        <a href="/login" style="cursor:pointer;"><textarea style="cursor:pointer;" readonly="readonly" id="onInput"  placeholder="请输入内容" class="layui-textarea"></textarea></a>
                                    </div>
                                </div>
                                <div class="kuang">
                                    <!-- <textarea class="pp"></textarea> -->
                                    <p class="ww">
                                        <a href="/register">注册</a>
                                        <a href="/login">登录</a>
                                    </p>
                                </div>
                                <style>
                                    .pp{
                                       
                                        height: 50px;
                                        position: absolute;
                                        padding: 0;
                                        margin: 0;
                                    }
                                    .ww{
                                        background: #f1f1f1;
                                        
                                        height: 50px;
                                        position: relative;
                                        text-align: center;
                                        line-height: 50px;
                                    }
                                    .ww a{
                                        background: #e7e3f0;
                                        border-radius: 3px;
                                        padding:5px 20px;
                                        margin: 0 10px;
                                        font-size: 14px;
                                    }
                                </style>
                            </form>
                        <!-- </a> -->
                    @else
                        <a href="#"><img src="/default/res/static/images/header_img1.png"></a>
                        <form class="layui-form">
                            <div class="layui-form-item layui-form-text">
                                <div class="layui-input-block">
                                    <textarea id="onInput" name="editor_content"  placeholder="请输入内容" class="layui-textarea"></textarea>
                                </div>
                                <input type="hidden" name="uid" value="{{Auth::id() }}">
                                <input type="hidden" name="aid" value="{{$article['id']}}">
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block" style="text-align: right;">
                                    <div class="message-text">
                                        <div class="txt">
                                        
                                        </div>
                                    </div>
                                    <button type="button" class="layui-btn micronews-details-Publish" id="editor_button">发表</button>
                                </div>
                            </div>
                        </form>
                    @endguest
                </div>

                <div class="ulCommentList">
                    @if(count($comments_data) > 0)
                        @foreach($comments_data as $v)
                        <div class="liCont">
                            <a href="#"><img src="/default/res/static/images/header_img1.png"></a>
                            <div class="item-cont">
                                <div class="cont">
                                    <p>
                                        <span class="name">
                                            @if($v['realname'])
                                                {{$v['realname']}}
                                            @else
                                            匿名
                                            @endif

                                        </span>
                                        <span class="time">{{ \Carbon\Carbon::parse($v['created_at'])->diffForHumans() }}</span></p>
                                    <p class="text">{{$v['content']}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="liCont" id="nocomm">
                            <a href="#"></a>
                            <div class="item-cont">
                                <div class="cont">
                                    <p><span class="name"></span><span class="time"></span></p>
                                    <p class="text">暂无评论</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div id="micronews-details-test" style="text-align: center;"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="layui-col-xs12 layui-col-sm12 layui-col-md4">
            <div class="popular-info popular-info-tog">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <h3>文章推荐</h3>
                    </div>
                    <div class="layui-card-body">
                        <ul class="list-box">
                            @foreach($publish_article as $v)
                                @if ($loop->first)
                                    <a href="/article/{{$v['id']}}"><img src="/default/res/static/images/news_img16.jpg" width="300rem" height="138rem"></a>
                                @endif
                                <li class="list">
                                    <a href="/article/{{$v['id']}}">{{$v['article_title']}}</a>
                                </li>
                                @if ($loop->last)
                                    <a href="/article/{{$v['id']}}"><img src="/default/res/static/images/news_img16.jpg" width="300rem" height="138rem"></a>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/default/res/layui/layui.js"></script>
    <script type="text/javascript" src="/default/js/editor_article.js"></script>
@stop
@section('footer')
   @include('layouts._footer')
@endsection