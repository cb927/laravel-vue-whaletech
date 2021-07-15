<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">

        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>{{auth()->user()->name}}</span>
                        </div>
                        <ul class="pro-body">
                            <li>
                                <a href="javascript:;" class="dropdown-item">
                                    <i class="feather icon-mail"></i>
                                    {{auth()->user()->email}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout')}}" class="dropdown-item">
                                    <i class="feather icon-log-out"></i>
                                    ログアウト
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>


</header>