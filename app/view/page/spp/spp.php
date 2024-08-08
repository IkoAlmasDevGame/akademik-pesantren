<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master SPP</title>
        <link rel="shortcut icon" href="../../../../assets/logo/<?=$row['icon']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "admin"){
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
            <h4 class="panel-heading">Data Master SPP</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=spp" aria-current="page" aria-label="Data Master Nominal SPP"
                                class="text-decoration-none text-primary">Data Master SPP</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container">
            <div class="card-header py-2">
                <h4 class="card-title">Data Nominal Pembayaran SPP</h4>
                <button type="button" data-bs-target="#collapseWidthExample" data-bs-toggle="collapse"
                    aria-current="page" class="btn btn-danger btn-sm" aria-controls="collapseWidthExample">
                    <?php if(isset($_GET['edit'])){ ?>
                    <i class="fa fa-edit fa-1x"></i>
                    <span>Edit Nominal SPP</span>
                    <?php }else{ ?>
                    <i class="bi bi-plus fa-1x"></i>
                    <span>Tambah Nominal SPP</span>
                    <?php } ?>
                </button>
                <a href="?page=spp" aria-current="page" class="btn btn-info btn-sm">
                    <i class="fa fa-refresh fa-1x"></i>
                    <span>Refresh Page</span>
                </a>
                <div class="collapse collapse-horizontal" id="collapseWidthExample">
                    <div class="col-sm-5">
                        <div class="card">
                            <div class="card-header">
                                <?php if(isset($_GET['edit'])){ ?>
                                <h4 class="card-title">Edit Nominal SPP</h4>
                                <?php }else{ ?>
                                <h4 class="card-title">Tambah Nominal SPP</h4>
                                <?php } ?>
                            </div>
                            <div class="card-body mt-1">
                                <form action="?aksi=tambah-spp" method="post">
                                    <?php if(isset($_GET['edit'])){ ?>
                                    <?php $id = htmlspecialchars($_GET['edit']); $data = $konfigs->query("SELECT * FROM spp WHERE id_spp = '$id'"); ?>
                                    <?php while($isi = $data->fetch_array()){ ?>
                                    <div class="form-group mt-1 mt-lg-1">
                                        <input type="hidden" name="id_spp" value="<?php echo $id?>">
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Nominal</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" inputmode="numeric" onkeyup="rupiah()" name="nominal"
                                                    class="form-control" required aria-required="TRUE"
                                                    value="<?php echo $isi['nominal']?>" aria-label="nominal"
                                                    placeholder="masukkan nominal spp ..." id="nominal">
                                            </div>
                                            <small class="text-end mt-1" onclick="rupiah()" id="nominal_text">Rp
                                                0,00</small>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <div class="form-group mt-1 mt-lg-1">
                                        <div class="form-inline row justify-content-center align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Nominal</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" inputmode="numeric" onkeyup="rupiah()" name="nominal"
                                                    class="form-control" required aria-required="TRUE"
                                                    aria-label="nominal" placeholder="masukkan nominal spp ..."
                                                    id="nominal">
                                            </div>
                                            <small class="text-end mt-1" id="nominal_text">Rp 0,00</small>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if(isset($_GET['edit'])){ ?>
                                    <button type="submit" class="btn btn-secondary btn-sm">
                                        Update
                                    </button>
                                    <?php }else{ ?>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Simpan
                                    </button>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-1 mb-1">
                    <?php require_once("../spp/functions.php") ?>
                </div>
            </div>
            <div class="card-body mt-1">
                <div class="container">
                    <div class="table-responsive">
                        <div class="d-table">
                            <table class="table-layout" id="example1">
                                <thead>
                                    <tr>
                                        <th class="text-center table-layout-2">No.</th>
                                        <th class="text-center table-layout-2">Nominal Pembayaran</th>
                                        <th class="text-center table-layout-2">Opsional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $data = $konfigs->query("SELECT * FROM spp order by id_spp asc");
                                        while($row = $data->fetch_array()){
                                    ?>
                                    <tr>
                                        <td class="text-center table-layout-2"><?php echo $no; ?></td>
                                        <td class="text-center table-layout-2">Rp.
                                            <?php echo number_format($row['nominal']) ?> ,-
                                        </td>
                                        <td class="text-center table-layout-2">
                                            <a href="?page=spp&edit=<?php echo $row['id_spp']?>" aria-current="page"
                                                class="btn btn-warning rounded-5 btn-sm">
                                                <i class="fa fa-edit fa-1x"></i>
                                            </a>
                                            <a href="?aksi=hapus-spp&id_spp=<?php echo $row['id_spp']?>"
                                                aria-current="page"
                                                onclick="return confirm('apakah anda ingin menghapus data nominal ini ?')"
                                                class="btn btn-danger rounded-5 btn-sm">
                                                <i class="fa fa-1x fa-trash-alt"></i>
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