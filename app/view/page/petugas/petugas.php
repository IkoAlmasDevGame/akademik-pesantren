<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Petugas / Administrasi</title>
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
        <style type="text/css">
        .error {
            color: red;
            display: none;
        }

        .success {
            color: green;
            display: none;
        }
        </style>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="panel container panel-default bg-body-secondary">
            <h4 class="panel-heading">Petugas Administrasi</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=petugas" aria-current="page"
                                class="text-decoration-none text-primary">Petugas Administrasi</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container mb-4">
            <div class="card-header py-2">
                <h4 class="card-title">Data Petugas atau Administrasi</h4>
                <button type="button" data-bs-target="#collapseWidthExample" data-bs-toggle="collapse"
                    aria-current="page" class="btn btn-danger" aria-controls="collapseWidthExample">
                    <?php if(isset($_GET['edit'])){ ?>
                    <i class="fa fa-edit fa-1x"></i>
                    <span>Edit Petugas</span>
                    <?php }else{ ?>
                    <i class="bi bi-plus fa-1x"></i>
                    <span>Tambah Petugas</span>
                    <?php } ?>
                </button>
                <a href="?page=petugas" aria-current="page" class="btn btn-info">
                    <i class="fa fa-refresh fa-1x"></i>
                    <span>Refresh Page</span>
                </a>
                <div class="collapse collapse-horizontal" id="collapseWidthExample">
                    <div class="col-sm-8">
                        <div class="card shadow mb-4">
                            <div class="card-header py-2">
                                <?php if(isset($_GET['edit'])){ ?>
                                <h4 class="card-title">Edit Petugas</h4>
                                <?php }else{ ?>
                                <h4 class="card-title">Tambah Petugas</h4>
                                <?php } ?>
                            </div>
                            <form action="?aksi=tambah-petugas" method="post">
                                <?php 
                                    if(isset($_GET['edit'])){
                                        $id = htmlspecialchars($_GET['edit']);
                                        $sql = "SELECT * FROM users WHERE id_akun='$id'";
                                        $data = $konfigs->query($sql);
                                    while($s = mysqli_fetch_array($data)){
                                    ?>
                                <div class="card-body mt-1">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <input type="hidden" name="id_akun" value="<?php echo $s['id_akun']?>">
                                                <div class="form-inline col-sm-5">
                                                    <div class=" form-label">
                                                        <label for="" class="label label-default">Username</label>
                                                    </div>
                                                    <input type="text" placeholder="ketikkan username baru ..."
                                                        maxlength="80" value="<?php echo $s['username']?>"
                                                        name="username" class="form-control" required
                                                        aria-required="TRUE" id="">
                                                </div>
                                                <div class="form-inline col-sm-5">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Email</label>
                                                    </div>
                                                    <input type="email" maxlength="255" name="email"
                                                        value="<?php echo $s['email']?>" class="form-control" required
                                                        aria-required="TRUE" placeholder="ketikkan email baru ..."
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <div class="form-inline col-sm-5">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Nama Petugas</label>
                                                    </div>
                                                    <input type="text" maxlength="100" value="<?php echo $s['nama']?>"
                                                        placeholder="ketikkan nama petugas ..." name="nama"
                                                        class="form-control" required aria-required="TRUE" id="">
                                                </div>
                                                <div class="form-inline col-sm-5">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Password</label>
                                                    </div>
                                                    <input type="password" placeholder="ketikkan password baru ..."
                                                        maxlength="255" name="password" class="form-control" required
                                                        aria-required="TRUE" id="passwrd">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <div class="form-inline col-sm-5">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Repassword</label>
                                                    </div>
                                                    <input type="password" placeholder="ketikkan repassword ..."
                                                        maxlength="255" name="repassword" class="form-control" required
                                                        aria-required="TRUE" id="repasswrd">
                                                </div>
                                                <p class="error" id="error">
                                                    Password dan Repassword anda tidak cocok</p>
                                                <p class="success" id="success">
                                                    Password dan Repassword anda cocok
                                                </p>
                                            </div>
                                            <div class="form-inline">
                                                <div class="form-label">
                                                    <label for="" class="label label-default">Jabatan</label>
                                                </div>
                                                <input type="radio" name="role" <?php if($s['role'] == "superadmin"){?>
                                                    checked <?php } ?> class="radio radio-inline mx-2"
                                                    value="superadmin" id="">Superadmin
                                                <input type="radio" name="role" <?php if($s['role'] == "admin"){?>
                                                    checked <?php } ?> class="radio radio-inline mx-2" value="admin"
                                                    id="">Admin
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-secondary btn-sm">
                                                <i class="fa fa-save fa-1x"></i>
                                                <span>Update</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                }else{
                                ?>
                                <div class="card-body mt-1">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="form-inline col-sm-5">
                                                <div class="form-label">
                                                    <label for="" class="label label-default">Username</label>
                                                </div>
                                                <input type="text" placeholder="ketikkan username baru ..."
                                                    maxlength="80" name="username" class="form-control" required
                                                    aria-required="TRUE" id="">
                                            </div>
                                            <div class="form-inline col-sm-5">
                                                <div class="form-label">
                                                    <label for="" class="label label-default">Email</label>
                                                </div>
                                                <input type="email" maxlength="255" name="email" class="form-control"
                                                    required aria-required="TRUE" placeholder="ketikkan email baru ..."
                                                    id="">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="form-inline col-sm-5">
                                                <div class="form-label">
                                                    <label for="" class="label label-default">Nama Petugas</label>
                                                </div>
                                                <input type="text" maxlength="100"
                                                    placeholder="ketikkan nama petugas ..." name="nama"
                                                    class="form-control" required aria-required="TRUE" id="">
                                            </div>
                                            <div class="form-inline col-sm-5">
                                                <div class="form-label">
                                                    <label for="" class="label label-default">Password</label>
                                                </div>
                                                <input type="password" placeholder="ketikkan password baru ..."
                                                    maxlength="255" name="password" class="form-control" required
                                                    aria-required="TRUE" id="passwrd">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="form-inline col-sm-5">
                                                <div class="form-label">
                                                    <label for="" class="label label-default">Repassword</label>
                                                </div>
                                                <input type="password" placeholder="ketikkan repassword ..."
                                                    maxlength="255" name="repassword" class="form-control" required
                                                    aria-required="TRUE" id="repasswrd">
                                            </div>
                                            <p class="error" id="error">
                                                Password dan Repassword anda tidak cocok</p>
                                            <p class="success" id="success">
                                                Password dan Repassword anda cocok
                                            </p>
                                        </div>
                                        <div class="form-inline">
                                            <div class="form-label">
                                                <label for="" class="label label-default">Jabatan</label>
                                            </div>
                                            <input type="radio" name="role" class="radio radio-inline mx-2"
                                                value="admin" id="">Admin
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-save fa-1x"></i>
                                                <span>Simpan</span>
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-eraser fa-1x"></i>
                                                <span>Hapus semua</span>
                                            </button>
                                        </div>
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
                    <?php require_once("../petugas/functions.php") ?>
                </div>
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
                                        <th class="table-layout-2 text-center">Username</th>
                                        <th class="table-layout-2 text-center">Email</th>
                                        <th class="table-layout-2 text-center">Nama Petugas</th>
                                        <th class="table-layout-2 text-center">Password</th>
                                        <th class="table-layout-2 text-center">Repassword</th>
                                        <th class="table-layout-2 text-center">Jabatan</th>
                                        <th class="table-layout-2 text-center">Optional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $table = "users";
                                        $sql = "SELECT * FROM users order by id_akun asc";
                                        $data = $konfigs->query($sql);
                                    while($isi = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td class="table-layout-2 text-center"><?php echo $no; ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['username'] ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['email'] ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['nama'] ?></td>
                                        <td class="table-layout-2 text-center"><?php echo "Ter-Enkripsi" ?></td>
                                        <td class="table-layout-2 text-center"><?php echo "Ter-Enkripsi" ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['role'] ?></td>
                                        <td class="table-layout-2 text-center">
                                            <a href="?page=petugas&edit=<?=$isi['id_akun']?>" aria-current="page"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit fa-1x"></i>
                                            </a>
                                            <a href="?aksi=hapus-petugas&id_akun=<?=$isi['id_akun']?>"
                                                aria-current="page"
                                                onclick="return confirm('Apakah anda ingin menghapus data petugas ini ?')"
                                                class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash-alt fa-1x"></i>
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