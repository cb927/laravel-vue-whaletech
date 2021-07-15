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
                        <h5 class="m-b-10">サービスリスト</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/services">サービス</a></li>
                        <li class="breadcrumb-item"><a href="#!">サービスリスト</a></li>
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
                    <h5>サービスリスト</h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ステータス</th>
                                    <th>投稿日時</th>
                                    <th>タイトル</th>
                                    <th>アクション</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($services as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <label class="badge @if($item->status == '非公開') badge-light-danger @elseif($item->status == '公開') badge-light-success @else badge-light-warning @endif">{{$item->status}}</label>
                                    </td>
                                    <td>{{ isset($item->postDateTime) ? date("Y.m.d D", strtotime($item->postDateTime)) : date("Y.m.d D", strtotime($item->created_at)) }}</td>
                                    <td>{{$item->title}}</td>
                                    <td>
                                        <a href="{{ route('admin.service.single', $item->id)}}" class="btn  btn-icon btn-success btn-sm"><i class="feather icon-eye"></i></a>
                                        <a href="{{ route('admin.service.edit', $item->id)}}" class="btn  btn-icon btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                        <a href="{{ route('admin.service.delete', $item->id)}}" class="btn  btn-icon btn-danger btn-sm"><i class="feather icon-trash-2"></i></a>
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