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
                            <a href="?aksi=ubah-data-kelas&id_kelas=<?php echo $_GET['id_kelas']?>" aria-current="page"
                                aria-label="kelas" class="text-decoration-none text-primary">Ubah Data Master
                                Kelas</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container shadow">
            <div class="card-body">
                <?php 
                    if(isset($_GET['id_kelas'])){
                        $id = htmlspecialchars($_GET['id_kelas']);
                        $table = "kelas";
                        $data = $konfigs->query("SELECT * FROM $table WHERE id_kelas = '$id'");
                    while($isi = mysqli_fetch_array($data)){
                ?>
                <form action="?aksi=tambah-kelas" method="post">
                    <input type="hidden" name="id_kelas" value="<?php echo $id;?>">
                    <div class="shadow-none mb-4 mt-4">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="card col-sm-6 col-md-6">
                                <div class="card-body mt-1">
                                    <div class="card-header py-2">
                                        <h4 class="card-title text-center">Ubah Data Kelas</h4>
                                    </div>
                                    <div class="form-group mt-1 mt-lg-1">
                                        <div class="border border-top my-1"></div>
                                        <div class="form-inline row justify-content-center
                                             align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Kode Kelas</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="kode_kelas"
                                                    value="<?php echo $isi['kode_kelas']?>" class="form-control"
                                                    required aria-required="TRUE" aria-label="Kode Kelas"
                                                    placeholder="masukkan kode kelas ..." maxlength="10" id="">
                                            </div>
                                        </div>
                                        <div class="border border-top my-1"></div>
                                        <div class="form-inline row justify-content-center
                                             align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Nama Kelas</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="nama_kelas"
                                                    value="<?php echo $isi['nama_kelas']?>" class="form-control"
                                                    required aria-required="TRUE" aria-label="Nama Kelas"
                                                    placeholder="masukkan nama kelas ..." maxlength="80" id="">
                                            </div>
                                        </div>
                                        <div class="border border-top my-1"></div>
                                        <div class="form-inline row justify-content-center
                                             align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Kapasitas</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" inputmode="numeric"
                                                    value="<?php echo $isi['kapasitas']?>" name="kapasitas"
                                                    class="form-control" required aria-required="TRUE"
                                                    aria-label="kapasitas Kelas"
                                                    placeholder="masukkan kapasitas kelas ..." maxlength="11" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                        <a href="?page=kelas" aria-current="page" class="btn btn-default">Cancel</a>
                                        <button type="reset" class="btn btn-danger">
                                            Hapus Semua
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                    } 
                }
                ?>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>