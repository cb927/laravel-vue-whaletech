@extends('layouts.app')

@section('meta_title')
サイトマップ
@endsection

@section('content')
<a href="/recruit" class="fixed-link">採用情報</a>
<section class="banner bg-blue-gradient">
    <p class="banner__title">SITEMAP</p>
    <p class="banner__subtitle">サイトマップ</p>
</section>
<section class="breadcrumb container">
    <img src="assets/img/home.png" class="breadcrumb__home" alt="">
    <ol class="arrows">
        <li><a href="#">ホーム</a></li>
        <li><a href="#">サイトマップ</a></li>
    </ol>
</section>
<section class="sitemap container">
    <div class="sitemap__content">
        <div class="sitemap__content__left">
            <div class="sitemap__item">
                <a href="/" class="item__main">ホーム</a>
            </div>
            <div class="sitemap__item">
                <a href="/blogs" class="item__main">お知らせ・ブログ</a>
            </div>
            <div class="sitemap__item">
                <a href="/works" class="item__main">開発実績</a>
                <div class="item__sub">
                    @foreach($works as $item)
                    <a href="{{route('works.single', $item->id)}}" class="sub__link">{{$item->title}}</a>
                    @endforeach
                </div>
            </div>
            <div class="sitemap__item">
                <a href="/services" class="item__main">提供サービス</a>
                <div class="item__sub">
                    @foreach($services as $item)
                    <a href="{{route('services.single', $item->id)}}" class="sub__link">{{$item->title}}</a>
                    @endforeach
                </div>
            </div>
            <div class="sitemap__item">
                <a href="/company" class="item__main">会社案内</a>
                <div class="item__sub">
                    <a href="/company#profile" class="sub__link">会社概要</a>
                    <a href="/company#access" class="sub__link">アクセス</a>
                    <a href="/company#history" class="sub__link">沿革</a>
                </div>
            </div>
        </div>
        <div class="sitemap__content__right">
            <div class="sitemap__item">
                <a href="/contact" class="item__main">お問い合わせ</a>
            </div>
            <div class="sitemap__item">
                <a href="/recruit" class="item__main">採用情報</a>
                <div class="item__sub">
                    <a href="/recruit#message" class="sub__link">メッセージ</a>
                    <a href="/recruit#office" class="sub__link">オフィスの紹介</a>
                    <a href="/recruit#interview" class="sub__link">社員インタビュー</a>
                    <a href="/recruit#" class="sub__link">研修制度・福利厚生</a>
                    <a href="/recruit#" class="sub__link">募集要項</a>
                    <a href="/recruit#" class="sub__link">応募</a>
                </div>
            </div>
            <div class="sitemap__item">
                <a href="/recruit" class="item__main">ビジネスパートナー募集</a>
            </div>
            <div class="sitemap__item">
                <a href="#" class="item__main">プライバシーポリシー</a>
            </div>
        </div>
    </div>
</section>

<contact-section></contact-section>
@endsection