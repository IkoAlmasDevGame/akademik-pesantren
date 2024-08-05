<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Kelas Pesantren</title>
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
            <h4 class="panel-heading">Data Master Kelas</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=kelas" aria-current="page" aria-label="master kelas"
                                class="text-decoration-none text-primary">Data Master Kelas</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?aksi=tambah-data-kelas" aria-current="page" aria-label="kelas"
                                class="text-decoration-none text-primary">Tambah Data Master Kelas</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container shadow">
            <div class="card-body">
                <form action="" method="post"></form>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>