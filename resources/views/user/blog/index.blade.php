@extends('layouts.app')

@section('meta_title')
お知らせ・ブログ
@endsection

@section('content')

<a href="{{route('recruit')}}" class="fixed-link">採用情報</a>

<banner title="NEWS・BLOG" subtitle='お知らせ・ブログ'></banner>

<breadcrumb name="お知らせ・ブログ" container="container" link="blogs"></breadcrumb>
<section class="news-list container">
    <div class="news__categories">
        <a href="{{url('blogs#tag_content')}}" class="news__category__item @if($active == 'all') active @endif">All</a>
        @foreach($tags as $item)
        <a href="{{url('blogs?tag='.$item.'#tag_content')}}" class="news__category__item @if($active == $item) active @endif">{{$item}}</a>
        @endforeach
    </div>
    <div class="news__main">
        @foreach($blogs as $item)
        <news-item
         link='{{"blogs/".$item->id}}'
         tag='{{str_replace(",", "・", $item->tags)}}' 
         img='{{$item->img ? asset("upload/blog/".$item->img) : asset("assets/img/blog/default.png")}}' 
         title='{{$item->title}}'
         post-date-time='{{$item->postDateTime ? date("Y.m.d D", strtotime($item->postDateTime)) : date("Y.m.d D", strtotime($item->created_at))}}'
         ></news-item>
        @endforeach
    </div>
    {!! $blogs->links('vendor.pagination.custom_blog') !!}
</section>
<contact-section></contact-section>
@endsection