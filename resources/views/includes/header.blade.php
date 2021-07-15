<!-- header -->
<header>
    <nav class="navbar">
        <a href="/" class="nav-logo">
            <img src="{{ asset('assets/img/logo-pc.png')}}" class="logo-pc" alt="">
            <img src="{{ asset('assets/img/logo-sp.png')}}" class="logo-sp" alt="">
        </a>
        <ul class="nav-menu">
            <a href="javascript:;" class="nav-menu-close sp">
                <img src="{{ asset('assets/img/close.png')}}" alt="">
            </a>
            <li class="nav-item"><a href="/">ホーム</a></li>
            <li class="nav-item"><a href="{{route('blogs')}}">お知らせ・ブログ</a></li>
            <li class="nav-item"><a href="{{route('works')}}">開発実績</a></li>
            <li class="nav-item"><a href="{{route('services')}}">提供サービス</a></li>
            <li class="nav-item"><a href="{{route('company')}}">会社案内</a></li>
            <li class="nav-item"><a href="{{route('contact')}}">お問い合わせ</a></li>
            <a href="{{route('recruit')}}" class="nav-recruit sp">RECRUIT</a>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>