@extends('layouts.admin')

@push('styles')
<!-- restyle ckeditor -->
<style>
    .ck-file-dialog-button {
        display: none !important;
    }
    .ck-dropdown.ck-heading-dropdown {
        display: inline !important;
    }
    .ck-dropdown {
        display: none !important;
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
                        <h5 class="m-b-10">新しい開発実績を追加する</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/works">開発実績</a></li>
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
                    <h5>新しい開発実績を追加する</h5>
                </div>
                <form action="{{ route('admin.work.store')}}" method="post" enctype="multipart/form-data">
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
                            <label class="form-label">アイキャッチ画像 <span class="text-red">*</span></label>
                            <input type="file" name="image" class="form-control" required/>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">案件種別 <span class="text-red">*</span></label>
                                    <input type="text" name="item_type" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">言語 <span class="text-red">*</span></label>
                                    <input type="text" name="language" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">タイプ <span class="text-red">*</span></label>
                                    <input type="text" name="type" class="form-control" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">概要 <span class="text-red">*</span></label>
                            <textarea name="overview" id="summernote"></textarea>
                            <div id="error"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="metaTitle" class="form-control" size="48"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description</label>
                            <textarea name="metaDescription" class="form-control" maxlength="124"></textarea>
                        </div>
                        <div class="row" id="intro_line1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ1</label>
                                    <input type="file" name="intro_img1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト1</label>
                                    <input type="text" name="intro_text1" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="intro_line2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ2</label>
                                    <input type="file" name="intro_img2" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト2</label>
                                    <input type="text" name="intro_text2" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="intro_line3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ3</label>
                                    <input type="file" name="intro_img3" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト3</label>
                                    <input type="text" name="intro_text3" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="intro_line4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ4</label>
                                    <input type="file" name="intro_img4" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト4</label>
                                    <input type="text" name="intro_text4" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="intro_line5">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ5</label>
                                    <input type="file" name="intro_img5" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト5</label>
                                    <input type="text" name="intro_text5" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="add_line" class="btn btn-success mb-4">開発実績紹介追加</button>
                                <button type="button" id="remove_line" class="btn btn-danger mb-4">開発実績紹介削除</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mb-4" id="validation">追加</button>
                        <button type="submit" style="display: none;" id="submit">追加</button>
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
    })
</script>
<script>
    var count = 1
    $(document).ready(function() {
        var line1 = $('#intro_line1')
        var line2 = $('#intro_line2')
        var line3 = $('#intro_line3')
        var line4 = $('#intro_line4')
        var line5 = $('#intro_line5')
        var add = $('#add_line')
        var del = $('#remove_line')

        line1.css('display', 'none')
        line2.css('display', 'none')
        line3.css('display', 'none')
        line4.css('display', 'none')
        line5.css('display', 'none')
        del.css('display', 'none')

        add.click(function() {
            $('#intro_line' + count).css('display', 'flex')
            count++

            if (count > 1) {
                del.css('display', 'inline-block')
            }

            if (count > 5) {
                add.css('display', 'none')
            }
        })
        del.click(function() {
            count--
            console.log(count)
            $('#intro_line' + count).css('display', 'none')

            if (count < 2) {
                del.css('display', 'none')
            }

            if (count <= 5) {
                add.css('display', 'inline-block')
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        var error_msg = '<p style="color: red;">*ブログを入れてください。</p>'
        $('#validation').click(function() {
            console.log($('.ck-content').html());
            if ($('.ck-content').html() == '<p><br data-cke-filler="true"></p>') {
                $('#error').html(error_msg)
            } else {
                $('#submit').trigger('click')
                $('#error').html('')
            }
        })
    })
</script>
@endpush