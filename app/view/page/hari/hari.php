<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jadwal Hari Pelajaran</title>
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
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel container panel-default bg-body-secondary">
            <h4 class="panel-heading">Jadwal Hari Pelajaran</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=hari-jadwal" aria-current="page"
                                class="text-decoration-none text-primary">Jadwal Hari Pelajaran</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container">
            <div class="card-header py-2">
                <h4 class="card-title">Jadwal Hari Pelajaran</h4>
                <button type="button" data-bs-target="#collapseWidthExample" data-bs-toggle="collapse"
                    aria-current="page" class="btn btn-danger btn-sm" aria-controls="collapseWidthExample">
                    <?php if(isset($_GET['edit'])){ ?>
                    <i class="fa fa-edit fa-1x"></i>
                    <span>Edit Hari</span>
                    <?php }else{ ?>
                    <i class="bi bi-plus fa-1x"></i>
                    <span>Tambah Hari</span>
                    <?php } ?>
                </button>
                <a href="?page=hari-jadwal" aria-current="page" class="btn btn-info btn-sm">
                    <i class="fa fa-refresh fa-1x"></i>
                    <span>Refresh Page</span>
                </a>
                <a href="?page=matapelajaran" aria-current="page" class="btn btn-secondary btn-sm">
                    <span>Mata Pelajaran</span>
                </a>
                <div class="collapse collapse-horizontal" id="collapseWidthExample">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <?php if(isset($_GET['edit'])){ ?>
                                <h4 class="card-title">Edit Hari</h4>
                                <?php }else{ ?>
                                <h4 class="card-title">Tambah Hari</h4>
                                <?php } ?>
                            </div>
                            <div class="card-body mt-1">
                                <form action="?aksi=tambah-hari" method="post">
                                    <?php 
                                    if(isset($_GET['edit'])){
                                        $id = htmlspecialchars($_GET['edit']);
                                        $data = $konfigs->query("SELECT * FROM hari WHERe id_hari = '$id'");
                                        while($row = $data->fetch_array()){
                                    ?>
                                    <div class="form-group">
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Nama Hari</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="nama_idn" value="<?php echo $row['nama_idn']?>"
                                                    class="form-control" required aria-required="TRUE"
                                                    aria-label="nama hari" placeholder="masukkan nama hari ..."
                                                    maxlength="12" id="">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-secondary">
                                            Update
                                        </button>
                                    </div>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <div class="form-group">
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Nama Hari</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="nama_idn" class="form-control" required
                                                    aria-required="TRUE" aria-label="nama hari"
                                                    placeholder="masukkan nama hari ..." maxlength="12" id="">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Simpan
                                        </button>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body mt-1">
                <div class="container">
                    <form action="" method="post">
                        <input type="search" name="cari" id="example1_filter" aria-controls="example2_filter" required>
                    </form>
                    <div class="fs-6 d-flex justify-content-start align-items-start flex-wrap">
                        Status Hari :
                        <ol type="1">
                            <li>Jika off akan berwarna abu - abu, dan</li>
                            <li>Jika on akan berwarna biru</li>
                        </ol>
                    </div>
                    <div class="table-responsive">
                        <div class="d-table">
                            <table class="table-layout" id="example1">
                                <thead>
                                    <tr>
                                        <th class="table-layout-2 text-center">No.</th>
                                        <th class="table-layout-2 text-center">Nama Hari</th>
                                        <th class="table-layout-2 text-center">Status</th>
                                        <th class="table-layout-2 text-center">Opsional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $hari = $konfigs->query("SELECT * FROM hari order by id_hari asc");
                                        while($nama_hari = mysqli_fetch_array($hari)){
                                    ?>
                                    <tr>
                                        <td class="text-center table-layout-2"><?php echo $no; ?></td>
                                        <td class="text-center table-layout-2"><?php echo $nama_hari['nama_idn'] ?></td>
                                        <td class="text-center table-layout-2">
                                            <form action="?aksi=select-hari" method="post">
                                                <input type="hidden" name="id_hari"
                                                    value="<?php echo $nama_hari['id_hari']?>">
                                                <div class="form-switch form-check">
                                                    <input type="checkbox" name="status" value="0"
                                                        class="form-check-input" onchange="this.form.submit()"
                                                        <?php if($nama_hari['status'] == "0"){?> checked <?php } ?>
                                                        required id=""> off /
                                                    <input type="checkbox" name="status" value="1"
                                                        class="form-check-input" onchange="this.form.submit()"
                                                        <?php if($nama_hari['status'] == "1"){?> checked <?php } ?>
                                                        required id=""> on
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center table-layout-2">
                                            <a href="?page=hari-jadwal&edit=<?php echo $nama_hari['id_hari']?>"
                                                aria-current="page" class="rounded-5 btn btn-outline-dark">
                                                <i class="fa fa-edit fa-1x"></i>
                                            </a>
                                        </td>
                                    </tr>
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
        <?php require_once("../ui/footer.php"); ?>