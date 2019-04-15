<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small>
                đăng ký theo dõi
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/subscribe') ?>"><i class="fa fa-dashboard"></i> Danh sách đăng ký theo dõi</a></li>
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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            Danh sách
                        </h3>
                    </div>

                    <div class="row" style="padding: 10px;">
                        <div class="col-md-6">
                            <button class="btn btn-success btn-send-email-all" data-url="<?php echo base_url('admin/subscribe/send_email_all') ?>">
                                <span class="glyphicon glyphicon-send"></span> &nbsp;Gửi tất cả E-Mail
                            </button>
                            <a class="btn btn-info btn-content-email" data-url="/subscribe/send-all" data-toggle="collapse" href="#mailContent" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-envelope-open" aria-hidden="true"></i> &nbsp;Nội dung E-Mail
                            </a>
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo base_url('admin/subscribe/index') ?>" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm Họ Tên, Số Điện Thoại, E-mail ..." name="search" value="<?php echo $keywords ?>">
                                    <span class="input-group-btn">
                                        <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="collapse" id="mailContent">
                            <div class="well">
                                <?php
                                echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'bootstrapTagsInputForm'));
                                ?>
                                <div class="form-group field-email-title required">
                                    <label class="control-label" for="email-title">Tiêu đề</label>
                                    <input type="text" id="email-title" class="form-control" name="title" maxlength="255" aria-required="true" value="<?php echo $email['title'] ?>">
                                    <div class="help-block"></div>
                                </div>
                                <div class="form-group field-email-description">
                                    <label class="control-label" for="email-description">Tóm tắt</label>
                                    <textarea id="email-description" class="form-control" name="description" rows="4"><?php echo $email['description'] ?></textarea>
                                    <div class="help-block"></div>
                                </div>
                                <div class="form-group field-email-body">
                                    <label class="control-label" for="email-body">Nội dung</label>
                                    <textarea id="email-body" class="form-control tinymce-area" name="body" rows="4"><?php echo $email['body'] ?></textarea>
                                    <div class="help-block"></div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success ajax-email-edit" data-url="/subscribe/save-email" data-id="1">Lưu thay đổi</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="table-responsive delete-checkbox">
                            <table id="table" class="table table_product">
                                <thead>
                                <tr>
                                    <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i> &nbsp&nbsp All</th>
                                    <th>No.</th>
                                    <th>Họ Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>E-Mail</th>
                                    <th>Thời gian đăng ký</th>
                                    <th>Tin nhắn</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $serial = 1; ?>
                                    <?php if ($result): ?>
                                        <?php foreach ($result as $key => $value): ?>
                                            <tr class="remove-<?= $value['id'] ?>">
                                                <td><input type="checkbox" name="is_delete[]" value="<?= $value['id'] ?>" class="is-delete-all" ></td>
                                                <td><?= $serial ?></td>
                                                <td><?= $value['name'] ?></td>
                                                <td><?= $value['phone'] ?></td>
                                                <td><?= $value['email'] ?></td>
                                                <td><?= date('d-m-Y', $value['created_at']) ?></td>
                                                <td><?= $value['message'] ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn-remove" data-id="<?= $value['id'] ?>" data-url="<?= base_url('admin/subscribe/remove' ) ?>" data-name="danh mục"  style="color: #d9534f" title="Xóa">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $serial++ ?>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6">
                                                Chưa có theo dõi
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

                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>