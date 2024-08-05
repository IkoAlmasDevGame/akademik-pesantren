<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Guru Pesantren</title>
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
            <h4 class="panel-heading">Data Master Guru</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=guru" aria-current="page" aria-label="master guru"
                                class="text-decoration-none text-primary">Data Master Guru</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?aksi=tambah-data-guru" aria-current="page" aria-label="guru"
                                class="text-decoration-none text-primary">Tambah Data Master Guru</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container shadow">
            <div class="card-body">
                <form action="?aksi=tambah-guru" enctype="multipart/form-data" method="post">
                    <div class="shadow-none mb-4 mt-4">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="card col-sm-6 col-md-6">
                                <div class="card-body mt-1">
                                    <div class="card-header py-2">
                                        <h4 class="card-title text-center">Tambah Data Guru</h4>
                                    </div>
                                    <div class="form-group mt-1 mt-lg-1">
                                        <div class="border border-top my-1"></div>
                                        <div class="form-inline row justify-content-center
                                             align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Niptk Guru</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="niptk" inputmode="numeric" class="form-control"
                                                    required aria-required="TRUE" aria-label="Niptk Guru"
                                                    placeholder="masukkan niptk guru ..." maxlength="16" id="">
                                                <small>Nomor Induk Pendidik dan Tenaga Kependidikan</small>
                                            </div>
                                        </div>
                                        <div class="border border-top my-1"></div>
                                        <div class="form-inline row justify-content-center
                                             align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Nama Guru</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="nama_guru" class="form-control" required
                                                    aria-required="TRUE" aria-label="nama Guru" maxlength="100"
                                                    placeholder="masukkan nama guru ..." id="">
                                            </div>
                                        </div>
                                        <div class="border border-top my-1"></div>
                                        <div class="form-inline row justify-content-center
                                             align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Tempat Lahir</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="text" name="tmpt_lahir" class="form-control" required
                                                    aria-required="TRUE" aria-label="Tempat Lahir Guru" maxlength="100"
                                                    placeholder="masukkan tempat lahir guru ..." id="">
                                            </div>
                                        </div>
                                        <div class="border border-top my-1"></div>
                                        <div class="form-inline row justify-content-center
                                             align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Tanggal Lahir</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="date" name="tgl_lahir" class="form-control" required
                                                    aria-required="TRUE" aria-label="Tanggal Lahir Guru"
                                                    placeholder="masukkan Tanggal Lahir guru ..." id="">
                                            </div>
                                        </div>
                                        <div class="border border-top my-1"></div>
                                        <div class="form-inline row justify-content-center
                                             align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <input type="radio" name="jenis_kelamin" value="L"
                                                    class="radio radio-inline me-1" id="" aria-label="Laki - Laki"
                                                    required aria-required="TRUE"> Laki - Laki
                                                <input type="radio" name="jenis_kelamin" value="P"
                                                    class="radio radio-inline me-1 ms-1" id="" aria-label="Laki - Laki"
                                                    required aria-required="TRUE"> Perempuan
                                            </div>
                                        </div>
                                        <div class="border border-top my-1"></div>
                                        <div class="form-inline row justify-content-center
                                             align-items-center">
                                            <div class="form-label col-sm-4 col-md-4">
                                                <label for="" class="label label-default">Photo Guru</label>
                                            </div>
                                            <div class="col-sm-7 col-md-8">
                                                <div class="form-icon">
                                                    <img src="https://th.bing.com/th/id/OIP.Ken-Ns27rvoun1mbm-CSJwHaHa?w=130&h=180&c=7&r=0&o=5&pid=1.7"
                                                        id="preview" alt="" width="64" class="img-rounded img-fluid">
                                                </div>
                                                <div class="form-check-input">
                                                    <input type="file" name="photo_src" accept="image/*"
                                                        class="form-control-file" required onchange="previewImage(this)"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                        <a href="?page=guru" aria-current="page" class="btn btn-default">Cancel</a>
                                        <button type="reset" class="btn btn-danger">
                                            Hapus Semua
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>