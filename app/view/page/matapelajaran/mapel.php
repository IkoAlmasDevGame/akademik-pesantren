<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mata Pelajaran</title>
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
            <h4 class="panel-heading">Mata Pelajaran</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=matapelajaran" aria-current="page"
                                class="text-decoration-none text-primary">Mata Pelajaran</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow container">
            <div class="card-header py-2">
                <h4 class="card-title">Mata Pelajaran</h4>
                <form action="" method="post">
                    <div class="d-flex justify-content-end align-items-end flex-wrap" style="margin-top: -12px;">
                        <div class="col-sm-2 col-md-2" style="margin-top: -64px;">
                            <select name="id_kelas" onchange="this.form.submit()" class="form-select"
                                style="font-size: 14px; font-weight: normal; letter-spacing: 1px;" id="">
                                <option value="">Pilih Kelas Santri</option>
                                <?php 
                                    $kelas = $konfigs->query("SELECT * FROM kelas order by id_kelas asc");
                                    while($main = $kelas->fetch_array()){
                                ?>
                                <option value="<?php echo $main['id_kelas']?>">
                                    <?php echo $main['nama_kelas']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['id_kelas'])){
                        $name = htmlspecialchars($_POST['id_kelas']);
                        $data = $konfigs->query("SELECT * FROM kelas WHERE id_kelas = '$name'");
                    while($row = $data->fetch_array()){
                ?>
                <div class="text-start mt-1 mb-1">
                    <p class="fs-6 fw-normal fst-normal">
                        <?php echo $row['nama_kelas']; ?>
                    </p>
                </div>
                <?php
                    }
                }
                ?>
                <a href="?page=matapelajaran" aria-current="page" class="btn btn-info btn-sm">
                    <i class="fa fa-refresh fa-1x"></i>
                    <span>Refresh Page</span>
                </a>
                <a href="?page=jadwal-pelajaran" aria-current="page" class="btn btn-danger btn-sm">
                    <span>Jadwal Pelajaran</span>
                </a>
                <a href="?page=jam-jadwal" aria-current="page" class="btn btn-warning btn-sm">
                    <span>Jam Pelajaran</span>
                </a>
                <a href="?page=hari-jadwal" aria-current="page" class="btn btn-secondary btn-sm">
                    <span>Hari - Jadwal Pelajaran -</span>
                </a>
            </div>
            <div class="card-body mt-1">
                <div class="container">
                    <div class="table-responsive">
                        <div class="d-table">
                            <table class="table-layout" id="example3">
                                <thead>
                                    <tr>
                                        <th class="table-layout-2 text-center">Jam Ke</th>
                                        <?php 
                                        $nama_hari = $konfigs->query("SELECT * FROM hari where status = '1' group by id_hari asc");
                                            while($hari = $nama_hari->fetch_array()){
                                        ?>
                                        <th class="table-layout-2 text-center">
                                            <?php echo $hari['nama_idn'] ?>
                                        </th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(isset($_POST['id_kelas'])){
                                        $name = htmlspecialchars($_POST['id_kelas']);
                                        $jam = $konfigs->query("SELECT jam.*, kelas.id_kelas FROM jam left join kelas on kelas.id_kelas = $name WHERE kelas.id_kelas = '$name' && jam.status = '1'");
                                        while($isi = $jam->fetch_array()){
                                    ?>
                                    <tr>
                                        <td class="text-center table-layout-2">
                                            <?=$isi['mulai']." - ".$isi['selesai']?>
                                        </td>
                                        <?php for($j=1; $j <= 5; $j++){ ?>
                                        <?php 
                                            $hari = "";
                                            if($j == 1){
                                                $hari = "Senin";
                                            }else if($j == 2){
                                                $hari = "Selasa";
                                            }else if($j == 3){
                                                $hari = "Rabu";
                                            }else if($j == 4){
                                                $hari = "Kamis";
                                            }else if($j == 5){
                                                $hari = "Jumat";
                                            }    
                                        ?>
                                        <td class="text-center table-layout-2">
                                            <form action="" id="form_id_<?=$j."_".$isi['jam_ke']?>" method="post">
                                                <input type="hidden" name="id_kelas" value="<?=$_POST['id_kelas']?>">
                                                <input type="hidden" name="hari" value="<?=$hari;?>">
                                                <input type="hidden" name="jam_ke" value="<?=$isi['jam_ke']?>">
                                                <?php 
                                                error_reporting(0);
                                                $id_kelas = $_POST['id_kelas'];
                                                $id_jam = $isi['jam_ke'];
                                                $sPelajaran = "SELECT * FROM jadwal join pelajaran on pelajaran.id_pelajaran = jadwal.id_pelajaran WHERE 
                                                jam_ke = '$id_jam' && id_kelas = '$id_kelas' && hari = '$hari'";
                                                $data_jadwal = $konfigs->query($sPelajaran);
                                                $get_jadwal = mysqli_fetch_array($data_jadwal);
                                                ?>
                                                <input type="hidden" name="id_jadwal"
                                                    value="<?=$get_jadwal['id_jadwal']?>">
                                                <select name="id_pelajaran" class="form-select" data-toggle="tooltip"
                                                    data-placement="top" title="<?=$get_jadwal['nama_idn']?>"
                                                    type="submit"
                                                    onchange="document.getElementById('form_id_<?=$j.'_'.$isi['jam_ke']; ?>').submit();">
                                                    <option> Pilih Mata Pelajaran </option>
                                                    <?php 
                                                        $data_pelajaran = $konfigs->query("SELECT * FROM pelajaran where status = '1'");
                                                        while($get_pelajaran = $data_pelajaran->fetch_array()){
                                                    ?>
                                                    <option value="<?=$get_pelajaran['id_pelajaran']?>"
                                                        <?php if($get_jadwal['id_pelajaran'] == $get_pelajaran['id_pelajaran']){ echo "selected"; }?>>
                                                        <?=$get_pelajaran['nama_idn']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </form>
                                            <form action="" id="form_id_2_<?=$j."_".$isi['jam_ke']?>" method="post">
                                                <?php 
                                                    $id_kelas = $_POST['id_kelas'];
                                                    $id_jam = $isi['jam_ke'];
                                                    $get_id_jadwal = mysqli_query($konfigs, "select * from jadwal where jam_ke='$id_jam' && id_kelas='$id_kelas' && hari='$hari'");
                                                    $id_jadwal = mysqli_fetch_array($get_id_jadwal);
                                                    $rows = $_SESSION['guru'] = $id_jadwal['id_guru'];
                                                ?>
                                                <input type="hidden" name="id_kelas" value="<?=$_POST['id_kelas']?>">
                                                <input type="hidden" name="hari" value="<?=$hari;?>">
                                                <input type="hidden" name="id_jam" value="<?=$isi['jam_ke']?>">
                                                <input type="hidden" name="id_jadwal"
                                                    value="<?=$id_jadwal['id_jadwal']?>">
                                                <?php 
                                                    error_reporting(0);
                                                    $get_guru_tooltip         = mysqli_query($konfigs, "select * from guru where id_guru = '$rows' && status = '1'");
                                                    $guru_tooltip             = mysqli_fetch_array($get_guru_tooltip);
                                                ?>
                                                <select name="id_guru" class="form-select" data-toggle="tooltip"
                                                    data-placement="top" title="<?=$guru_tooltip['nama_guru']?>"
                                                    type="submit"
                                                    onchange="document.getElementById('form_id_2_<?=$j.'_'.$isi['jam_ke']; ?>').submit();">
                                                    <option>Pilih Guru</option>
                                                    <?php 
                                                        $data_guru = mysqli_query($konfigs, "select * from guru where status = '1'");
                                                        while($get_guru = $data_guru->fetch_array()){
                                                    ?>
                                                    <option value="<?=$get_guru['id_guru']?>"
                                                        <?php if($id_jadwal['id_guru'] == $get_guru['id_guru']){ echo "selected"; } ?>>
                                                        <?=$get_guru['nama_guru']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </form>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php
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
        <?php require_once("../ui/footer.php"); ?>