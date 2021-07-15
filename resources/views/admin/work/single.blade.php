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

    img {
        max-width: 500px;
        width: 100%;
    }

    .row.intro {
        margin-top: 30px;
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
                        <h5 class="m-b-10">詳細な開発実績</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/works">開発実績</a></li>
                        <li class="breadcrumb-item"><a href="#!">詳細な開発実績</a></li>
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
                    <h5>詳細な開発実績</h5>
                </div>
                <div class="card-body">
                    <p class="category">ステータス</p>
                    <p>{{$work->status}}</p>
                    <p class="category">投稿日時</p>
                    <p>{{ isset($work->postDateTime) ? date("Y.m.d D", strtotime($work->postDateTime)) : date("Y.m.d D", strtotime($work->created_at)) }}</p>
                    <p class="category">タイトル</p>
                    <h2>{{$work->title}}</h2>
                    <p class="category">タグ</p>
                    <input type="text" value="{{$work->tags}}" data-role="tagsinput" />
                    <p class="category">アイキャッチ画像</p>
                    <img src="{{ asset('upload/work/'.$work->img)}}" alt="">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="category">案件種別</p>
                            <p>{{$work->item_type}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="category">言語</p>
                            <p>{{$work->language}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="category">タイプ</p>
                            <p>{{$work->type}}</p>
                        </div>
                    </div>
                    <p class="category">概要</p>
                    <div class="content">{!! $work->overview !!}</div>
                    <p class="category">Meta Title</p>
                    <p>{{$work->metaTitle}}</p>
                    <p class="category">Meta Description</p>
                    <p>{{$work->metaDescription}}</p>
                    @if(isset($work->introduction->img1))
                    <div class="row intro">
                        <div class="col-md-3">
                            <img src="{{ asset('upload/work/intro/'.$work->introduction->img1)}}" alt="">
                        </div>
                        <div class="col-md-9">
                            {{$work->introduction->text1}}
                        </div>
                    </div>
                    @endif
                    @if(isset($work->introduction->img2))
                    <div class="row intro">
                        <div class="col-md-3">
                            <img src="{{ asset('upload/work/intro/'.$work->introduction->img2)}}" alt="">
                        </div>
                        <div class="col-md-9">
                            {{$work->introduction->text2}}
                        </div>
                    </div>
                    @endif
                    @if(isset($work->introduction->img3))
                    <div class="row intro">
                        <div class="col-md-3">
                            <img src="{{ asset('upload/work/intro/'.$work->introduction->img3)}}" alt="">
                        </div>
                        <div class="col-md-9">
                            {{$work->introduction->text3}}
                        </div>
                    </div>
                    @endif
                    @if(isset($work->introduction->img4))
                    <div class="row intro">
                        <div class="col-md-3">
                            <img src="{{ asset('upload/work/intro/'.$work->introduction->img4)}}" alt="">
                        </div>
                        <div class="col-md-9">
                            {{$work->introduction->text4}}
                        </div>
                    </div>
                    @endif
                    @if(isset($work->introduction->img5))
                    <div class="row intro">
                        <div class="col-md-3">
                            <img src="{{ asset('upload/work/intro/'.$work->introduction->img5)}}" alt="">
                        </div>
                        <div class="col-md-9">
                            {{$work->introduction->text5}}
                        </div>
                    </div>
                    @endif
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