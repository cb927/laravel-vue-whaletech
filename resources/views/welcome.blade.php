@extends('layouts.app-novue')

@section('content')
<a href="{{route('recruit')}}" class="fixed-link">採用情報</a>
<section class="top-banner">
    <figure class="banner__img">
    </figure>
    <p class="banner__text">
        ソフトウェア開発のプロフェッショナルとして、<br>
        ご提案できることがあります。
    </p>
</section>
<section class="top-recruit">
    <div class="container">
        <div class="recruit__title sp">
            <div class="title-en">RECRUIT</div>
            <div class="title-jp">採用情報</div>
        </div>
        <figure class="recruit__img">
            <img src="./assets/img/top/recruit.png" alt="">
        </figure>
        <div class="recruit__content">
            <div class="recruit__title">
                <div class="title-en">RECRUIT</div>
                <div class="title-jp">採用情報</div>
            </div>
            <p class="recruit__detail">
                ホエールテック株式会社では、SE・プログラマーを募集しています。
                最新の技術と奇抜なアイデアでおもしろいものをつくりたい人を探しています。<br>
                <br>
                テキストが入ります。テキストが入ります。テキストが入ります。
                テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            </p>
            <div class="recruit__btn">
                <a href="{{route('recruit')}}">RECRUIT</a>
            </div>
        </div>
    </div>
</section>
<section class="top-about bg-gray">
    <div class="container">
        <div class="about__title sp">
            <div class="title-en">ABOUT</div>
            <div class="title-jp">ホエールテック株式会社について</div>
        </div>
        <figure class="about__img">
            <p class="sp">Output <br> Your Idea</p>
            <img src="./assets/img/top/about.png" alt="">
        </figure>
        <div class="about__content">
            <div class="about__title">
                <div class="title-en">ABOUT</div>
                <div class="title-jp">ホエールテック株式会社について</div>
            </div>
            <p class="about__subtitle">
                Output <br> Your Ideas
            </p>
            <p class="about__detail">
                ホエールテック株式会社では、SE・プログラマーを募集しています。
                最新の技術と奇抜なアイデアでおもしろいものをつくりたい人を探しています。<br>
                <br>
                テキストが入ります。テキストが入ります。テキストが入ります。
                テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            </p>
            <div class="about__btn">
                <a href="{{route('company')}}">ABOUT</a>
            </div>
        </div>
    </div>
</section>
<section class="top-works bg-blue-gradient">
    <div class="works__title">
        <div class="title-en">WORKS</div>
        <div class="title-jp">開発実績</div>
    </div>
    <div class="works__carousel">
        @foreach($works as $item)
        <div class="carousel__item">
            <figure class="item__img">
                <a href="{{route('works.single', $item->id)}}">
                    <img src="{{ asset('upload/work/'.$item->img)}}" alt="">
                </a>
            </figure>
            <p class="item__name">
                <a href="{{route('works.single', $item->id)}}">
                    @php
                    if(mb_strlen($item->title, 'UTF-8') > 15) {
                        $title = mb_substr($item->title, 0, 15, 'UTF-8') . '...';
                    } else {
                        $title = $item->title;
                    }
                    @endphp
                    {{$title}}
                </a>
            </p>
            <div class="item__btns">
                @if( isset($item->tags))
                @php
                $array_tags = explode(',', $item->tags)
                @endphp
                @foreach($array_tags as $tag)
                <a href="javascript:;">{{$tag}}</a>
                @endforeach
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="works__btn">
        <a href="{{route('works')}}">WORKS</a>
    </div>
</section>
<section class="top-service">
    <div class="container">
        <div class="service__title">
            <div class="title-en">SERVICE</div>
            <div class="title-jp">提供サービス</div>
        </div>
        <div class="service__content">
            <div class="content__carousel">
                <div class="service__carousel">
                    @foreach($services as $item)
                    <div class="carousel__item">
                        <figure class="carousel__img">
                            <img src="{{ asset('upload/service/'.$item->img)}}" alt="">
                        </figure>
                        <div class="carousel__content">
                            <div class="content__title">{{$item->title}}</div>
                            <p class="content__text">
                                {{$item->top}}
                            </p>
                            <div class="content__btn">
                                <a href="{{route('services.single', $item->id)}}">VIEW MORE</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="service__carousel__nav">
                    @foreach($services as $item)
                    <figure class="carousel__item">
                        <img src="{{ asset('upload/service/'.$item->img)}}" alt="">
                    </figure>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="service__btn">
            <a href="{{route('services')}}">SERVICE</a>
        </div>
    </div>
</section>
<section class="top-blogs bg-lightblue-gradient">
    <div class="container">
        <div class="top-blog__title">
            <div class="title-en">NEWS・BLOG</div>
            <div class="title-jp">お知らせ・ブログ</div>
        </div>
        <div class="blog__list">
            @foreach($blogs as $item)
            <a href="{{route('blogs.single', $item->id)}}" class="blog__item">
                <p class="blog__cat">
                    {{str_replace(',', '・',$item->tags)}}
                </p>
                <figure class="blog__item__img">
                    <img src="{{$item->img ? asset('upload/blog/'.$item->img) : asset('assets/img/blog/default.png')}}" alt="">
                </figure>
                <p class="blog__date">{{$item->postDateTime ? date("Y.m.d D", strtotime($item->postDateTime)) : date("Y.m.d D", strtotime($item->created_at))}}</p>
                <p class="blog__title">{{$item->title}}</p>
            </a>
            @endforeach
        </div>
        <div class="blog__btn">
            <a href="{{route('blogs')}}">NEWS・BLOG</a>
        </div>
    </div>
</section>
<section class="top-contact bg-blue-gradient">
    <div class="contact__mail">
        <a href="{{route('contact')}}">
            <img src="./assets/img/mail.png" alt="">
            <span>お問い合わせ</span>
        </a>
    </div>
    <div class="contact__search">
        <a href="{{route('recruit')}}">
            <img src="./assets/img/search.png" alt="">
            <span>採用情報</span>
        </a>
    </div>
</section>
@endsection