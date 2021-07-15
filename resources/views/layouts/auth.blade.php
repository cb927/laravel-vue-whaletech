<!DOCTYPE html>
<html lang="en">

<head>

    <title>Auth</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png')}}" />

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">

    <!-- Custom Styles for pages -->
    @stack('styles')
    
</head>

<div class="auth-wrapper">
    @yield('content')
</div>

<!-- Required Js -->
<script src="{{ asset('backend/js/vendor-all.min.js')}}"></script>
<script src="{{ asset('backend/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{ asset('backend/js/ripple.js')}}"></script>
<script src="{{ asset('backend/js/pcoded.min.js')}}"></script>

<!-- Custom script for pages -->
@stack('scripts')

</body>

</html>