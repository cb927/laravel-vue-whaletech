<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('assets/img/logo.png')}}" alt="User-Profile-Image">
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>ダッシュボード</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard')}}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">ダッシュボード</span>
                    </a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>ポスト</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-check-square"></i></span>
                        <span class="pcoded-mtext">ブログ</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.blogs')}}">ブログリスト</a></li>
                        <li><a href="{{ route('admin.blog.add')}}">新しいブログ追加</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-check-square"></i></span>
                        <span class="pcoded-mtext">開発実績</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.works')}}">開発実績リスト</a></li>
                        <li><a href="{{ route('admin.work.add')}}">新しい開発実績追加</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-check-square"></i></span>
                        <span class="pcoded-mtext">サービス</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.services')}}">サービスリスト</a></li>
                        <li><a href="{{ route('admin.service.add')}}">新しいサービス追加</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>ユーザ管理</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-check-square"></i></span>
                        <span class="pcoded-mtext">ユーザ</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.users')}}">ユーザ</a></li>
                        <li><a href="{{ route('admin.user.add')}}">新しいユーザ追加</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>