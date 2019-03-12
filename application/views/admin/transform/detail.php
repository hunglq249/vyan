<style type="text/css">
    .box-body img{
        width: 100%;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>Thông tin khách hàng</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/transform') ?>"><i class="fa fa-dashboard"></i> Danh sách thông tin khách hàng</a></li>
            <li class="active">Chi tiết thông tin khách hàng</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-9">
                
                <!-- /.box-header -->
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm pull-right" data-widget="collapse"
                                    data-toggle="tooltip" title="Mở / Đóng" style="margin-right: 5px;">
                                <i class="fa fa-minus"></i></button>
                            </div>
                            <!-- /. tools -->
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <h3 class="box-title">
                                Thông tin khách hàng: <span class="label label-success"><?= $detail['name'] ?></span>
                            </h3>
                        </div>
                        <div class="box-body">
                            <div id="world-map" style="height: 250px; width: 100%;">
                                <div class="detail-image col-md-3">
                                    <label>Ảnh đại diện</label>
                                    <div class="row">
                                        <div class="item col-md-12">
                                            <div class="mask-lg">
                                                <?php if ( $detail['image_before'] ): ?>
                                                    <img src="<?= base_url('assets/upload/transform/image_before/' . $detail['image_before']) ?>"  width=100px >
                                                <?php endif ?>
                                                <?php if ( $detail['image_after'] ): ?>
                                                    <img src="<?= base_url('assets/upload/transform/image_after/' . $detail['image_after']) ?>"  width=100px >
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-info col-md-9">
                                    <div class="table-responsive">
                                        <label>Thông tin</label>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 30%">Tuổi</th>
                                                    <td><?= $detail['age'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Slug</th>
                                                    <td><?= $detail['slug'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Trạng thái</th>
                                                    <td>
                                                        <?php
                                                            if ($detail['is_active'] == 0) {
                                                                echo '<span class="label label-warning">Chờ duyệt</span>';
                                                            }else{
                                                                echo '<span class="label label-success">Đã duyệt</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Meta Keywords</th>
                                                    <td><?= $detail['meta_keywords'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Meta Description</th>
                                                    <td><?= $detail['meta_description'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tài khoản tạo bài viết</th>
                                                    <td><?= $detail['created_by'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Thời gian tạo bài viết</th>
                                                    <td><?= date('H:i:s / d-m-Y', strtotime($detail['created_at'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tài khoản cập nhật bài viết</th>
                                                    <td><?= $detail['updated_by'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Thời gian cập nhật bài viết</th>
                                                    <td><?= date('H:i:s / d-m-Y', strtotime($detail['updated_at'])) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box box-solid collapsed-box">
                        <div class="box-header with-border">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm pull-right" data-widget="collapse"
                                    data-toggle="tooltip" title="Mở / Đóng" style="margin-right: 5px;">
                                <i class="fa fa-plus"></i></button>
                            </div>
                            <!-- /. tools -->
                            <i class="fa fa-street-view" aria-hidden="true"></i>
                            <h3 class="box-title">
                                Thông tin cơ bản
                            </h3>
                        </div>
                        <div class="box-body" style="display: none;">
                            <div id="world-map" style="height: 250px; width: 100%;">

                                <div class="col-md-12">
                                    <div class="box box-danger" style="box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.1)">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Tiêu đề</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <?= $detail['title_basic'] ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-12">
                                    <div class="box box-info" style="box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.1)">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Giới thiệu</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <?= $detail['description_basic'] ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-12">
                                    <div class="box box-success" style="box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.1)">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Nội dung</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <?= $detail['description_basic'] ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="col-md-12">
                    <div class="box box-solid collapsed-box">
                        <div class="box-header">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm pull-right" data-widget="collapse"
                                    data-toggle="tooltip" title="Mở / Đóng" style="margin-right: 5px;">
                                <i class="fa fa-plus"></i></button>
                            </div>
                            <!-- /. tools -->
                            <i class="fa fa-street-view" aria-hidden="true"></i>
                            <h3 class="box-title">
                                Thông tin bài viết
                            </h3>
                        </div>
                        <div class="box-body" style="display: none;">
                            <div id="world-map" style="height: 250px; width: 100%;">

                                <div class="col-md-12">
                                    <div class="box box-danger" style="box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.1)">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Tiêu đề</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <?= $detail['title_advanced'] ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-12">
                                    <div class="box box-info" style="box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.1)">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Giới thiệu</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <?= $detail['description_advanced'] ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-12">
                                    <div class="box box-success" style="box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.1)">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Nội dung</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <?= $detail['body_advanced'] ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Edit Information</h3>
                    </div>
                    <div class="box-body">
                        <a href="<?= base_url('admin/transform/edit/' . $detail['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>