@extends('layouts.auth')

@section('content')
<div class="auth-content">
    <div class="card">
        <div class="row align-items-center text-center">
            <div class="col-md-12">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Sign up</h4>
                        <div class="form-group mb-3">
                            <label class="floating-label" for="Username">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="floating-label" for="Email">Email address</label>
                            <input type="text" class="form-control" name="email" id="Email" required>
                        </div>
                        <div class="form-group mb-4">
                            <label class="floating-label" for="Password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-group mb-4">
                            <label class="floating-label" for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" name="password-confirm" id="password-confirm" required>
                            <div id="error_message">
                                
                            </div>
                        </div>
                        <button type="submit" style="display:none;" id="submit">submin</button>
                        <button type="button" class="btn btn-primary btn-block mb-4" id="validation">Sign up</button>
                        <p class="mb-2">Already have an account? <a href="{{ route('login')}}" class="f-w-400">Signin</a></p>
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