<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png')}}" />

    <link rel="stylesheet" href="{{ asset('backend/css/plugins/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/plugins/bootstrap-tagsinput-typeahead.css')}}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">

    <style>
        .img-radius {
            border-radius: 0;
        }

        .text-red {
            color: red;
        }

        .textarea {
            white-space: pre-line;
        }
    </style>

    @stack('styles')

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    @include('includes.admin.sidebar')
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    @include('includes.admin.header')
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        @yield('content')
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="{{ asset('backend/js/vendor-all.min.js')}}"></script>
    <script src="{{ asset('backend/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/js/ripple.js')}}"></script>
    <script src="{{ asset('backend/js/pcoded.min.js')}}"></script>
    <!-- custom-chart js -->
    <!-- <script src="{{ asset('backend/js/pages/dashboard-project.js')}}"></script> -->

    <!-- bootstrap-tagsinput-latest Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="{{ asset('backend/js/plugins/bootstrap-tagsinput.min.js')}}"></script>
    <!-- bootstrap-maxlength Js -->
    <script src="{{ asset('backend/js/plugins/bootstrap-maxlength.js')}}"></script>
    <!-- form-advance custom js -->
    <script src="{{ asset('backend/js/pages/form-advance-custom.js')}}"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    @stack('scripts')
</body>

</html>