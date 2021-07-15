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
        max-width: 700px;
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
                        <h5 class="m-b-10">詳細なサービス</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/services">サービス</a></li>
                        <li class="breadcrumb-item"><a href="#!">詳細なサービス</a></li>
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
                    <h5>詳細なサービス</h5>
                </div>
                <div class="card-body">
                    <p class="category">ステータス</p>
                    <p>{{$service->status}}</p>
                    <p class="category">投稿日時</p>
                    <p>{{ isset($service->postDateTime) ? date("Y.m.d D", strtotime($service->postDateTime)) : date("Y.m.d D", strtotime($service->created_at)) }}</p>
                    <p class="category">タイトル</p>
                    <h2>{{$service->title}}</h2>
                    <div class="row">
                        <div class="col-md-12 mb-3 textarea">
                            {{$service->top}}
                        </div>
                        <div class="col-md-5">
                            <img src="{{ asset('upload/service/'.$service->img)}}" alt="">
                        </div>
                        <div class="col-md-7 textarea">
                            {{$service->main}}
                        </div>
                    </div>
                    <p class="category">Meta Title</p>
                    <p>{{$service->metaTitle}}</p>
                    <p class="category">Meta Description</p>
                    <p>{{$service->metaDescription}}</p>
                    <p class="category">カスタマイズ</p>
                    <p class="textarea">{{$service->customizable}}</p>
                    
                    <p class="category">流れ</p>
                    @if($service->flow->text1 != '')
                    <p>{{$service->flow->text1}}</p>
                    <div class="row mb-5">
                        @if(isset($service->flow->img1_1))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img1_1)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img1_2))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img1_2)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img1_3))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img1_3)}}" alt="">
                        </div>
                        @endif
                    </div>
                    @endif
                    @if($service->flow->text2 != '')
                    <p>{{$service->flow->text2}}</p>
                    <div class="row mb-5">
                        @if(isset($service->flow->img2_1))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img2_1)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img2_2))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img2_2)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img2_3))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img2_3)}}" alt="">
                        </div>
                        @endif
                    </div>
                    @endif
                    @if($service->flow->text3 != '')
                    <p>{{$service->flow->text3}}</p>
                    <div class="row mb-5">
                        @if(isset($service->flow->img3_1))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img3_1)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img3_2))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img3_2)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img3_3))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img3_3)}}" alt="">
                        </div>
                        @endif
                    </div>
                    @endif
                    @if($service->flow->text4 != '')
                    <p>{{$service->flow->text4}}</p>
                    <div class="row mb-5">
                        @if(isset($service->flow->img4_1))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img4_1)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img4_2))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img4_2)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img4_3))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img4_3)}}" alt="">
                        </div>
                        @endif
                    </div>
                    @endif
                    @if($service->flow->text5 != '')
                    <p>{{$service->flow->text5}}</p>
                    <div class="row mb-5">
                        @if(isset($service->flow->img5_1))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img5_1)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img5_2))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img5_2)}}" alt="">
                        </div>
                        @endif
                        @if(isset($service->flow->img5_3))
                        <div class="col-md-4">
                            <img src="{{ asset('upload/service/flow/'.$service->flow->img5_3)}}" alt="">
                        </div>
                        @endif
                    </div>
                    @endif
                    <p class="category">シーン</p>
                    @if(isset($service->scene_id) && $service->scene->title1 != '')
                    <h5>{{$service->scene->title1}}</h5>
                    <p class="textarea">{{$service->scene->text1}}</p>
                    @endif
                    @if(isset($service->scene_id) && $service->scene->title2 != '')
                    <h5>{{$service->scene->title2}}</h5>
                    <p class="textarea">{{$service->scene->text2}}</p>
                    @endif
                    @if(isset($service->scene_id) && $service->scene->title3 != '')
                    <h5>{{$service->scene->title3}}</h5>
                    <p class="textarea">{{$service->scene->text3}}</p>
                    @endif
                    @if(isset($service->scene_id) && $service->scene->title4 != '')
                    <h5>{{$service->scene->title4}}</h5>
                    <p class="textarea">{{$service->scene->text4}}</p>
                    @endif
                    @if(isset($service->scene_id) && $service->scene->title5 != '')
                    <h5>{{$service->scene->title5}}</h5>
                    <p class="textarea">{{$service->scene->text5}}</p>
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