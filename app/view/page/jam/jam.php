<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jadwal Jam Pelajaran</title>
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
            <h4 class="panel-heading">Jadwal Jam Pelajaran</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=jam-jadwal" aria-current="page"
                                class="text-decoration-none text-primary">Jadwal Jam Pelajaran</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container">
            <div class="card-header py-2">
                <h4 class="card-title">Jam Pelajaran</h4>
                <button type="button" data-bs-target="#collapseWidthExample" data-bs-toggle="collapse"
                    aria-current="page" class="btn btn-danger btn-sm" aria-controls="collapseWidthExample">
                    <?php if(isset($_GET['edit'])){ ?>
                    <i class="fa fa-edit fa-1x"></i>
                    <span>Edit Jam</span>
                    <?php }else{ ?>
                    <i class="bi bi-plus fa-1x"></i>
                    <span>Tambah Jam</span>
                    <?php } ?>
                </button>
                <a href="?page=jam-jadwal" aria-current="page" class="btn btn-info btn-sm">
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
                                <h4 class="card-title">Edit Jam</h4>
                                <?php }else{ ?>
                                <h4 class="card-title">Tambah Jam</h4>
                                <?php } ?>
                            </div>
                            <div class="card-body mt-1">
                                <form action="?aksi=tambah-waktu" method="post">
                                    <?php if(isset($_GET['edit'])){ ?>
                                    <?php $id = htmlspecialchars($_GET['edit']); $data = $konfigs->query("SELECT * FROM jam WHERE jam_ke = '$id'"); ?>
                                    <?php while($row = $data->fetch_array()){ ?>
                                    <div class="form-group mt-1 mt-lg-1">
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Jam Mulai</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="time" name="mulai" value="<?php echo $row['mulai']?>"
                                                    class="form-control" required aria-required="TRUE"
                                                    aria-label="Jam Mulai"
                                                    placeholder="masukkan Jam Mulai Pelajaran ..." id="">
                                            </div>
                                        </div>
                                        <div class="border my-1 border-bottom"></div>
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Jam Selesai</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="time" name="selesai" value="<?php echo $row['selesai']?>"
                                                    class="form-control" required aria-required="TRUE"
                                                    aria-label="Jam Selesai" placeholder="masukkan Jam Selesai ..."
                                                    id="">
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <div class="form-group mt-1 mt-lg-1">
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Jam Mulai</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="time" name="mulai" class="form-control" required
                                                    aria-required="TRUE" aria-label="Jam Mulai"
                                                    placeholder="masukkan Jam Mulai Pelajaran ..." id="">
                                            </div>
                                        </div>
                                        <div class="border my-1 border-bottom"></div>
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Jam Selesai</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="time" name="selesai" class="form-control" required
                                                    aria-required="TRUE" aria-label="Jam Selesai"
                                                    placeholder="masukkan Jam Selesai ..." id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <?php if(isset($_GET['edit'])){ ?>
                                        <button type="submit" class="btn btn-secondary btn-sm">
                                            Update
                                        </button>
                                        <?php }else{ ?>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Simpan
                                        </button>
                                        <?php } ?>
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
                        <input type="search" name="cari" aria-controls="example2_filter" id="example1_filter">
                    </form>
                    <div class="fs-6 d-flex justify-content-start align-items-start flex-wrap">
                        Status Jam Pelajaran :
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
                                        <th class="table-layout-2 text-center">Jam Mulai</th>
                                        <th class="table-layout-2 text-center">Jam Selesai</th>
                                        <th class="table-layout-2 text-center">Status Jam</th>
                                        <th class="table-layout-2 text-center">Opsional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $data = $konfigs->query("SELECT * FROM jam order by jam_ke asc");
                                        while($isi = $data->fetch_array()){
                                    ?>
                                    <tr>
                                        <td class="table-layout-2 text-center"><?php echo $no; ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['mulai'] ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['selesai'] ?></td>
                                        <td class="table-layout-2 text-center">
                                            <form action="?aksi=select-waktu" method="post">
                                                <input type="hidden" name="jam_ke" value="<?php echo $isi['jam_ke']?>">
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
                                        <td class="table-layout-2 text-center">
                                            <a href="?page=jam-jadwal&edit=<?=$isi['jam_ke']?>" aria-current="page"
                                                class="rounded-5 btn btn-outline-primary">
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