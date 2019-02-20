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
                Dịch vụ
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/service') ?>"><i class="fa fa-dashboard"></i> Danh sách dịch vụ</a></li>
            <li class="active">Thêm mới dịch vụ</li>
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
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <div class="col-xs-12" style="padding: 0px;">
                            <h4 class="box-title">Thông tin cơ bản</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>

                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <label for="image">Hình ảnh đang sử dụng</label><br />
                                <?php if ( $detail['image'] ): ?>
                                    <img src="<?php echo base_url('assets/upload/service/' . $detail['slug'] . '/' . $detail['image']) ?>" width="150">
                                <?php else: ?>
                                    Hiện chưa có hình ảnh cho danh mục món ăn
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                    echo form_label('Hình ảnh (Dung lượng ảnh phải nhỏ hơn 1.2Mb)', 'image');
                                    echo form_error('image');
                                    echo form_upload('image', set_value('image'), 'class="form-control"');
                                ?>
                            </div>
                            <br>
                        </div>

                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                echo form_label('Danh mục cấp 1', 'parent_id');
                                echo form_error('parent_id');
                                echo form_dropdown('parent_id', $category, $detail['category_0'],'class="form-control" id="parent_id"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                echo form_label('Danh mục cấp 2', 'parent_id_1');
                                echo form_error('parent_id_1');
                                echo form_dropdown('parent_id_1', $category_1, $detail['category_1'],'class="form-control" id="parent_id_1"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                echo form_label('Danh mục cấp 3', 'parent_id_2');
                                echo form_error('parent_id_2');
                                echo form_dropdown('parent_id_2',$category_2, $detail['category_2'],'class="form-control" id="parent_id_2"');
                                ?>
                            </div>
                        </div>


                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                echo form_label('Tiêu đề', 'title');
                                echo form_error('title');
                                echo form_input('title', set_value('title', $detail['title']), 'class="form-control" id="title"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                echo form_label('Slug', 'slug');
                                echo form_error('slug');
                                echo form_input('slug', set_value('slug', $detail['slug']), 'class="form-control" id="slug" readonly');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12" style="padding-right: 0px;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <?php
                                echo form_label('Thuộc tính', 'tag');
                                echo form_error('tag');
                                echo form_input('tag', set_value('tag', $detail['tag']), 'class="form-control" id="tag" data-role="tagsinput"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Meta Keywords', 'meta_keywords');
                            echo form_error('meta_keywords');
                            echo form_textarea('meta_keywords', set_value('meta_keywords', $detail['meta_keywords']), 'class="form-control" id="meta_keywords"');
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Meta Description', 'meta_description');
                            echo form_error('meta_description');
                            echo form_textarea('meta_description', set_value('meta_description', $detail['meta_description']), 'class="form-control" id="meta_description"');
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Iframe Youtube', 'iframe');
                            echo form_error('iframe');
                            echo form_textarea('iframe', set_value('iframe', $detail['iframe']), 'class="form-control" id="iframe"');
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Giới thiệu', 'description');
                            echo form_error('description');
                            echo form_textarea('description', set_value('description', $detail['description']), 'class="form-control tinymce-area" id="description"');
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Giới thiệu', 'Nội dung');
                            echo form_error('body');
                            echo form_textarea('body', set_value('body', $detail['body']), 'class="form-control tinymce-area" id="body"');
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
<script src="<?php echo base_url('assets/js/admin/');?>admin.js" type="text/javascript" charset="utf-8" async defer></script>

