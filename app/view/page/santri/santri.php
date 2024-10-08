<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Santri Pesantren</title>
        <link rel="shortcut icon" href="../../../../assets/logo/<?=$row['icon']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "superadmin" || $_SESSION['role'] == "admin"){
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
            <h4 class="panel-heading">Data Master Santri</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=santri" aria-current="page" class="text-decoration-none text-primary">Data
                                Master Santri</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container shadow mb-4">
            <div class="card-header py-2">
                <h4 class="card-title"></h4>
                <a href="?page=santri" aria-current="page" class="btn btn-info">
                    <i class="fa fa-refresh fa-1x"></i>
                    <span>Refresh Page</span>
                </a>
            </div>
            <div class="card-body mt-1">
                <div class="container">
                    <form action="" method="post">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="col-sm-2 col-md-2 mb-1">
                                <label for="" class="label label-default">Show Jenjang Kelas :</label>
                                <select name="jenjang" class="form-control form-select" aria-controls="example1_length"
                                    onchange="this.form.submit()" required id="example1_length">
                                    <option value="">Pilih Jenjang Kelas</option>
                                    <option value="1">Madrasah Ibtidaiyah</option>
                                    <option value="2">Madrasah Tsanawiyah</option>
                                    <option value="3">Madrasah Aliyah</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <form action="" method="post">
                        <input type="search" name="cari" required aria-controls="example2_filter" id="example1_filter">
                    </form>
                    <div class="table-responsive">
                        <div class="d-table">
                            <table class="table-layout" id="example1">
                                <thead>
                                    <tr>
                                        <th class="table-layout-2 text-center">No</th>
                                        <th class="table-layout-2 text-center">Nisn Santri</th>
                                        <th class="table-layout-2 text-center">Nama Santri</th>
                                        <th class="table-layout-2 text-center">Kelas Santri</th>
                                        <th class="table-layout-2 text-center">Wali Guru</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        if(isset($_POST['jenjang'])){
                                        $jenjang = htmlspecialchars($_POST['jenjang']);
                                        $sql = "SELECT reg_kelas.*, santri.id_santri, santri.nisn_santri, santri.nama_santri, santri.jenjang, santri.status, kelas.id_kelas, kelas.nama_kelas, kelas.id_guru, guru.id_guru, guru.nama_guru FROM santri left join reg_kelas on reg_kelas.id_santri = santri.id_santri left join kelas on reg_kelas.id_kelas = kelas.id_kelas left join guru on guru.id_guru = kelas.id_guru WHERE santri.jenjang = '$jenjang' && santri.status = '1' order by santri.id_santri asc";
                                        $data = $konfigs->query($sql);
                                        while ($isi = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td class="table-layout-2 text-center"><?php echo $no; ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['nisn_santri'] ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['nama_santri'] ?></td>
                                        <?php 
                                            if($_SESSION['role'] == "superadmin"){
                                        ?>
                                        <form action="?aksi=santri-access" method="post">
                                            <input type="hidden" name="id_reg_kelas" required
                                                value="<?php echo $isi['id_reg_kelas']?>" id="">
                                            <input type="hidden" name="id_santri" required
                                                value="<?php echo $isi['id_santri']?>" id="">
                                            <td class="table-layout-2 text-center">
                                                <select name="id_kelas" type="submit" onchange="this.form.submit()"
                                                    required class="form-select" id="">
                                                    <option value="0" <?php if($isi['id_kelas'] == "0"){?> selected
                                                        <?php } ?>>Pilih Kelas</option>
                                                    <?php 
                                                        $kelas = $konfigs->query("SELECT * FROM kelas order by id_kelas asc");
                                                        while ($ga = mysqli_fetch_array($kelas)) {
                                                    ?>
                                                    <option value="<?php echo $ga['id_kelas'] ?>"
                                                        <?php if($isi['id_kelas'] == $ga['id_kelas']){?> selected
                                                        <?php } ?>><?php echo $ga['nama_kelas'] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="table-layout-2 text-center">
                                                <select name="id_guru" type="submit" onchange="this.form.submit()"
                                                    required class="form-select" id="">
                                                    <option value="0" <?php if($isi['id_guru'] == "0"){?> selected
                                                        <?php } ?>>Pilih Wali Guru</option>
                                                    <?php 
                                                        $guru = $konfigs->query("SELECT * FROM guru where status = '1' order by id_guru asc");
                                                        while ($gs = mysqli_fetch_array($guru)) {
                                                    ?>
                                                    <option value="<?php echo $gs['id_guru'] ?>"
                                                        <?php if($isi['id_guru'] == $gs['id_guru']){?> selected
                                                        <?php } ?>><?php echo $gs['nama_guru'] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </form>
                                        <?php
                                            }else if($_SESSION['role'] == "admin"){
                                        ?>
                                        <td class="table-layout-2 text-center"><?php echo $isi['nama_kelas'] ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['nama_guru'] ?></td>
                                        <?php
                                            }
                                        ?>
                                    </tr>
                                    <?php
                                    $no++;
                                        }
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