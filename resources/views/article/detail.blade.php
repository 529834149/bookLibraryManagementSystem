@extends('layouts.app')
@section('title', '博客自媒体首页')



@section('content')
 <div class="micronews-container micronews-details-container w1000">
    <div class="layui-fluid">
      <div class="layui-row">
        <div class="layui-col-xs12 layui-col-sm12 layui-col-md8">
          <div class="main">
            <div class="title">
              <h3>王健林29亿出售美国加州地块</h3>
              <div class="b-txt">
                <span class="label">财经</span>
                <span class="icon">
                  <i class="layui-icon layui-icon-radio"></i>
                  <b>3002</b>人
                </span>
                <a href="#message">
                <span class="icon message" >
                  <i class="layui-icon layui-icon-dialogue"></i>
                  <b>500</b>条
                </span>
                </a>
                <span class="icon time">
                  <i class="layui-icon layui-icon-log"></i>
                  10分钟前
                </span>
              </div>
            </div>
            <div class="article">
              <p class="source">来源：<span>澎湃新闻网</span></p>
              <p class="original-tit mt30">原标题：<span>王健林29亿元出售美国加州地块，万达海外只剩一个地产项目</span></p>
              <p>王健林又卖掉了万达在海外的一个项目。11月16日，据《华尔街日报》报道，大连万达集团同意出售位于美国加州比弗利山庄一块地块。伦敦房地产公司Cain International的首席执行长Jonathan Goldstein称，该公司和Alagem Capital Group的合资企业已经同意收购这块八英亩的地皮，据知情人士，买家已经同意支付逾4.2亿美元（约合29.1亿元）。</p>
              <div class="img-box"><img onclick="javascript:window.open(this.src)" src="/default/res/static/images/news_imgbig.jpg"></div>
              <p class="mt30">今年年初，万达聘请仲量联行帮助出售该地块。据《华尔街日报》当时的报道，潜在的投标者最初被告知，万达希望的最低报价为6亿美元，但这一指导价后来降至5亿-6亿美元。由于报价达不到万达的要求，万达似乎在重新考虑该事项。此外，万达已经为这个项目支付高达8000万美元的费用和税款，但项目却迟迟未开工。</p>
              <p class="mt30">经纪商称，这宗地块被万达称为比佛利山庄一号的空置地块时洛杉矶地区高档开发地块之一。</p>
              <p class="mt30">大连万达集团的官网上曾在2015年7月9日发表过一篇关于洛杉矶比弗利山项目的报道。当时引用了《洛杉矶时报》的报道称，该报对万达集团这一新项目给予了积极的评价，“万达洛杉矶比弗利山项目将作为其进军好莱坞重要的第一步，有望帮助中国进入好莱坞的电影业，并在国际范围推广中国文化。”</p>
              <div class="share-title">
                <span class="txt">分享:</span>
                <a href="#">
                  <i class="icon layui-icon layui-icon-login-wechat"></i>
                </a>
                <a href="#">
                  <i class="icon layui-icon layui-icon-login-weibo"></i>
                </a>
                <a href="#">
                  <i class="icon layui-icon layui-icon-login-qq"></i>
                </a>
                <button class="layui-btn Collection">
                  ❤<span>已收藏</span>
                </button>
              </div>
            </div>
            <div class="leave-message" id="message">
              <div class="tit-box">
                <span class="tit">网友跟帖</span>
                <span class="num"><b>500</b>条</span>
              </div>
              <div class="content-box">
                <div class="tear-box">
                  <a href="#"><img src="/default/res/static/images/header_img1.png"></a>
                  <form class="layui-form">
                    <div class="layui-form-item layui-form-text">
                      <div class="layui-input-block">
                        <textarea id="onInput"  placeholder="请输入内容" class="layui-textarea"></textarea>
                      </div>
                    </div>
                    <div class="layui-form-item">
                      <div class="layui-input-block" style="text-align: right;">
                        <div class="message-text">
                          <div class="txt">
                            
                          </div>
                        </div>
                        <button type="button" class="layui-btn micronews-details-Publish">发表</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="ulCommentList">
                  <div class="liCont">
                    <a href="#"><img src="/default/res/static/images/header_img1.png"></a>
                    <div class="item-cont">
                      <div class="cont">
                        <p><span class="name">我是锦鲤</span><span class="time">1小时前</span></p>
                        <p class="text">万达似乎在重新考虑该事项。此外，万达已经为这个项目支付高达8000万美元的费用和税款，但项目却迟迟未开工。</p>
                      </div>
                    </div>
                  </div>
                  <div class="liCont">
                    <a href="#"><img src="/default/res/static/images/header_img1.png"></a>
                    <div class="item-cont">
                      <div class="cont">
                        <p><span class="name">我是锦鲤</span><span class="time">1小时前</span></p>
                        <p class="text">万达似乎在重新考虑该事项。此外，万达已经为这个项目支付高达8000万美元的费用和税款，但项目却迟迟未开工。</p>
                      </div>
                    </div>
                  </div>
                  <div class="liCont">
                    <a href="#"><img src="/default/res/static/images/header_img1.png"></a>
                    <div class="item-cont">
                      <div class="cont">
                        <p><span class="name">我是锦鲤</span><span class="time">1小时前</span></p>
                        <p class="text">万达似乎在重新考虑该事项。此外，万达已经为这个项目支付高达8000万美元的费用和税款，但项目却迟迟未开工。</p>
                      </div>
                    </div>
                  </div>
                  <div class="liCont">
                    <a href="#"><img src="/default/res/static/images/header_img1.png"></a>
                    <div class="item-cont">
                      <div class="cont">
                        <p><span class="name">我是锦鲤</span><span class="time">1小时前</span></p>
                        <p class="text">万达似乎在重新考虑该事项。此外，万达已经为这个项目支付高达8000万美元的费用和税款，但项目却迟迟未开工。</p>
                      </div>
                    </div>
                  </div>
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
                  <a href="details.html"><img src="/default/res/static/images/news_img15.jpg" width="100%"> </a>
                  <li class="list">
                  
                      <a href="#">南非金砖会议再造十年辉煌</a>
              
                  </li>
                  <li class="list">
            
                      <a href="#">中流击水 奋楫者进_中共十九大</a>
              
                  </li>
                  <li class="list">
            
                      <a href="#">你好！新时代_2018全国两会</a>
              
                  </li>
                  <li class="list">
            
                      <a href="#">“日销40万”外卖料包厂被曝光，制作过程令人作呕</a>
              
                  </li>
                  <a href="details.html"><img src="/default/res/static/images/news_img16.jpg" width="100%"></a>
                  <li class="list">
            
                      <a href="#">韩国送的200吨橘子该怎么分？</a>
              
                  </li>
                  <li class="list">
            
                      <a href="#">中流击水 奋楫者进_中共十九大</a>
              
                  </li>
                  <li class="list">
            
                      <a href="#">你好！新时代_2018全国两会</a>
              
                  </li>
                  <li class="list">
            
                      <a href="#">“日销40万”外卖料包厂被曝光，制作过程令人作呕</a>
              
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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

@stop
@section('footer')
   @include('layouts._footer')
@endsection