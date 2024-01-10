<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Laundry</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>img/laundry-icon.png" type="image/png">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <?php
                $role = session()->get('role');
                $id_outlet = session()->get('id_outlet');
            ?>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-soap"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Clean Laundry</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php if($role === 'admin') : ?>

            <!-- Nav Item - Outlet -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('outlet') ?>">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Outlet</span>
                </a>
            </li>

            <?php endif; ?>

            <?php if($role === 'kasir') : ?>

            <!-- Nav Item - Transaksi -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('transaksi/' . $id_outlet) ?>">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <?php endif; ?>

            <?php if($role === 'admin' or $role === 'kasir') : ?>

            <!-- Nav Item - Member -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('member') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Member</span>
                </a>
            </li>

            <?php endif; ?>

            <?php if($role === 'owner') : ?>

            <!-- Nav Item - Generate Laporan -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('transaksi/' . $id_outlet . '/detail/owner') ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Generate Laporan</span>
                </a>
            </li>

            <?php endif; ?>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->

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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php include(APPPATH . 'Views\content\message.php') ?>
                    <?= $this->renderSection('content') ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>js/demo/chart-pie-demo.js"></script>

</body>

</html>