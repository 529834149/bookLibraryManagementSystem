@extends('layouts.app')
@section('title', '个人中心')


@section('content')
<div class="container">
    <div class="col-md-10 offset-md-1">
        <div class="card ">
            <div class="card-body">
              <h2 class="">
                <i class="far fa-edit"></i>
               
                创建文章
              </h2>
              <hr>
                <form action="/article" method="POST" accept-charset="UTF-8">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <div class="mt-2"><b>有错误发生：</b></div>
                            <ul class="mt-2 mb-2">
                            @foreach ($errors->all() as $error)
                                <li><i class="layui-icon layui-icon-close">&#x1006;</i>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">

                        <input class="form-control" type="text" name="article_title" value="" placeholder="文章标题" required />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="author" value="" placeholder="文章作者" required />
                    </div>
                    
                    <div class="form-group">
                        <select class="form-control" name="category_id" required>
                            <option value="" hidden disabled selected>请选择分类</option>
                            @foreach ($get_cate as $value)
                            <option value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="article_body" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required></textarea>
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@stop
@section('footer')
   @include('layouts._footer')
@endsection