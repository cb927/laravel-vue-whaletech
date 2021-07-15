@extends('layouts.app')

@section('meta_title')
{{$service->title}}
@endsection

@section('meta_description')
{{$service->meta_description ? $service->meta_description : $service->top}}
@endsection

@section('content')
<a href="/recruit" class="fixed-link">採用情報</a>

<banner title="{{$service->title}}"></banner>
<breadcrumb container="container" name="提供サービス" subname="{{$service->title}}" link="services"></breadcrumb>

<service-overview :service="{{$service}}"></service-overview>
@if(isset($service->flow->text1))
<section class="service-flow container">
    <div class="title-underline">操作の流れ</div>
    <div class="flow__main">
        @for($i = 1; $i < 6; $i++)
        @if($service->flow['text'.$i])
        <div class="flow__item">
            <div class="item__index"><span>{{'0'.$i}}</span></div>
            <div class="item__main">
                <div class="item__main__text">{{$service->flow['text'.$i]}}</div>
                <figure class="item__main__img">
                    @for($j = 1; $j < 4; $j++)
                    @if($service->flow['img'.$i.'_'.$j])
                    <img src="{{asset('upload/service/flow/'.$service->flow['img'.$i.'_'.$j])}}" alt="">
                    @endif
                    @endfor
                </figure>
            </div>
        </div>
        @endif
        @endfor
    </div>
</section>
@endif
@if(isset($service->scene->title1))
<section class="service-use container">
    <div class="title-underline">利用シーン</div>
    <div class="use__main">
        @for($i = 1; $i < 6; $i++)
        @if($service->scene['title'.$i])
        <div class="use__item">
            <div class="item__title">{{$service->scene['title'.$i]}}</div>
            <div class="item__content textarea">
                <?= nl2br($service->scene['text'.$i]) ?>
            </div>
        </div>
        @endif
        @endfor
    </div>
</section>
@endif
@if(isset($service->customizable))
<service-custom content="{{$service->customizable}}"></service-custom>
@endif

<contact-section></contact-section>
@endsection