<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->

    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= base_url() ?>assets/dist/img/logo.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">ARBIFA COLLECTION</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="<?= base_url() ?>admin" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>
                                Stok Barang
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">6</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>barcode/lantai1" class="nav-link">
                                    <i class="far fa-cog"></i>
                                    <i class="fas fa-toggle-on"></i>
                                    <p>Lantai 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>barcode/lantai2" class="nav-link">
                                    <i class="far fa-cog"></i>
                                    <i class="fas fa-toggle-on"></i>
                                    <p>Lantai 2</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon  fas fa-angle-double-right"></i>
                            <p>
                                Barang Masuk/Keluar
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">6</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>barang/masuk" class="nav-link">
                                    <i class="far fa-cog"></i>
                                    <i class=" fas fa-arrow-alt-circle-down"></i>
                                    <p>Barang Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>barang/keluar" class="nav-link">
                                    <i class="far fa-cog"></i>
                                    <i class=" fas fa-arrow-alt-circle-up"></i>
                                    <p>Barang Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php if ($user['level'] == 1) { ?>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>barang/addproduk" class="nav-link">
                                <i class=" nav-icon fas fa-tools"></i>
                                <p>Setting Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>karyawan" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>laporan" class="nav-link mb-5">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                    <?php } ?>

                    <!-- <li class="nav-item"> -->
                    <a href="<?= base_url() ?>auth/logout" class="btn btn-danger">
                        <i class="nav-icon fas fa-power-off"></i>
                        <!-- <p>Logout</p> -->
                    </a>
                    <!-- </li> -->
                </ul>
            </nav>
        </div>
    </aside>