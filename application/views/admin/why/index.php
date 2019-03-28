<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small>
                Tại sao chọn chúng tôi
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/why') ?>"><i class="fa fa-dashboard"></i> Danh sách tại sao chọn chúng tôi</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if ($this->session->flashdata('message_error')): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('message_error'); ?>
                </div>
            <?php endif ?>
            <?php if ($this->session->flashdata('message_success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('message_success'); ?>
                </div>
            <?php endif ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
            
            <div class="col-md-12">
                <div class="box box-solid collapsed-box">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" data-placement="top" title="Mở / Đóng">
                            <i class="fa fa-plus"></i></button>

                            <a href="<?php echo base_url('admin/why/edit_commercial'); ?>" class="btn btn-warning btn-sm pull-right" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa banner" style="margin-right: 5px;">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>

                            <a href="<?php echo base_url('admin/why/detail_commercial'); ?>" class="btn btn-primary btn-sm pull-right" data-toggle="tooltip" data-placement="top" title="Chi tiết banner" style="margin-right: 5px;">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                        <!-- /. tools -->
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <h3 class="box-title">
                            Banner cho tại sao chọn chúng tôi?
                        </h3>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="col-md-12">
                        <?php if ( $banner ): ?>
                                <?php if ( $banner['is_active'] == 0 ): ?>
                                    <div class="form-group col-xs-12">
                                        <div class="form-group col-xs-12">
                                            <?php if ( $banner['image'] ): ?>
                                                <img src="<?php echo base_url('assets/upload/why/commercial/' . $banner['image']) ?>" width="100%">
                                            <?php else: ?>
                                                Hiện chưa có hình ảnh
                                            <?php endif ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group col-xs-12">
                                        <div class="form-group col-xs-12" style="text-align: center;">
                                            <?php echo $banner['iframe']; ?>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>
                            Danh sách
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="padding: 10px;">
                            <div class="col-md-6">
                                <a href="<?php echo base_url('admin/why/create') ?>" class="btn btn-primary"  >Thêm mới</a>
                            </div>
                            <div class="col-md-6">
                                <form action="<?php echo base_url('admin/why/index') ?>" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="search" value="<?php echo $keywords ?>">
                                        <span class="input-group-btn">
                                            <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="table-responsive">
                                <table id="table" class="table table_product">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên câu hỏi</th>
                                        <th>Đường dẫn tĩnh</th>
                                        <th>Icon</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $serial = 1; ?>
                                        <?php if ($result): ?>
                                            <?php foreach ($result as $key => $value): ?>
                                                <tr class="remove-<?= $value['id'] ?>">
                                                    <td><?= $serial ?></td>
                                                    <td>
                                                        <div class="mask_sm">
                                                            <img src="<?= base_url('assets/upload/why/' . $value['slug'] . '/' . $value['image']) ?>"  width=150px height=100px>
                                                        </div>
                                                    </td>
                                                    <td><?= $value['title'] ?></td>
                                                    <td>
                                                        <?php echo $value['slug'] ?>
                                                    </td>
                                                    <td>
                                                        <i class="fa fa-3x <?php echo $value['icon'] ?>" aria-hidden="true" ></i>
                                                    </td>
                                                    <td class="is-active-<?= $value['id'] ?>">
                                                        <?php
                                                            if ($value['is_active'] == 0) {
                                                                echo '<span class="label label-warning">Chờ duyệt</span>';
                                                            }else{
                                                                echo '<span class="label label-success">Đã duyệt</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('admin/why/detail/' . $value['id'] ) ?>" title="Xem chi tiết">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a href="<?= base_url('admin/why/edit/' . $value['id'] ) ?>" style="color: #f0ad4e" title="Cập nhật">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                            <?php //if (handle_common_permission_active_and_remove()): ?>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="javascript:void(0)" class="btn-remove" data-id="<?= $value['id'] ?>" data-url="<?= base_url('admin/why/remove' ) ?>" data-name="danh mục"  style="color: #d9534f" title="Xóa">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="javascript:void(0)" class="btn-active" title="Duyệt bài" data-id="<?= $value['id'] ?>" data-url="<?= base_url('admin/why/active' ) ?>" style="color: #00a65a" >
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="javascript:void(0)" class="btn-deactive" title="Tắt danh mục" data-id="<?= $value['id'] ?>" data-url="<?= base_url('admin/why/deactive' ) ?>" style="color: #f0ad4e">
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                            </a>
                                                            <?php //endif ?>
                                                    </td>
                                                </tr>
                                                <?php $serial++ ?>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6">
                                                    Chưa có dịch vụ
                                                </td>
                                                
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links ?>
                        </div>
                    <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>