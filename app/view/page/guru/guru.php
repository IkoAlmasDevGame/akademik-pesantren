<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Guru Pesantren</title>
        <link rel="shortcut icon" href="../../../../assets/logo/<?=$row['icon']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "superadmin"){
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
            <h4 class="panel-heading">Data Master Guru</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=guru" aria-current="page" class="text-decoration-none text-primary">Data
                                Master Guru</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container mb-4">
            <div class="card-header py-2">
                <a href="?aksi=tambah-data-guru" aria-current="page" class="btn btn-danger">
                    <i class="fa fa-plus fa-1x"></i>
                    <span>Tambah Guru</span>
                </a>
                <a href="?page=guru" aria-current="page" class="btn btn-info">
                    <i class="fa fa-refresh fa-1x"></i>
                    <span>Refresh Page</span>
                </a>
            </div>
            <div class="card-body mt-1">
                <form action="" method="post">
                    <input type="search" name="cari" required aria-controls="example2_filter" id="example1_filter">
                </form>
                <div class="container">
                    <div class="table-responsive">
                        <div class="d-table">
                            <table class="table-layout-guru" id="example1">
                                <thead>
                                    <tr>
                                        <th class="table-layout-2 text-center">No.</th>
                                        <th class="table-layout-2 text-center">Niptk</th>
                                        <th class="table-layout-2 text-center">Nama Guru</th>
                                        <th class="table-layout-2 text-center">Tempat Lahir</th>
                                        <th class="table-layout-2 text-center">Tangal Lahir</th>
                                        <th class="table-layout-2 text-center">Jenis Kelamin</th>
                                        <th class="table-layout-2 text-center">Photo Guru</th>
                                        <th class="table-layout-2 text-center">Opsional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $table = "guru";
                                        $sql = "SELECT * FROM guru order by id_guru asc";
                                        $data = $konfigs->query($sql);
                                        while($isi = mysqli_fetch_array($data)){
                                    ?>
                                    <?php
                                    $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>