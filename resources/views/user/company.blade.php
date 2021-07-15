@extends('layouts.app')

@section('meta_title')
会社案内
@endsection

@section('content')
<a href="/recruit" class="fixed-link">採用情報</a>

<banner title="COMPANY" subtitle="会社案内"></banner>
<breadcrumb container="container-800" name="会社案内"></breadcrumb>
<company></company>

<contact-section></contact-section>
@endsection