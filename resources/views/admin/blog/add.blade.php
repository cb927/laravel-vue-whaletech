@extends('layouts.admin')

@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">新しいブログ追加</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/blog">ブログ</a></li>
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
                    <h5>新しいブログ追加</h5>
                </div>
                <form action="{{ route('admin.blog.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">ステータス <span class="text-red">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="公開">公開</option>
                                        <option value="非公開">非公開</option>
                                        <option value="下書き">下書き</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">投稿日時</label>
                                    <input type="datetime-local" name="postDateTime" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">タイトル <span class="text-red">*</span></label>
                            <input type="text" name="title" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">タグ</label>
                            <input type="text" name="tags" data-role="tagsinput" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">アイキャッチ画像</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">コンテンツ <span class="text-red">*</span></label>
                            <textarea name="content" id="summernote"></textarea>
                            <div id="error"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="metaTitle" class="form-control" size="48" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description</label>
                            <textarea name="metaDescription" class="form-control" id="test" maxlength="124"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary mb-4" id="validation">追加</button>
                        <button type="submit" style="display:none;" id="submit">追加</button>
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