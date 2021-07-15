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
                        <h5 class="m-b-10">更新開発実績</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/works">開発実績</a></li>
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
                    <h5>更新開発実績</h5>
                </div>
                <form action="{{ route('admin.work.update', $work->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">ステータス</label>
                                    <select name="status" class="form-control" required>
                                        <option value="公開" @if($work->status == '公開') selected @endif>公開</option>
                                        <option value="非公開" @if($work->status == '非公開') selected @endif>非公開</option>
                                        <option value="下書き" @if($work->status == '下書き') selected @endif>下書き</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">投稿日時</label>
                                    <input type="datetime-local" name="postDateTime" value="{{str_replace(' ', 'T', $work->postDateTime)}}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">タイトル</label>
                            <input type="text" name="title" value="{{$work->title}}" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">タグ</label>
                            <input type="text" name="tags" value="{{$work->tags}}" data-role="tagsinput" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">アイキャッチ画像</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">案件種別</label>
                                    <input type="text" name="item_type" value="{{$work->item_type}}" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">言語</label>
                                    <input type="text" name="language" value="{{$work->language}}" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">タイプ</label>
                                    <input type="text" name="type" value="{{$work->type}}" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">概要</label>
                            <textarea name="overview" id="summernote">{!! $work->overview !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="metaTitle" value="{{$work->metaTitle}}" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description</label>
                            <textarea name="metaDescription" class="form-control">{{$work->metaDescription}}</textarea>
                        </div>
                        <div class="row" id="intro_line1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ1</label>
                                    <input type="file" name="intro_img1" id="intro_img1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト1</label>
                                    <input type="text" name="intro_text1" id="intro_text1" value="{{$work->introduction->text1}}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="intro_line2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ2</label>
                                    <input type="file" name="intro_img2" id="intro_img2" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト2</label>
                                    <input type="text" name="intro_text2" id="intro_text2" value="{{$work->introduction->text2}}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="intro_line3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ3</label>
                                    <input type="file" name="intro_img3" id="intro_img3" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト3</label>
                                    <input type="text" name="intro_text3" id="intro_text3" value="{{$work->introduction->text3}}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="intro_line4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ4</label>
                                    <input type="file" name="intro_img4" id="intro_img4" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト4</label>
                                    <input type="text" name="intro_text4" id="intro_text4" value="{{$work->introduction->text4}}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="intro_line5">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">紹介イメージ5</label>
                                    <input type="file" name="intro_img5" id="intro_img5" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">紹介テキスト5</label>
                                    <input type="text" name="intro_text5" id="intro_text5" value="{{$work->introduction->text5}}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="add_line" class="btn btn-success mb-4">開発実績紹介追加</button>
                                <button type="button" id="remove_line" class="btn btn-danger mb-4">開発実績紹介削除</button>
                            </div>
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

        if ($('#intro_text1').val() != '') {
            line1.css('display', 'flex')
            del.css('display', 'inline-block')
            count = 2
        }
        if ($('#intro_text2').val() != '') {
            line2.css('display', 'flex')
            count = 3
        }
        if ($('#intro_text3').val() != '') {
            line3.css('display', 'flex')
            count = 4
        }
        if ($('#intro_text4').val() != '') {
            line4.css('display', 'flex')
            count = 5
        }
        if ($('#intro_text5').val() != '') {
            line5.css('display', 'flex')
            count = 6
        }

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
            $('#intro_text' + count).val('')
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
@endpush