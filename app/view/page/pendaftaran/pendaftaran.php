<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pendaftaran Santri</title>
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
        <div class="col-lg-8 col-xl-12">
            <div class="row">
                <div class="panel panel-default">
                    <h4 class="panel-heading">Pendaftaran Santri</h4>
                    <div class="panel-body">
                        <div class="d-flex justify-content-end align-items-end flex-wrap">
                            <div class="breadcrumb">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=beranda" aria-current="page"
                                        class="text-decoration-none text-primary">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=pendaftaran-santri" aria-current="page"
                                        class="text-decoration-none text-primary">Pendaftaran
                                        Santri</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title">Data Pendaftaran Santri</h4>
                        <a href="" aria-current="page" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-plus fa-1x"></i>
                            <span>Tambah Pendaftaran</span>
                        </a>
                        <a href="?page=pendaftaran-santri" aria-current="page" class="btn btn-sm btn-outline-dark">
                            <i class="fa fa-refresh fa-1x"></i>
                            <span>Refresh Page</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="overflow-auto">
                                <table class="table-layout" id="example1">
                                    <thead></thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>