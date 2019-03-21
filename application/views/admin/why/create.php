<style type="text/css">
    .bootstrap-tagsinput{
        width: 100%;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới
            <small>
                Tại sao chọn chúng tôi
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/why') ?>"><i class="fa fa-dashboard"></i> Danh sách Tại sao chọn chúng tôi</a></li>
            <li class="active">Thêm mới Tại sao chọn chúng tôi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-body">
                        <?php if ($this->session->flashdata('message_error')): ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                <?php echo $this->session->flashdata('message_error'); ?>
                            </div>
                        <?php endif ?>
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'bootstrapTagsInputForm'));
                        ?>
                        <div class="col-xs-12" style="padding: 0px;">
                            <h4 class="box-title">Thông tin cơ bản</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                    echo form_label('Hình ảnh (Dung lượng ảnh phải nhỏ hơn 1.2Mb)', 'image');
                                    echo form_error('image', '<div class="error">', '</div>');
                                    echo form_upload('image', set_value('image'), 'class="form-control"');
                                ?>
                            </div>
                            <br>
                        </div>

                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <select name="icon" class="form-control select2">
                                    <?php if ($icons): ?>
                                        <?php foreach ($icons as $key => $value): ?>
                                            <option value="<?php echo $value['c'] ?>" data-icon="<?php echo $value['c'] ?>"><?php echo $value['l'] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <br>
                        </div>


                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                echo form_label('Tiêu đề', 'title');
                                echo form_error('title', '<div class="error">', '</div>');
                                echo form_input('title', set_value('title'), 'class="form-control" id="title"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                echo form_label('Slug', 'slug');
                                echo form_error('slug', '<div class="error">', '</div>');
                                echo form_input('slug', set_value('slug'), 'class="form-control" id="slug" readonly');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Trạng thái', 'is_active');
                            echo form_error('is_active', '<div class="error">', '</div>');
                            echo form_dropdown('is_active', array('Chưa kích hoạt', 'Kích hoạt'), 0, 'class="form-control" id="is_active"');
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Meta Keywords', 'meta_keywords');
                            echo form_error('meta_keywords', '<div class="error">', '</div>');
                            echo form_textarea('meta_keywords', set_value('meta_keywords'), 'class="form-control" id="meta_keywords"');
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Meta Description', 'meta_description');
                            echo form_error('meta_description', '<div class="error">', '</div>');
                            echo form_textarea('meta_description', set_value('meta_description'), 'class="form-control" id="meta_description"');
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Giới thiệu', 'description');
                            echo form_error('description', '<div class="error">', '</div>');
                            echo form_textarea('description', set_value('description'), 'class="form-control tinymce-area" id="description"');
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Nội dung', 'body');
                            echo form_error('body', '<div class="error">', '</div>');
                            echo form_textarea('body', set_value('body'), 'class="form-control tinymce-area" id="body"');
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                            <?php echo form_submit('submit', 'Thêm mới', 'class="btn btn-primary pull-right margin-right-xs" '); ?>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function iformat(icon) {
        var originalOption = icon.element;
        return '<i class="fa fa-2x ' + $(originalOption).data('icon') + '"></i> ' + icon.text;
    }
    $('.select2').select2({
        width: "100%",
        templateSelection: iformat,
        templateResult: iformat,
        escapeMarkup: function(text) {
            return text;
        }
    });
</script>
