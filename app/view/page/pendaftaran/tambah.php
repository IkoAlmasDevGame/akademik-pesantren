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
        <?php 
        require_once("../ui/sidebar.php");
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="panel panel-default bg-body-secondary">
                    <div class="panel-body">
                        <h4 class="panel-heading mt-1">Pendaftaran Santri</h4>
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
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?aksi=tambah-pendaftaran-santri" aria-current="page"
                                        class="text-decoration-none text-primary">Tambah Pendaftaran
                                        Santri</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <div class="container text-center">
                            <h4 class="card-title fw-normal fs-5">Tambah Pendaftaran Santri</h4>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                        <div class="card-body">
                            <form action="?aksi=tambah-santri" method="post" enctype="multipart/form-data">
                                <div class="d-flex justify-content-between align-items-start flex-wrap">
                                    <div class="card col-sm-4 mt-1">
                                        <div class="card-header">
                                            <h4 class="card-title text-center">Khusus Data Santri</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Nisn Santri</label>
                                                    </div>
                                                    <input type="text" inputmode="numeric" class="form-control"
                                                        name="nisn_santri" id=""
                                                        placeholder="masukkan nisn santri baru ..." maxlength="10"
                                                        required aria-required="TRUE">
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Nama Lengkap
                                                            Santri</label>
                                                    </div>
                                                    <input type="text" inputmode="" class="form-control"
                                                        name="nama_santri" id=""
                                                        placeholder="masukkan nama santri baru ..." maxlength="100"
                                                        required aria-required="TRUE">
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Tempat Lahir</label>
                                                    </div>
                                                    <input type="text" inputmode="" class="form-control"
                                                        name="tmpt_lahir" id=""
                                                        placeholder="masukkan tempat lahir santri ..." maxlength="80"
                                                        required aria-required="TRUE">
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Tanggal Lahir</label>
                                                    </div>
                                                    <input type="date" class="form-control" name="tgl_lahir"
                                                        id="datepicker" required aria-required="TRUE">
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="form-floating radio">
                                                        <input type="radio" class="radio radio-inline me-1"
                                                            name="jenis_kelamin" id="" value="L" required
                                                            aria-required="TRUE">
                                                        Laki - Laki
                                                        <input type="radio" class="radio radio-inline ms-3 me-1"
                                                            name="jenis_kelamin" id="" value="P" required
                                                            aria-required="TRUE">
                                                        Perempuan
                                                    </div>
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Agama</label>
                                                    </div>
                                                    <select name="agama" class="form-select" required id="">
                                                        <option value="">Pilih Agama Anda</option>
                                                        <option value="1">Islam</option>
                                                        <option value="2">Kristen</option>
                                                        <option value="3">Katholik</option>
                                                        <option value="4">Buddha</option>
                                                        <option value="5">Hindu</option>
                                                        <option value="6">Konghucu</option>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Jenjang
                                                            Sekolah</label>
                                                    </div>
                                                    <select name="jenjang" class="form-select" required id="">
                                                        <option value="">Pilih Jenjang</option>
                                                        <option value="1">Madrasah Ibtidaiyah</option>
                                                        <option value="2">Madrasah Tsanawiyah</option>
                                                        <option value="3">Madrasah Aliyah</option>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="">Preview Photo</label>
                                                    </div>
                                                    <div class="form-icon">
                                                        <img src="https://th.bing.com/th/id/OIP.Ken-Ns27rvoun1mbm-CSJwHaHa?w=130&h=180&c=7&r=0&o=5&pid=1.7"
                                                            id="preview" alt="" width="64"
                                                            class="img-rounded img-fluid">
                                                    </div>
                                                    <div class="form-check-input">
                                                        <input type="file" name="photo_src" accept="image/*"
                                                            class="form-control-file" required
                                                            onchange="previewImage(this)" aria-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card col-sm-4 mt-1">
                                        <div class="card-header">
                                            <h4 class="card-title text-center">Khusus Data Orang Tua</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <!-- Ayah -->
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Nama Lengkap
                                                            Ayah</label>
                                                    </div>
                                                    <input type="text" inputmode="" class="form-control"
                                                        name="nama_ayah" id=""
                                                        placeholder="masukkan nama ayah santri ..." maxlength="100"
                                                        required aria-required="TRUE">
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Pekerjaan Ayah</label>
                                                    </div>
                                                    <select name="pekerjaan_ayah" class="form-select" required id="">
                                                        <option value="">Pilih Pekerjaan Ayah</option>
                                                        <?php 
                                                            $data = $konfigs->query("SELECT * FROM pekerjaan order by id_pekerjaan asc");
                                                            while($s = mysqli_fetch_array($data)){
                                                        ?>
                                                        <option value="<?php echo $s['nama_pekerjaan']?>">
                                                            <?php echo $s['id_pekerjaan']." - ".$s['nama_pekerjaan']?>
                                                        </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="">Preview Photo</label>
                                                    </div>
                                                    <div class="form-icon">
                                                        <img src="https://th.bing.com/th/id/OIP.Ken-Ns27rvoun1mbm-CSJwHaHa?w=130&h=180&c=7&r=0&o=5&pid=1.7"
                                                            id="preview_ayah" alt="" width="64"
                                                            class="img-rounded img-fluid">
                                                    </div>
                                                    <div class="form-check-input">
                                                        <input type="file" name="photo_src_ayah" accept="image/*"
                                                            class="form-control-file" required
                                                            onchange="previewImageAyah(this)" aria-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <!-- Ibu -->
                                                <div class="form-inline mt-4">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Nama Lengkap
                                                            Ibu</label>
                                                    </div>
                                                    <input type="text" inputmode="" class="form-control" name="nama_ibu"
                                                        id="" placeholder="masukkan nama ibu santri ..." maxlength="100"
                                                        required aria-required="TRUE">
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="" class="label label-default">Pekerjaan Ibu</label>
                                                    </div>
                                                    <select name="pekerjaan_ibu" class="form-select" required id="">
                                                        <option value="">Pilih Pekerjaan Ibu</option>
                                                        <?php 
                                                            $data = $konfigs->query("SELECT * FROM pekerjaan order by id_pekerjaan asc");
                                                            while($a = mysqli_fetch_array($data)){
                                                        ?>
                                                        <option value="<?php echo $a['nama_pekerjaan']?>">
                                                            <?php echo $a['id_pekerjaan']." - ".$a['nama_pekerjaan']?>
                                                        </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label">
                                                        <label for="">Preview Photo</label>
                                                    </div>
                                                    <div class="form-icon">
                                                        <img src="https://th.bing.com/th/id/OIP.Ken-Ns27rvoun1mbm-CSJwHaHa?w=130&h=180&c=7&r=0&o=5&pid=1.7"
                                                            id="preview_ibu" alt="" width="64"
                                                            class="img-rounded img-fluid">
                                                    </div>
                                                    <div class="form-check-input">
                                                        <input type="file" name="photo_src_ibu" accept="image/*"
                                                            class="form-control-file" required
                                                            onchange="previewImageIbu(this)" aria-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start align-items-start flex-wrap">
                                    <div class="card col-sm-4 mt-1">
                                        <div class="card-header">
                                            <h4 class="card-title text-center">Khusus Data Document</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="form-inline mt-1">
                                                    <div class="form-label form-check-label">
                                                        <label for="" class="label label-default">Alamat Rumah</label>
                                                    </div>
                                                    <textarea name="alamat_rumah" class="form-control" required
                                                        placeholder="masukkan alamat rumah ..." aria-required="TRUE"
                                                        id=""></textarea>
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label form-check-label">
                                                        <label for="" class="label label-default">Kode Pos</label>
                                                    </div>
                                                    <input type="text" name="kode_pos" class="form-control" required
                                                        aria-required="TRUE" maxlength="5"
                                                        placeholder="masukkan kode pos" inputmode="numeric" id="">
                                                </div>
                                                <div class="form-inline mt-1">
                                                    <div class="form-label form-check-label">
                                                        <label for="" class="label label-default">Nomor Telepon</label>
                                                    </div>
                                                    <input type="text" name="nomor_telepon" class="form-control"
                                                        required aria-required="TRUE" maxlength="13"
                                                        placeholder="masukkan nomor telepon" inputmode="numeric" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save fa-1x"></i>
                                            <span>Simpan</span>
                                        </button>
                                        <a href="?page=pendaftaran-santri" aria-current="page" class="btn btn-default">
                                            Cancel
                                        </a>
                                        <button type="reset" class="btn btn-danger">
                                            <i class="fa fa-eraser fa-1x"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php");  ?>