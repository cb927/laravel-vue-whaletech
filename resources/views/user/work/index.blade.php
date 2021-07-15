@extends('layouts.app')

@section('meta_title')
開発実績
@endsection

@section('content')
<a href="/recruit" class="fixed-link">採用情報</a>

<banner title="WORKS" subtitle="開発実績"></banner>

<breadcrumb container="container" name="開発実績" link="works"></breadcrumb>

<section class="works-list container">
    <div class="works__categories">
        <a href="{{url('works#tag_content')}}" class="works__category__item @if($active == 'all') active @endif">All</a>
        @foreach($tags as $item)
        <a href="{{url('works?tag='.$item.'#tag_content')}}" class="works__category__item @if($active == $item) active @endif">{{$item}}</a>
        @endforeach
    </div>
    <div class="works__main">
        @foreach($works as $work)
        <works-item :work="{{$work}}"></works-item>
        @endforeach
    </div>
    
    {!! $works->links('vendor.pagination.custom_work') !!}
</section>

<contact-section></contact-section>
@endsection