<?php
if($this->ion_auth->logged_in()) {
?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/lib/dist/img/user.jpg') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>
                        <?php 
                            if ($this->ion_auth->logged_in()) {
                                echo $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name;
                            }
                        ?> 
                    </p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php echo ($this->uri->segment(2) == 'dashboard')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin') ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'banner')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/banner') ?>">
                        <i class="fa fa-inbox"></i> <span>Quản lý banner</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'news')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/news') ?>">
                        <i class="fa fa-newspaper-o"></i> <span>Quản lý news</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'doctor')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/doctor') ?>">
                        <i class="fa fa-user-md" aria-hidden="true"></i> <span>Quản lý doctors</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'transform')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/transform') ?>">
                        <i class="fa fa-users" aria-hidden="true"></i> <span>Quản lý thông tin khách hàng</span>
                    </a>
                </li>
                <!-- Show slide About -->
                <li class="treeview <?php echo ($this->uri->segment(2) == 'about_category' || $this->uri->segment(2) == 'about' )? 'active' : '' ?>" style="border-bottom: none;">
                    <a href="">
                        <i class="fa fa-bars"></i>
                        <span>Quản lý about</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo ( $this->uri->segment(2) == 'about_category' )? 'active' : '' ?>" >
                            <a href="<?php echo base_url('admin/about_category') ?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span>Danh Mục</span></a>
                        </li>
                        <li class="<?php echo ( $this->uri->segment(2) == 'about' )? 'active' : '' ?>" >
                            <a href="<?php echo base_url('admin/about') ?>"><i class="fa fa-leanpub" aria-hidden="true"></i> <span>Bài viết</span></a>
                        </li>
                    </ul>
                </li>
                <!-- Show slide Academy -->
                <li class="treeview <?php echo ($this->uri->segment(2) == 'academy_category' || $this->uri->segment(2) == 'academy' )? 'active' : '' ?>" style="border-bottom: none;">
                    <a href="">
                        <i class="fa fa-bars"></i>
                        <span>Quản lý academy</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo ( $this->uri->segment(2) == 'academy_category' )? 'active' : '' ?>" >
                            <a href="<?php echo base_url('admin/academy_category') ?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span>Danh Mục</span></a>
                        </li>
                        <li class="<?php echo ( $this->uri->segment(2) == 'academy' )? 'active' : '' ?>" >
                            <a href="<?php echo base_url('admin/academy') ?>"><i class="fa fa-leanpub" aria-hidden="true"></i> <span>Bài viết</span></a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php echo ($this->uri->segment(2) == 'service_category' || $this->uri->segment(2) == 'service_category_sub_1' )? 'active' : '' ?>" style="border-bottom: none;">
                    <a href="">
                        <i class="fa fa-bars"></i>
                        <span>Danh Mục Dịch Vụ</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo ( $this->uri->segment(2) == 'service_category' )? 'active' : '' ?>" >
                            <a href="<?php echo base_url('admin/service_category') ?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span>Danh Mục Gốc</span></a>
                        </li>
                        <li class="<?php echo ( $this->uri->segment(2) == 'service_category_sub_1' )? 'active' : '' ?>" >
                            <a href="<?php echo base_url('admin/service_category_sub_1') ?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span>Danh Mục Cấp 2</span></a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'service')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/service') ?>">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Dịch Vụ</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'customer')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/customer') ?>">
                        <i class="fa fa-address-card" aria-hidden="true"></i> <span>Đối Tác</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'why')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/why') ?>">
                        <i class="fa fa-question-circle" aria-hidden="true"></i> <span>Tại Sao Chọn Chúng Tôi</span>
                    </a>
                </li>
                <li class="header">DOCUMENTATION</li>
                <li>
                    <a href="<?php echo base_url('admin/user/change_password') ?>">
                        <i class="fa fa-refresh" aria-hidden="true"></i> <span>Đổi Mật Khẩu</span>
                    </a>
                </li>
                <?php if ($this->ion_auth->is_admin()===TRUE): ?>
                    <li>
                        <a href="<?php echo base_url('admin/user/register') ?>">
                            <i class="fa fa-registered" aria-hidden="true"></i> <span>Tạo tài khoản</span>
                        </a>
                    </li>
                <?php endif ?>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php } ?>



