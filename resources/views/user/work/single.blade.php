@extends('layouts.app')

@section('meta_title')
{{$work->title}}
@endsection

@section('meta_description')
{{$work->meta_description ? $work->meta_description : ''}}
@endsection

@section('content')
<a href="/recruit" class="fixed-link">採用情報</a>

<banner title="WORKS" subtitle="開発実績"></banner>
<breadcrumb container="container" name="開発実績" subname="{{$work->title}}" link="works"></breadcrumb>
<section class="work-single container">
    @php
    if($work->postDateTime){
    $postDate = date("Y.m.d", strtotime($work->postDateTime));
    }else {
    $postDate = date("Y.m.d", strtotime($work->created_at));
    }
    @endphp
    <work-intro :work="{{$work}}" tags="tags" post-date="{{$postDate}}"></work-intro>
    <div class="work__scene">
        @for($i = 1; $i< 6; $i++ )
        @if($work->introduction['img'.$i])
        <div class="scene__item">
            <figure class="item__img">
                <img src="{{asset('upload/work/intro/'.$work->introduction['img'.$i])}}" alt="">
            </figure>
            <p class="item__content">{{$work->introduction['text'.$i]}}</p>
        </div>
        @endif
        @endfor
    </div>
</section>
<section class="work-contact__link">
    <div class="work__text">
        アプリのデモ・カスタマイズ・お見積もりなどのご相談は、<a href="/contact" class="link-underline">お問い合わせページ</a>
        よりお気軽にお問い合わせください。
    </div>
</section>

<contact-section></contact-section>
@endsection