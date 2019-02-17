<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Danh mục gốc cho dịch vụ
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/service_category') ?>"><i class="fa fa-dashboard"></i> Danh sách danh mục gốc cho dịch vụ</a></li>
            <li class="active">Cập nhật danh mục gốc cho dịch vụ</li>
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
                                    <img src="<?php echo base_url('assets/upload/service_category/' . $detail['slug'] . '/' . $detail['image']) ?>" width="150">
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

                        <!-- <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Danh mục', 'parent_id');
                                echo form_error('parent_id');
                                ?>
                                <select name="parent_id" class="form-control">
                                    <option value="0">Danh mục gốc</option>
                                    </select>
                            </div>
                        </div> -->


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
                            echo form_label('Giới thiệu', 'description');
                            echo form_error('description');
                            echo form_textarea('description', set_value('description', $detail['description']), 'class="form-control tinymce-area" id="description"');
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                            <?php echo form_submit('submit', 'Cập nhật', 'class="btn btn-primary pull-right margin-right-xs" '); ?>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/admin/');?>admin.js" type="text/javascript" charset="utf-8" async defer></script>

