@extends('layouts.admin')

@push('styles')
<style>
    .title {
        font-size: 20px;
        font-weight: bold;
        color: #4680ff;
    }
</style>
@endpush

@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">詳細なユーザ</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/users">ユーザ</a></li>
                        <li class="breadcrumb-item"><a href="#!">詳細なユーザ</a></li>
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
                    <h5>詳細なユーザ</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="title">お名前</p>
                            <p>{{$user->name}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="title">メールアドレス</p>
                            <p>{{$user->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection

@push('scripts')
@endpush