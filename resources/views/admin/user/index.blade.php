@extends('layouts.admin')

@push('styles')
<style>
    .btn-sm {
        width: 35px !important;
        height: 35px !important;
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
                        <h5 class="m-b-10">ユーザ</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">ユーザ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>users</h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>お名前</th>
                                    <th>メールアドレス</th>
                                    <th>アクション</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($users as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <a href="{{ route('admin.user.single', $item->id)}}" class="btn  btn-icon btn-success btn-sm"><i class="feather icon-eye"></i></a>
                                        <a href="{{ route('admin.user.edit', $item->id)}}" class="btn  btn-icon btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                        <a href="{{ route('admin.user.delete', $item->id)}}" class="btn  btn-icon btn-danger btn-sm"><i class="feather icon-trash-2"></i></a>
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection