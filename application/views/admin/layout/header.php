<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dasbor') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-shopping-bag"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Lazadi</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/dasbor') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master
    </div>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('admin/transaksi') ?>">
            <i class="fas fa-check"></i>
            <span>Transaksi</span>
        </a>
    </li>

    <!-- Nav Item - Menu Produk -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComponents" aria-expanded="true" aria-controls="collapseComponents">
            <i class="fas fa-sitemap"></i>
            <span>Produk</span>
        </a>
        <div id="collapseComponents" class="collapse" aria-labelledby="headingComponents" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-table text-gray-500"></i> Data Produk</a>
                <a class="collapse-item" href="<?php echo base_url('admin/produk/tambah') ?>"><i class="fa fa-plus text-gray-500"></i> Tambah Produk</a>
                <a class="collapse-item" href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags text-gray-500"></i> Kategori Produk</a>
            </div>
    </li>

    <!-- Nav Item - Rekening -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('admin/rekening') ?>">
            <i class="fas fa-dollar-sign"></i>
            <span>Data Rekening</span>
        </a>
    </li>

    <!-- Nav Item - Menu User -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-users "></i>
            <span>Pengguna</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table text-gray-500"></i> Data Pengguna</a>
                <a class="collapse-item" href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus text-gray-500"></i> Tambah Pengguna</a>
            </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Konfigurasi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi') ?>">Konfigurasi Umum</a>
                <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi/logo') ?>">Konfigurasi Logo</a>
                <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi/icon') ?>">Konfigurasi Icon</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->