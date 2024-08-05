<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Kelas Pesantren</title>
        <link rel="shortcut icon" href="../../../../assets/logo/<?=$row['icon']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "superadmin"  || $_SESSION['role'] == "admin"){
                require_once("../ui/header.php");
                require_once("../../../database/koneksi.php");
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                die;
                exit;
            }
            ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="panel container panel-default bg-body-secondary">
            <h4 class="panel-heading">Data Master Kelas</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=kelas" aria-current="page" class="text-decoration-none text-primary">Data
                                Master Kelas</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container shadow mb-4">
            <div class="card-header py-2">
                <h4 class="card-title">Data Master Kelas</h4>
                <a href="?page=kelas" aria-current="page" class="btn btn-info">
                    <i class="fa fa-1x fa-refresh"></i>
                    <span>Refresh Page</span>
                </a>
                <?php if($_SESSION['role'] == "superadmin"){ ?>
                <a href="?aksi=tambah-data-kelas" aria-current="page" class="btn btn-danger">
                    <i class="fa fa-1x fa-plus"></i>
                    <span>Tambah Master Kelas</span>
                </a>
                <?php } ?>
            </div>
            <div class="card-body mt-1">
                <form action="" method="post">
                    <input type="search" name="cari" required aria-controls="example2_filter" id="example1_filter">
                </form>
                <div class="container">
                    <div class="table-responsive">
                        <div class="d-table">
                            <table class="table-layout" id="example1">
                                <thead>
                                    <tr>
                                        <th class="table-layout-2 text-center">No.</th>
                                        <th class="table-layout-2 text-center">Kode Kelas</th>
                                        <th class="table-layout-2 text-center">Nama Kelas</th>
                                        <th class="table-layout-2 text-center">Kapasitas</th>
                                        <th class="table-layout-2 text-center">Wali Guru</th>
                                        <th class="table-layout-2 text-center">Opsional</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>