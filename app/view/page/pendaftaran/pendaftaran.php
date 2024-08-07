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
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel container panel-default bg-body-secondary">
            <h4 class="panel-heading">Pendaftaran Santri</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
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
        <div class="card container mb-4">
            <div class="card-header py-2">
                <div class="container">
                    <h4 class="card-title">Data Pendaftaran Santri</h4>
                    <a href="?aksi=tambah-pendaftaran-santri" aria-current="page" class="btn btn-danger">
                        <i class="bi bi-plus fa-1x"></i>
                        <span>Tambah Pendaftaran</span>
                    </a>
                    <a href="?page=pendaftaran-santri" aria-current="page" class="btn btn-info">
                        <i class="fa fa-refresh fa-1x"></i>
                        <span>Refresh Page</span>
                    </a>
                    <div class="mt-1 mb-1">
                        <?php require_once("../pendaftaran/functions.php") ?>
                    </div>
                </div>
            </div>
            <div class="card-body mt-1">
                <form action="" method="post">
                    <input type="search" name="cari" required aria-controls="example2_filter" id="example1_filter">
                </form>
                <div class="container">
                    <div class="table-responsive">
                        <div class="d-table">
                            <table class="table-layout-santri" id="example1">
                                <thead>
                                    <tr>
                                        <th class="table-layout-2 text-center">No.</th>
                                        <th class="table-layout-2 text-center">Nisn Santri</th>
                                        <th class="table-layout-2 text-center">Nama Santri</th>
                                        <th class="table-layout-2 text-center">Tempat Lahir</th>
                                        <th class="table-layout-2 text-center">Tanggal Lahir</th>
                                        <th class="table-layout-2 text-center">Jenis Kelamin</th>
                                        <th class="table-layout-2 text-center">Agama Santri</th>
                                        <th class="table-layout-2 text-center">Photo Santri</th>
                                        <th class="table-layout-2 text-center">Jenjang Sekolah</th>
                                        <th class="table-layout-2 text-center">Document</th>
                                        <th class="table-layout-2 text-center">Optional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $table = "santri";
                                        $sql = "SELECT * FROM $table order by id_santri asc";
                                        $data = $konfigs->query($sql);
                                        while($isi = mysqli_fetch_array($data)){
                                            $exp = explode("-", $isi['tgl_lahir']);
                                    ?>
                                    <tr>
                                        <td class="table-layout-2"><?php echo $no; ?></td>
                                        <td class="table-layout-2 text-center">
                                            <?php echo $isi['nisn_santri'] ?></td>
                                        <td class="table-layout-2 text-center">
                                            <?php echo $isi['nama_santri'] ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['tmpt_lahir'] ?>
                                        </td>
                                        <td class="table-layout-2 text-center">
                                            <?php echo $exp[2]." / ".$exp[1]." / ".$exp[0] ?>
                                        </td>
                                        <td class="table-layout-2 text-center">
                                            <?php echo kelamin($isi['jenis_kelamin']) ?></td>
                                        <td class="table-layout-2 text-center">
                                            <?php echo agama($isi['agama']) ?></td>
                                        <td class="table-layout-2 text-center">
                                            <?php $base = "../../../../assets/photo/santri/".$isi['photo_src']; ?>
                                            <img src="<?php echo $base; ?>" alt="<?php echo $isi['nama_santri'] ?>"
                                                class="img-responsive" width="100">
                                        </td>
                                        <td class="table-layout-2 text-center">
                                            <?php echo jenjang($isi['jenjang']) ?>
                                        </td>
                                        <td class="table-layout-2 text-center">
                                            <a href="" data-bs-target="#modalTreeView<?php echo $isi['id_santri']?>"
                                                data-bs-toggle="modal" aria-current="page"
                                                class="btn btn-outline-primary rounded-3">
                                                <i class="fa fa-file fa-1x"></i>
                                            </a>
                                        </td>
                                        <td class="table-layout-2 text-center">
                                            <a href="?aksi=hapus-santri&id_santri=<?php echo $isi['id_santri']?>"
                                                onclick="return confirm('apakah anda ingin menghapus data ini ?')"
                                                aria-current="page" class="btn-sm btn btn-danger">
                                                <i class="fa fa-trash-alt fa-1x"></i>
                                            </a>
                                            <a href="?aksi=ubah-pendaftaran-santri&edit=<?=$isi['id_santri']?>"
                                                aria-current="page"
                                                onclick="return confirm('apakah anda ingin mengubah data ini ?')"
                                                class="btn-sm btn btn-warning">
                                                <i class="fa fa-edit fa-1x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modalTreeView<?php echo $isi['id_santri']?>"
                                        tabindex="-1" aria-hidden="TRUE">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="dialg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Document - <?php echo $isi['nama_santri'] ?>
                                                    </h4>
                                                    <button type='button' class='btn btn-close'
                                                        data-bs-dismiss='modal'></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table table-responsive">
                                                        <div class="border-end border-top col-sm-9 my-2 py-2">
                                                            <div class="form-inline">
                                                                <span>Alamat Rumah</span>
                                                                <span class="ps-2 ms-2">:</span>
                                                                <span>
                                                                    <?php echo $isi['alamat_rumah'] ?>
                                                                </span>
                                                            </div>
                                                            <div class="form-inline">
                                                                <span>Kode Pos</span>
                                                                <span class="ps-4 ms-4">:</span>
                                                                <span><?php echo $isi['kode_pos'] ?></span>
                                                            </div>
                                                            <div class="form-inline">
                                                                <span>Nomor Telepon</span>
                                                                <span>:</span>
                                                                <span><?php echo $isi['nomor_telepon'] ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="border-end border-bottom col-sm-9 my-2 py-2"></div>
                                                        <!-- Ayah -->
                                                        <div class="border-end border-top col-sm-9 my-2 py-2">
                                                            <div class="form-inline">
                                                                <span>Nama Ayah</span>
                                                                <span class="ps-2 ms-4">:</span>
                                                                <span><?php echo $isi['nama_ayah'] ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="border-end border-bottom col-sm-9 my-2 py-2"></div>
                                                        <div class="border-end border-top col-sm-9 my-2 py-2">
                                                            <div class="form-inline">
                                                                <span>Pekerjaan Ayah</span>
                                                                <span class="ps-2 ms-2">:</span>
                                                                <span><?php echo $isi['pekerjaan_ayah'] ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="border-end border-bottom col-sm-9 my-2 py-2"></div>
                                                        <div class="border-end border-top col-sm-9 my-2 py-2">
                                                            <div class="form-inline">
                                                                <span>Photo Ayah</span>
                                                                <?php $baseAyah = "../../../../assets/photo/orangtua/".$isi['photo_src_ayah']; ?>
                                                                <span class="ps-2 ms-4">:</span>
                                                                <span class="img-thumbnail">
                                                                    <img src="<?php echo $baseAyah; ?>"
                                                                        alt="<?php echo $isi['nama_ayah'] ?>"
                                                                        class="img-responsive" width="100">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="border-end border-bottom col-sm-9 my-2 py-2"></div>
                                                        <!-- Ibu -->
                                                        <div class="border-end border-top col-sm-9 my-2 py-2">
                                                            <span>Nama Ibu</span>
                                                            <span class="ps-2 ms-5">:</span>
                                                            <span><?php echo $isi['nama_ibu'] ?></span>
                                                        </div>
                                                        <div class="border-end border-bottom col-sm-9 my-2 py-2"></div>
                                                        <div class="border-end border-top col-sm-9 my-2 py-2">
                                                            <div class="form-inline">
                                                                <span>Photo Ibu</span>
                                                                <?php $baseIbu = "../../../../assets/photo/orangtua/".$isi['photo_src_ibu']; ?>
                                                                <span class="ps-4 ms-3">:</span>
                                                                <span class="img-thumbnail">
                                                                    <img src="<?php echo $baseIbu; ?>"
                                                                        alt="<?php echo $isi['nama_ibu'] ?>"
                                                                        class="img-responsive" width="100">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="border-end border-bottom col-sm-9 my-2 py-2"></div>
                                                        <div class="border-end border-top col-sm-9 my-2 py-2">
                                                            <span>Pekerjaan Ibu</span>
                                                            <span class="ps-3 ms-3">:</span>
                                                            <span><?php echo $isi['pekerjaan_ibu'] ?></span>
                                                        </div>
                                                        <div class="border-end border-bottom col-sm-9 my-2 py-2"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type='button' class='btn btn-default'
                                                            data-bs-dismiss='modal'>Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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