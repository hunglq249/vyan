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
                Thông tin khách hàng
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/transform') ?>"><i class="fa fa-dashboard"></i> Danh sách thông tin khách hàng</a></li>
            <li class="active">Thêm mới thông tin khách hàng</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
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
                <div class="row">
                    <span><?php echo $this->session->flashdata('message'); ?></span>
                </div>
                    
                <div class="box box-solid">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm pull-right" data-widget="collapse"
                                data-toggle="tooltip" title="Mở / Đóng" style="margin-right: 5px;">
                            <i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">
                            Thông tin cơ bản
                        </h3>
                    </div>
                    <div class="box-body">
                        <div id="world-map" style="height: 250px; width: 100%;">
                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <div class="form-group col-xs-12" style="padding-right: 0px;">
                                    <?php
                                    echo form_label('Họ tên', 'name');
                                    echo form_error('name', '<div class="error">', '</div>');
                                    echo form_input('name', set_value('name'), 'class="form-control" id="name"');
                                    ?>
                                </div>
                            </div>

                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <div class="form-group col-xs-12" style="padding-right: 0px;">
                                    <?php
                                    echo form_label('Tuổi', 'age');
                                    echo form_error('age', '<div class="error">', '</div>');
                                    echo form_input('age', set_value('age'), 'class="form-control" id="age"');
                                    ?>
                                </div>
                            </div>

                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <div class="form-group col-xs-12" style="padding-right: 0px;">
                                    <?php
                                        echo form_label('Hình ảnh trước của khách hàng (Dung lượng ảnh phải nhỏ hơn 1.2Mb)', 'image_before');
                                        echo form_error('image_before', '<div class="error">', '</div>');
                                        echo form_upload('image_before', set_value('image_before'), 'class="form-control"');
                                    ?>
                                </div>
                                <br>
                            </div>

                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <div class="form-group col-xs-12" style="padding-right: 0px;">
                                    <?php
                                        echo form_label('Hình ảnh sau của khách hàng (Dung lượng ảnh phải nhỏ hơn 1.2Mb)', 'image_after');
                                        echo form_error('image_after', '<div class="error">', '</div>');
                                        echo form_upload('image_after', set_value('image_after'), 'class="form-control"');
                                    ?>
                                </div>
                                <br>
                            </div>


                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <div class="form-group col-xs-12" style="padding-right: 0px;">
                                    <?php
                                    echo form_label('Tiêu đề', 'title_basic');
                                    echo form_error('title_basic', '<div class="error">', '</div>');
                                    echo form_input('title_basic', set_value('title_basic'), 'class="form-control" id="title_basic"');
                                    ?>
                                </div>
                            </div>

                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <div class="form-group col-xs-12" style="padding-right: 0px;">
                                    <label for="is_active">Trạng thái</label>
                                    <?php echo form_error('is_active', '<div class="error">', '</div>'); ?>
                                    <select name="is_active" class="form-control" id="is_active">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="0" >Chưa kích hoạt</option>
                                        <option value="1" >Kích hoạt</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <?php
                                echo form_label('Giới thiệu', 'description_basic');
                                echo form_error('description_basic', '<div class="error">', '</div>');
                                echo form_textarea('description_basic', set_value('description_basic'), 'class="form-control" id="description_basic"');
                                ?>
                            </div>

                            <div class="form-group col-md-12">
                                <?php
                                echo form_label('Nội dung', 'body_basic');
                                echo form_error('body_basic', '<div class="error">', '</div>');
                                echo form_textarea('body_basic', set_value('body_basic'), 'class="form-control tinymce-area" id="body_basic"');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-solid collapsed-box">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm pull-right" data-widget="collapse"
                                data-toggle="tooltip" title="Mở / Đóng" style="margin-right: 5px;">
                            <i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">
                            Thông tin bài viết
                        </h3>
                    </div>
                    <div class="box-body"  style="display: none;">
                        <div id="world-map" style="height: 250px; width: 100%;">

                            <div class="form-group col-xs-12" style="padding-right: 0px;">
                                <div class="form-group col-xs-12" style="padding-right: 0px;">
                                    <?php
                                    echo form_label('Tiêu đề', 'title_advanced');
                                    echo form_error('title_advanced', '<div class="error">', '</div>');
                                    echo form_input('title_advanced', set_value('title_advanced'), 'class="form-control" id="title"');
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
                                echo form_label('Meta Keywords', 'meta_keywords');
                                echo form_error('meta_keywords', '<div class="error">', '</div>');
                                echo form_textarea('meta_keywords', set_value('meta_keywords'), 'rows="5" class="form-control" id="meta_keywords"');
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
                                echo form_label('Giới thiệu', 'description_advanced');
                                echo form_error('description_advanced', '<div class="error">', '</div>');
                                echo form_textarea('description_advanced', set_value('description_advanced'), 'class="form-control" id="description_advanced"');
                                ?>
                            </div>

                            <div class="form-group col-md-12">
                                <?php
                                echo form_label('Nội dung', 'body_advanced');
                                echo form_error('body_advanced', '<div class="error">', '</div>');
                                echo form_textarea('body_advanced', set_value('body_advanced'), 'class="form-control tinymce-area" id="body_advanced"');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="form-group col-xs-12">
                    <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                    <?php echo form_submit('submit', 'Thêm mới', 'class="btn btn-primary pull-right margin-right-xs" '); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>

