<style type="text/css">
    .box-body img{
        width: 100%;
    }
    .video-youtube iframe {
        width: 100%;
        height: 511px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>Banner cho bài viết tại sao chọn chúng tôi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/why') ?>"><i class="fa fa-dashboard"></i> Danh sách Banner cho bài viết tại sao chọn chúng tôi</a></li>
            <li class="active">Chi tiết Banner cho bài viết tại sao chọn chúng tôi</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết: <span class="label label-success"><?= $detail['title'] ?></span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="detail-image col-md-6">
                                <label>Hình ảnh</label>
                                <div class="row">
                                    <div class="item col-md-12">
                                        <div class="mask-lg">
                                            <?php if ( $detail['image'] ): ?>
                                                <img src="<?= base_url('assets/upload/why/commercial/' . $detail['image'] ) ?>" alt="Image Detail" width=100%>    
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-info col-md-6">
                                <div class="table-responsive">
                                    <label>Thông tin</label>
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Loại banner hiển thị</th>
                                                <td>
                                                    <?php if ( $detail['is_active'] == 0 ): ?>
                                                        <span class="label label-success">Hình Ảnh</span>
                                                    <?php else: ?>
                                                        <span class="label label-success">Video</span>
                                                    <?php endif ?>
                                                </td>
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
                            <br>
                            <br>
                            <div class="col-md-12" style="margin-top: 20px">
                                <div class="box box-info" style="box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.1)">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Video</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body video-youtube">
                                        <?php echo $detail['iframe'] ?>
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
                                        <?= $detail['description'] ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Edit Information</h3>
                    </div>
                    <div class="box-body">
                        <a href="<?= base_url('admin/why/edit_commercial') ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>