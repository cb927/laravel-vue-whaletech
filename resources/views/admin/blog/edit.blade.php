@extends('layouts.admin')

@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">ブログ更新</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/blogs">ブログ</a></li>
                        <li class="breadcrumb-item"><a href="#!">更新</a></li>
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
                    <h5>ブログ更新</h5>
                </div>
                <form action="{{ route('admin.blog.update', $blog->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">ステータス</label>
                                    <select name="status" class="form-control" required>
                                        <option value="公開" @if($blog->status == '公開') selected @endif>公開</option>
                                        <option value="非公開" @if($blog->status == '非公開') selected @endif>非公開</option>
                                        <option value="下書き" @if($blog->status == '下書き') selected @endif>下書き</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">投稿日時</label>
                                    <input type="datetime-local" name="postDateTime" value="{{str_replace(' ', 'T', $blog->postDateTime)}}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">タイトル</label>
                            <input type="text" name="title" class="form-control" value="{{$blog->title}}" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">タグ</label>
                            <input type="text" name="tags" value="{{$blog->tags}}" data-role="tagsinput" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">アイキャッチ画像</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">コンテンツ</label>
                            <textarea name="content" id="summernote">{!! $blog->detail !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="metaTitle" value="{{$blog->metaTitle}}" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description</label>
                            <textarea name="metaDescription" class="form-control">{{$blog->metaDescription}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">更新</button>
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
        $('#summernote').summernote();
        var error_msg = '<p style="color: red;">*ブログを入れてください。</p>'
        $('#validation').click(function() {
            if ($('.note-editable').html() == '<p><br></p>') {
                $('#error').html(error_msg)
            } else {
                $('#submit').trigger('click')
                $('#error').html('')
            }
        })
    })
</script>
@endpush