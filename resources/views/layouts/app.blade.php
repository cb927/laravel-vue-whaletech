<!-- HTMLコード -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <title>@yield('meta_title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png')}}" />

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .textarea {
            white-space: pre-line;
        }
    </style>
    <!-- javascript -->
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/theme.js')}}"></script>
</head>

<body>
    @php
    $currentURL = Request::route()->getName();
    @endphp
    @include('includes.header')
    <!-- main -->
    <main class="@if($currentURL == 'recruit') bg-blue-gradient recruit @endif">
        <a href="javascript:;" class="scroll-top">
            <i class="fa fa-chevron-up" aria-hidden="true"></i>
        </a>
        <div id="app">
            @yield('content')
        </div>
    </main>
    @include('includes.footer')
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>