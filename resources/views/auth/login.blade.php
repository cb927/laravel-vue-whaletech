@extends('layouts.auth')

@push('styles')
<style>
    .img-fluid {
        width: 60%;
    }
</style>
@endpush

@section('content')
<div class="auth-content">
    <div class="card">
        <div class="row align-items-center text-center">
            <div class="col-md-12">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <img src="{{ asset('assets/img/logo-sp.png')}}" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">ログイン</h4>
                        <div class="form-group mb-3">
                            <label class="floating-label" for="Email">メールアドレス</label>
                            <input type="text" class="form-control" name="email" id="Email" required>
                        </div>
                        <div class="form-group mb-4">
                            <label class="floating-label" for="Password">パスワード</label>
                            <input type="password" class="form-control" name="password" id="Password" required>
                        </div>
                        <button class="btn btn-block btn-primary mb-4">ログイン</button>
                        {{--
                        <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('register')}}" class="f-w-400">Signup</a></p>
                        --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#validation').click(function() {
            var password = $('#password').val()
            var confirm = $('#password-confirm').val()
            var error_msg = '<p style="color: red;">*Please confirm your password</p>'
            if (password == confirm) {
                $('#submit').trigger('click')
            } else {
                $('#error_message').append(error_msg)
            }
        })
    })
</script>
@endpush