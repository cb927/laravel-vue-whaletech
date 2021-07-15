@extends('layouts.app')

@section('meta_title')
{{$blog->title}}
@endsection

@section('meta_description')
{{$blog->meta_description ? $blog->meta_description : $blog->detail}}
@endsection

@section('content')
<a href="/recruit" class="fixed-link">採用情報</a>
@php
if($blog->postDateTime){
$postDate = date("Y.m.d D", strtotime($blog->postDateTime));
} else {
$postDate = date("Y.m.d D", strtotime($blog->created_at));
}
@endphp
<banner subtitle="{{$blog->title}}" v-bind:tags="{{json_encode($tags)}}" post-date="{{$postDate}}"></banner>
<breadcrumb container="container-800" name="お知らせ・ブログ" subname="{{$blog->title}}" link = 'blogs'></breadcrumb>
<section class="news-single container-800">
    <figure class="news__img">
        <img src="{{ asset('upload/blog/'.$blog->img)}}" alt="">
    </figure>
    <div class="news__detail">
        {!! $blog->detail !!}
    </div>
    @if($next)
    <div class="news__link new">
        <a href="{{route('blogs.single', $next->id)}}"></a>
        <div class="link__tag">
            <div class="tag__contain">
                <i class="fa fa-chevron-left sp-show" aria-hidden="true"></i>
                <span>New</span>
            </div>
        </div>
        <div class="link__content">
            <div class="link__date">{{$next->postDateTime ? date("Y.m.d D", strtotime($next->postDateTime)) : date("Y.m.d D", strtotime($next->created_at))}}</div>
            <div class="link__detail">{{$next->title}}</div>
        </div>
    </div>
    @endif
    @if($prev)
    <div class="news__link old">
        <a href="{{route('blogs.single', $prev->id)}}"></a>
        <div class="link__content">
            <div class="link__date">{{$prev->postDateTime ? date("Y.m.d D", strtotime($prev->postDateTime)) : date("Y.m.d D", strtotime($prev->created_at))}}</div>
            <div class="link__detail">{{$prev->title}}</div>
        </div>
        <div class="link__tag">
            <div class="tag__contain">
                <span>Old</span>
                <i class="fa fa-chevron-right sp-show" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    @endif
</section>
<contact-section></contact-section>
@endsection