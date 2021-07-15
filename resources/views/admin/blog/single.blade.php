@extends('layouts.admin')

@push('styles')
<style>
    .category {
        margin-top: 20px;
        font-size: 15px;
        font-weight: bold;
        color: #4680ff;
    }

    .content {
        border: 1px solid gray;
        border-radius: 5px;
        padding: 10px;
    }

    .blog_main_img {
        width: 50%;
        margin: auto;
    }
    .blog_main_img img {
        width: 100%;
    }
</style>
@endpush
@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">詳細なブログ</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/blogs">ブログ</a></li>
                        <li class="breadcrumb-item"><a href="#!">詳細なブログ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>詳細なブログ</h5>
                </div>
                <div class="card-body">
                    <p class="category">ステータス</p>
                    <p>{{$blog->status}}</p>
                    <p class="category">投稿日時</p>
                    <p>{{ isset($blog->postDateTime) ? date("Y.m.d D", strtotime($blog->postDateTime)) : date("Y.m.d D", strtotime($blog->created_at)) }}</p>
                    <p class="category">タイトル</p>
                    <h2>{{$blog->title}}</h2>
                    <p class="category">タグ</p>
                    <input type="text" value="{{$blog->tags}}" data-role="tagsinput" />
                    <p class="category">アイキャッチ画像</p>
                    <figure class="blog_main_img">
                        <img src="{{ asset('upload/blog/'.$blog->img)}}" alt="">
                    </figure>
                    <p class="category">コンテンツ</p>
                    <div class="content">{!! $blog->detail !!}</div>
                    <p class="category">Meta Title</p>
                    <p>{{$blog->metaTitle}}</p>
                    <p class="category">Meta Description</p>
                    <p>{{$blog->metaDescription}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/js/plugins/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        ClassicEditor.create(document.querySelector('#classic-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush