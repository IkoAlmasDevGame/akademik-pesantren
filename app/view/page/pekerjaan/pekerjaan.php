<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Master Pekerjaan</title>
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
        <div class="panel panel-default bg-body-secondary">
            <h4 class="panel-heading">Data Master Pekerjaan</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=pekerjaan" aria-current="page"
                                class="text-decoration-none text-primary">Pekerjaan</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <h4 class="card-title"></h4>
                <div class="container">
                    <button type="button" data-bs-target="#collapseWidthExample" data-bs-toggle="collapse"
                        aria-controls="collapseWidthExample" class="btn btn-primary" aria-expanded="false">
                        <?php if(isset($_GET['edit'])){ ?>
                        <span>Edit Pekerjaan</span>
                        <?php }else{ ?>
                        <span>Tambah Pekerjaan</span>
                        <?php } ?>
                    </button>
                    <div class="collapse collapse-horizontal" id="collapseWidthExample">
                        <div class="col-sm-3">
                            <div class="card shadow mb-4">
                                <div class="card-header py-2">
                                    <?php if(isset($_GET['edit'])){ ?>
                                    <h4 class="card-title">Edit Pekerjaan</h4>
                                    <?php }else{ ?>
                                    <h4 class="card-title">Tambah Pekerjaan</h4>
                                    <?php } ?>
                                </div>
                                <form action="?aksi=tambah-pekerjaan" method="post">
                                    <?php 
                                    if(isset($_GET['edit'])){
                                        $id = htmlspecialchars($_GET['edit']);
                                        $sql = "SELECT * FROM pekerjaan WHERE id_pekerjaan = '$id'";
                                        $data = $konfigs->query($sql);
                                    while($s = mysqli_fetch_array($data)){
                                ?>
                                    <div class="card-body mt-1">
                                        <input type="hidden" name="id_pekerjaan" value="<?php echo $id?>">
                                        <div class="form-group">
                                            <div class="form-inline">
                                                <div class="form-label">
                                                    <label for="" class="label label-default">Nama Pekerjaan</label>
                                                </div>
                                                <input type="text" name="nama_pekerjaan"
                                                    value="<?php echo $s['nama_pekerjaan']?>" aria-required="TRUE"
                                                    required class="form-control"
                                                    placeholder="masukkan nama pekerjaan ..." id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-save fa-1x"></i>
                                                <span>Update</span>
                                            </button>
                                        </div>
                                    </div>
                                    <?php
                                    } 
                                }else{
                                ?>
                                    <div class="card-body mt-1">
                                        <div class="form-group">
                                            <div class="form-inline">
                                                <div class="form-label">
                                                    <label for="" class="label label-default">Nama Pekerjaan</label>
                                                </div>
                                                <input type="text" name="nama_pekerjaan" aria-required="TRUE" required
                                                    class="form-control" placeholder="masukkan nama pekerjaan ..."
                                                    id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-save fa-1x"></i>
                                                <span>Simpan</span>
                                            </button>
                                            <button type="reset" class="btn btn-warning">
                                                <i class="fa fa-eraser fa-1x"></i>
                                                <span>Hapus</span>
                                            </button>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 mb-1">
                        <?php require_once("../pekerjaan/functions.php") ?>
                    </div>
                </div>
            </div>
            <div class="card-body mt-1">
                <div class="table-responsive">
                    <form action="" method="post">
                        <input type="search" name="cari" required aria-controls="example2_filter" id="example1_filter">
                    </form>
                    <div class="container">
                        <div class="table d-table d-lg-table">
                            <table class="table-layout" id="example1">
                                <thead>
                                    <tr>
                                        <th class="table-layout-2 text-center">No.</th>
                                        <th class="table-layout-2 text-center">Nama Pekerjaan</th>
                                        <th class="table-layout-2 text-center">Optional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $table = "pekerjaan";
                                        $sql = "SELECT * FROM pekerjaan order by id_pekerjaan asc";
                                        $data = $konfigs->query($sql);
                                        while($isi = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td class="table-layout-2 text-center"><?php echo $no; ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['nama_pekerjaan'] ?></td>
                                        <td class="table-layout-2 text-center">
                                            <a href="" onclick="return confirm('Apakah anda ingin hapus data ini ?')"
                                                aria-current="page" class="btn btn-danger">
                                                <i class="fa fa-trash fa-1x"></i>
                                            </a>
                                            <a href="?page=pekerjaan&edit=<?php echo $isi['id_pekerjaan']?>"
                                                onclick="return confirm('Apakah anda ingin edit data ini ?')"
                                                aria-current="page" class="btn btn-warning">
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
        <?php require_once("../ui/footer.php") ?>