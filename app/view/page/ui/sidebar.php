<?php 
if($_SESSION["role"] == ""){
    echo "<script>document.location.href = '../../auth/login.php'</script>";
    die;
    exit;
}
?>

<?php 
if($_SESSION['role'] == "superadmin"){
?>
<header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
            <?php echo $row['nama_sekolah'] ?>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto mx-3">
        <ul>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                    data-bs-toggle="dropdown" aria-controls="dropdown">
                    <i class="fa fa-user-alt"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <hr class="dropdown-divider">
                        <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                        <div class="mb-1"></div>
                        <div class="text-start">nama : <?php echo $_SESSION['nama'] ?></div>
                        <div class="mb-1"></div>
                        <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                        <hr class="dropdown-divider">
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<!-- ======= Header ======= -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=beranda">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=pendaftaran-santri">
                <i class="fa fa-registered"></i>
                <span>Pendaftaran Santri</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a href="#" data-bs-target="#master-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="master-nav" data-bs-parent="#sidebar-nav">
                <!-- <a href="" aria-current="page" class="nav-link">
                    <i class="bi bi-circle-fill fa-1x"></i>
                    <span>Absensi</span>
                    <i class="fa fa-pencil fs-5 ms-auto"></i>
                </a> -->
                <a href="" aria-current="page" class="nav-link">
                    <i class="bi bi-circle-fill fa-1x"></i>
                    <span>Santri</span>
                    <i class="fa fa-user-graduate fs-5 ms-auto"></i>
                </a>
                <a href="" aria-current="page" class="nav-link">
                    <i class="bi bi-circle-fill fa-1x"></i>
                    <span>Mata Pelajaran</span>
                    <i class="fa fa-book fs-5 ms-auto"></i>
                </a>
                <a href="" aria-current="page" class="nav-link">
                    <i class="bi bi-circle-fill fa-1x"></i>
                    <span>Guru</span>
                    <i class="fa fa-users fs-5 ms-auto"></i>
                </a>
                <a href="" aria-current="page" class="nav-link">
                    <i class="bi bi-circle-fill fa-1x"></i>
                    <span>Kelas</span>
                    <i class="fa-brands fa-meetup fs-5 ms-auto"></i>
                </a>
                <!-- <a href="" aria-current="page" class="nav-link">
                    <i class="bi bi-circle-fill fa-1x"></i>
                    <span>SPP</span>
                    <i class="fa fa-money-bill text-secondary fs-5 ms-auto"></i>
                </a> -->
            </ul>
        </li>

        <!-- <li class="nav-item">
            <a href="" data-bs-target="#laporan-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                <i class="bi bi-menu-button-wide"></i><span>Rekapitulasi Laporan</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="laporan-nav" data-bs-parent="#sidebar-nav">
                <a href="" aria-current="page" class="nav-link">
                    <i class="bi bi-circle-fill fa-1x"></i>
                    <span>Rekapitulasi Absensi</span>
                    <i class="fa fa-book-open shadow text-danger fs-5 ms-auto"></i>
                </a>
                <a href="" aria-current="page" class="nav-link">
                    <i class="bi bi-circle-fill fa-1x"></i>
                    <span>Rekapitulasi Pelajaran</span> 
                    <i class="fa fa-book-open fs-5 shadow text-secondary ms-auto"></i>
                </a>
            </ul>
        </li> -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=pengaturan">
                <i class="fa fa-gears fa-1x"></i>
                <span>Pengaturan</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                onclick="return confirm('Apakah anda ingin logout ?')">
                <i class="fa fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Blank Page Nav -->
    </ul>
</aside><!-- End Sidebar-->
<!-- ======= Sidebar ======= -->

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                </div>

            </div><!-- End Right side columns -->

        </div>
    </section>
    <?php
}elseif($_SESSION['role'] == "admin"){
?>
    <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
        <div class="d-flex align-items-center justify-content-between">
            <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
                <?php echo $row['nama_sekolah'] ?>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto mx-3">
            <ul>
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                        data-bs-toggle="dropdown" aria-controls="dropdown">
                        <i class="fa fa-user-alt"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <hr class="dropdown-divider">
                            <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                            <div class="mb-1"></div>
                            <div class="text-start">nama : <?php echo $_SESSION['nama'] ?></div>
                            <div class="mb-1"></div>
                            <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                            <hr class="dropdown-divider">
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" aria-current="page" href="?page=beranda">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Blank Page Nav -->

            <li class="nav-item">
                <a href="#" data-bs-target="#master-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                    <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="nav-content collapse" id="master-nav" data-bs-parent="#sidebar-nav">
                    <a href="" aria-current="page" class="nav-link">
                        <i class="bi bi-circle-fill fa-1x"></i>
                        <span>Santri</span>
                        <i class="fa fa-user-graduate fs-5 ms-auto"></i>
                    </a>
                    <a href="" aria-current="page" class="nav-link">
                        <i class="bi bi-circle-fill fa-1x"></i>
                        <span>Kelas</span>
                        <i class="fa-brands fa-meetup fs-5 ms-auto"></i>
                    </a>
                    <a href="" aria-current="page" class="nav-link">
                        <i class="bi bi-circle-fill fa-1x"></i>
                        <span>SPP</span>
                        <i class="fa fa-money-bill text-secondary fs-5 ms-auto"></i>
                    </a>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                    <i class="bi bi-menu-button-wide"></i><span>Data Transaksi</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="nav-content collapse" id="transaksi-nav" data-bs-parent="#sidebar-nav">
                    <a href="" aria-current="page" class="nav-link">
                        <i class="bi bi-circle-fill fa-1x"></i>
                        <span>Pembayaran SPP</span>
                        <i class="fa fa-money-bill text-secondary fs-5 ms-auto"></i>
                    </a>
                </ul>
            </li>

            <li class="nav-item">
                <a href="" data-bs-target="#laporan-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                    <i class="bi bi-menu-button-wide"></i><span>Rekapitulasi Laporan</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="nav-content collapse" id="laporan-nav" data-bs-parent="#sidebar-nav">
                    <a href="" aria-current="page" class="nav-link">
                        <i class="bi bi-circle-fill fa-1x"></i>
                        <span>Rekapitulasi Pembayaran</span>
                        <i class="fa fa-book-open fs-5 shadow text-secondary ms-auto"></i>
                    </a>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                    onclick="return confirm('Apakah anda ingin logout ?')">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Blank Page Nav -->
        </ul>
    </aside><!-- End Sidebar-->
    <!-- ======= Sidebar ======= -->

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                    </div>

                </div><!-- End Right side columns -->

            </div>
        </section>
        <?php
}else{
    echo "<script>
    document.location.href = '../../auth/login.php';
    </script>";
    die;
    exit;
}
?>