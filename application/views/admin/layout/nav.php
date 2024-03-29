<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Button View Site -->
                <li class="nav-item no-arrow mx-1">
                    <div class="nav-link">
                        <a href="<?php echo base_url(); ?>" target="_blank" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i> View Site</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
                        <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/sbadmin/img/blank.png">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <p class="dropdown-item font-weight-bold text-primary">
                            <i class="fas fa-info fa-sm fa-fw mr-2 text-gray-400"></i>User Info
                        </p>
                        <div class="dropdown-divider"></div>
                        <p class="dropdown-item">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?php echo $this->session->userdata('akses_level'); ?>
                        </p>
                        <p class="dropdown-item">
                            <i class="fas fa-calendar fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?php echo date('d M Y') ?>
                        </p>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->