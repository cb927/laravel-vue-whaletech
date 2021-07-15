@extends('layouts.admin')

@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">新しいユーザ追加</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/users">ユーザ</a></li>
                        <li class="breadcrumb-item"><a href="#!">追加</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>新しいユーザ追加</h5>
                </div>
                <form action="{{ route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-lable">お名前 <span class="text-red">*</span></label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-lable">メールアドレス <span class="text-red">*</span></label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-lable">パスワード <span class="text-red">*</span></label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-lable">パスワード(確認)</label>
                                    <input type="password" id="password-confirm" class="form-control">
                                    <div id="error_message"></div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mb-4" id="validation">追加</button>
                        <button type="submit" id="submit" style="display: none;">追加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#validation').click(function() {
            var password = $('#password').val()
            var confirm = $('#password-confirm').val()
            var error_msg = '<p style="color: red;">*パスワードを確認してください。</p>'
            if (password == confirm) {
                $('#submit').trigger('click')
            } else {
                $('#error_message').append(error_msg)
            }
        })
    })
</script>
@endpush