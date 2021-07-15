@extends('layouts.app')

@section('meta_title')
提供サービス
@endsection

@section('content')
<a href="/recruit" class="fixed-link">採用情報</a>

<banner title="SERVICE" subtitle="提供サービス"></banner>
<breadcrumb container="container" name="提供サービス" link="services"></breadcrumb>

<section class="service-list container">
    <div class="service__main">
        @foreach($services as $item)
        <service-item :service="{{$item}}"></service-item>
        @endforeach
    </div>

    {!! $services->links('vendor.pagination.custom_service') !!}

</section>

<contact-section></contact-section>
@endsection