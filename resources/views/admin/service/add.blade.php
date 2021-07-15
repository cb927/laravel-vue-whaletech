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
                        <h5 class="m-b-10">新しいサービス追加</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/services">サービス</a></li>
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
                    <h5>新しいサービス追加</h5>
                </div>
                <form action="{{ route('admin.service.store')}}" method="post" enctype="multipart/form-data">
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
                            <label class="form-label">アイキャッチ画像 <span class="text-red">*</span></label>
                            <input type="file" name="image" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">トップコンテンツ <span class="text-red">*</span></label>
                            <textarea name="top_content" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">メインコンテンツ <span class="text-red">*</span></label>
                            <textarea name="main_content" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="metaTitle" class="form-control" size="48"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description</label>
                            <textarea name="metaDescription" class="form-control" maxlength="124"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">カスタマイズ</label>
                            <textarea name="custom" class="form-control"></textarea>
                        </div>

                        <!-- Add flow lines -->
                        <div class="row" id="flow_line1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">流れテキスト1</label>
                                    <input type="text" name="flow_text1" id="flow_text1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ1-1</label>
                                    <input type="file" name="flow_img1_1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ1-2</label>
                                    <input type="file" name="flow_img1_2" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ1-3</label>
                                    <input type="file" name="flow_img1_3" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="flow_line2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">流れテキスト2</label>
                                    <input type="text" name="flow_text2" id="flow_text2" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ2-1</label>
                                    <input type="file" name="flow_img2_1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ2-2</label>
                                    <input type="file" name="flow_img2_2" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ2-3</label>
                                    <input type="file" name="flow_img2_3" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="flow_line3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">流れテキスト3</label>
                                    <input type="text" name="flow_text3" id="flow_text3" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ3-1</label>
                                    <input type="file" name="flow_img3_1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ3-2</label>
                                    <input type="file" name="flow_img3_2" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ3-3</label>
                                    <input type="file" name="flow_img3_3" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="flow_line4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">流れテキスト4</label>
                                    <input type="text" name="flow_text4" id="flow_text4" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ4-1</label>
                                    <input type="file" name="flow_img4_1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ4-2</label>
                                    <input type="file" name="flow_img4_2" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ4-3</label>
                                    <input type="file" name="flow_img4_3" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="flow_line5">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">流れテキスト5</label>
                                    <input type="text" name="flow_text5" id="flow_text5" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ5-1</label>
                                    <input type="file" name="flow_img5_1" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ5-2</label>
                                    <input type="file" name="flow_img5_2" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">流れイメージ5-3</label>
                                    <input type="file" name="flow_img5_3" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="add_line" class="btn btn-success mb-4">流れ追加</button>
                                <button type="button" id="remove_line" class="btn btn-danger mb-4">流れ削除</button>
                            </div>
                        </div>

                        <!-- Add scene lines -->
                        <div class="row" id="scene_line1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンタイトル1</label>
                                    <input name="scene_title1" id="scene_title1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンコンテンツ1</label>
                                    <textarea name="scene_content1" id="scene_content1" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="scene_line2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンタイトル2</label>
                                    <input name="scene_title2" id="scene_title2" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンコンテンツ2</label>
                                    <textarea name="scene_content2" id="scene_content2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="scene_line3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンタイトル3</label>
                                    <input name="scene_title3" id="scene_title3" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンコンテンツ3</label>
                                    <textarea name="scene_content3" id="scene_content3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="scene_line4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンタイトル4</label>
                                    <input name="scene_title4" id="scene_title4" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンコンテンツ4</label>
                                    <textarea name="scene_content4" id="scene_content4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="scene_line5">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンタイトル5</label>
                                    <input name="scene_title5" id="scene_title5" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">シーンコンテンツ5</label>
                                    <textarea name="scene_content5" id="scene_content5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="add_line--scene" class="btn btn-success mb-4">シーン追加</button>
                                <button type="button" id="remove_line--scene" class="btn btn-danger mb-4">シーン削除</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">追加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/js/plugins/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        ClassicEditor.create(document.querySelector('#classic-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
<script>
    var count = 1
    var count_scene = 1
    $(document).ready(function() {
        var line1 = $('#flow_line1')
        var line2 = $('#flow_line2')
        var line3 = $('#flow_line3')
        var line4 = $('#flow_line4')
        var line5 = $('#flow_line5')
        var add = $('#add_line')
        var del = $('#remove_line')

        line1.css('display', 'none')
        line2.css('display', 'none')
        line3.css('display', 'none')
        line4.css('display', 'none')
        line5.css('display', 'none')
        del.css('display', 'none')

        add.click(function() {
            $('#flow_line' + count).css('display', 'flex')
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
            $('#flow_text' + count).val('')
            $('#flow_line' + count).css('display', 'none')

            if (count < 2) {
                del.css('display', 'none')
            }

            if (count <= 5) {
                add.css('display', 'inline-block')
            }
        })

        var scene_line1 = $('#scene_line1')
        var scene_line2 = $('#scene_line2')
        var scene_line3 = $('#scene_line3')
        var scene_line4 = $('#scene_line4')
        var scene_line5 = $('#scene_line5')
        var add_scene = $('#add_line--scene')
        var del_scene = $('#remove_line--scene')

        scene_line1.css('display', 'none')
        scene_line2.css('display', 'none')
        scene_line3.css('display', 'none')
        scene_line4.css('display', 'none')
        scene_line5.css('display', 'none')
        del_scene.css('display', 'none')

        add_scene.click(function() {
            $('#scene_line' + count_scene).css('display', 'block')
            count_scene++

            if (count_scene > 1) {
                del_scene.css('display', 'inline-block')
            }

            if (count_scene > 5) {
                add_scene.css('display', 'none')
            }
        })
        del_scene.click(function() {
            count_scene--
            console.log(count_scene)
            $('#scene_content' + count_scene).val('')
            $('#scene_title' + count_scene).val('')
            $('#scene_line' + count_scene).css('display', 'none')

            if (count_scene < 2) {
                del_scene.css('display', 'none')
            }

            if (count_scene <= 5) {
                add_scene.css('display', 'inline-block')
            }
        })
    })
</script>
@endpush