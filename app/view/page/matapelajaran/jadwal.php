<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jadwal Pelajaran</title>
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
            <h4 class="panel-heading">Jadwal Pelajaran</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=jadwal-pelajaran" aria-current="page"
                                class="text-decoration-none text-primary">Jadwal Pelajaran</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container shadow">
            <div class="card-header py-2">
                <h4 class="card-title">Jadwal Pelajaran</h4>
                <button type="button" data-bs-target="#collapseWidthExample" data-bs-toggle="collapse"
                    aria-current="page" class="btn btn-danger btn-sm" aria-controls="collapseWidthExample">
                    <?php if(isset($_GET['edit'])){ ?>
                    <i class="fa fa-edit fa-1x"></i>
                    <span>Edit Pelajaran</span>
                    <?php }else{ ?>
                    <i class="bi bi-plus fa-1x"></i>
                    <span>Tambah Pelajaran</span>
                    <?php } ?>
                </button>
                <a href="?page=jadwal-pelajaran" aria-current="page" class="btn btn-info btn-sm">
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
                                <h4 class="card-title">Edit Pelajaran</h4>
                                <?php }else{ ?>
                                <h4 class="card-title">Tambah Pelajaran</h4>
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <form action="?aksi=tambah-pelajaran" method="post">
                                    <?php 
                                    if(isset($_GET['edit'])){
                                        $id = htmlspecialchars($_GET['edit']);
                                        $sql = "SELECT * FROM pelajaran WHERE id_pelajaran='$id'";
                                        $data = $konfigs->query($sql);
                                    while($s = mysqli_fetch_array($data)){
                                    ?>
                                    <?php } ?>
                                    <div class="form-group mt-1 mt-lg-1">
                                        <input type="hidden" name="id_pelajaran" value="<?php echo $id?>">
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Kode Pelajaran</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="kode_pelajaran"
                                                    value="<?php echo $s['kode_pelajaran']?>" class="form-control"
                                                    required aria-required="TRUE" aria-label="kode pelajaran"
                                                    placeholder="masukkan kode pelajaran ..." maxlength="10" id="">
                                            </div>
                                        </div>
                                        <div class="border my-1 border-bottom"></div>
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Nama Pelajaran</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="nama_idn" value="<?php echo $s['nama_idn']?>"
                                                    class="form-control" required aria-required="TRUE"
                                                    aria-label="nama pelajaran"
                                                    placeholder="masukkan nama pelajaran ..." maxlength="100" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="form-group mt-1 mt-lg-1">
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Kode Pelajaran</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="kode_pelajaran" class="form-control" required
                                                    aria-required="TRUE" aria-label="kode pelajaran"
                                                    placeholder="masukkan kode pelajaran ..." maxlength="10" id="">
                                            </div>
                                        </div>
                                        <div class="border my-1 border-bottom"></div>
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Nama Pelajaran</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="nama_idn" class="form-control" required
                                                    aria-required="TRUE" aria-label="nama pelajaran"
                                                    placeholder="masukkan nama pelajaran ..." maxlength="100" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="card-footer text-end mt-1 mt-lg-1">
                                        <?php if(isset($_GET['edit'])){ ?>
                                        <button type="submit" class="btn btn-secondary btn-sm">
                                            <span>Update</span>
                                        </button>
                                        <?php }else{ ?>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <span>Simpan</span>
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <span>Hapus semua</span>
                                        </button>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body mt-1">
                <div class="container">
                    <form action="" method="post">
                        <input type="search" name="cari" required aria-controls="example2_filter" id="example1_filter">
                    </form>
                    <div class="fs-6 d-flex justify-content-start align-items-start flex-wrap">
                        Status Pelajaran :
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
                                        <th class="table-layout-2 text-center">Kode Pelajaran</th>
                                        <th class="table-layout-2 text-center">Nama Pelajaran</th>
                                        <th class="table-layout-2 text-center">Status Pelajaran</th>
                                        <th class="table-layout-2 text-center">Opsional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $data = $konfigs->query("SELECT * FROM pelajaran order by id_pelajaran asc");
                                        while($isi = $data->fetch_array()){
                                    ?>
                                    <tr>
                                        <td class="text-center table-layout-2"><?php echo $no; ?></td>
                                        <td class="text-center table-layout-2">
                                            <?php echo $isi['kode_pelajaran']; ?>
                                        </td>
                                        <td class="text-center table-layout-2"><?php echo $isi['nama_idn']; ?></td>
                                        <td class="text-center table-layout-2">
                                            <form action="?aksi=select-pelajaran" method="post">
                                                <input type="hidden" name="id_pelajaran"
                                                    value="<?php echo $isi['id_pelajaran']?>">
                                                <div class="form-switch form-check">
                                                    <input type="checkbox" name="status" value="0"
                                                        class="form-check-input" onchange="this.form.submit()"
                                                        <?php if($isi['status'] == "0"){?> checked <?php } ?> required
                                                        id=""> off /
                                                    <input type="checkbox" name="status" value="1"
                                                        class="form-check-input" onchange="this.form.submit()"
                                                        <?php if($isi['status'] == "1"){?> checked <?php } ?> required
                                                        id=""> on
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center table-layout-2">
                                            <a href="?page=jadwal-pelajaran&edit=<?php echo $isi['id_pelajaran']?>"
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