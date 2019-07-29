@extends('layouts.app')
@section('title', '博客自媒体首页')

@section('carousel')
  @include('layouts._carousel') 
@endsection

@section('content')
<div class="micronews-container w1000">
    <div class="layui-fluid">
        <div class="layui-row">
            <div class="layui-col-xs12 layui-col-sm12 layui-col-md8">
                <div class="main">
                    <div class="list-item" id="LAY_demo2">
                        @foreach($article_list as $v)
                            @if($v->image)
                                <div class="item">   
                                    <a href="/article/{{$v->id}}">
                                        <img width="160" height="100" src="/public/uploads/{{$v->image}}">
                                    </a>
                                    <div class="item-info">
                                        <h4><a href="article/{{$v->id}}">{{$v->article_title}}</a></h4>
                                        <div class="b-txt">
                                            <span class="label"><a style="color:#E6F8EC;" href="/category/{{$v->id}}/{{$v->short_name}}">{{$v->cate_title}}</a></span>
                                            <span class="icon message">
                                              <i class="layui-icon layui-icon-dialogue"></i>
                                              {{$v->post_num}}条
                                            </span>
                                            <span class="icon time">
                                              <i class="layui-icon layui-icon-log"></i>
                                                 {{ \Carbon\Carbon::parse($v->created_at)->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="item">   
                                    <div class="item-info">
                                        <h4><a href="/article/{{$v->id}}">{{$v->article_title}}</a></h4>
                                        <div class="b-txt">
                                            <span class="label">{{$v->cate_title}}</span>
                                            <span class="icon message">
                                              <i class="layui-icon layui-icon-dialogue"></i>
                                               {{$v->post_num}}条
                                            </span>
                                            <span class="icon time">
                                              <i class="layui-icon layui-icon-log"></i>
                                              {{ \Carbon\Carbon::parse($v->created_at)->diffForHumans() }}

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        
                        @endforeach
                       
                    </div>
                </div>
            </div>
            <div class="layui-col-xs12 layui-col-sm12 layui-col-md4">
                <div class="popular-info">
                    <div class="layui-card">
                        <div class="layui-card-header"><h3>热门资讯</h3></div>
                            <div class="layui-card-body">
                            <ul class="list-box">
                                @foreach($hot_article as $v)
                                <li class="list">
                                    <a href="/article/{{$v->id}}">{{$v['article_title']}}</a><i class="heat-icon"></i>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
   @include('layouts._footer')
@endsection