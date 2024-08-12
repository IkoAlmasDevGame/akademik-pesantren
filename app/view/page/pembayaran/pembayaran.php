<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Pembayaran</title>
        <?php 
            if($_SESSION['role'] == "admin"){
                require_once("../ui/header.php");
                require_once("../../../database/koneksi.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container">
            <div class="panel panel-default bg-body-tertiary">
                <div class="panel-body">
                    <h4 class="panel-heading">Sumbangan Pembinaan Pendidikan</h4>
                    <h4 class="panel-heading">(Pembayaran SPP)</h4>
                </div>
            </div>
            <div class="container mt-4">
                <div class="d-flex justify-content-around align-items-center flex-wrap">
                    <div class="col-sm-12 col-md-5">
                        <h4 class="panel-heading">Data Siswa</h4>
                        <div class="card container">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-label">
                                        <label for="">Data Siswa : </label>
                                        <div class="form-inline">
                                            <select name="nisn_santri" id="cmb_siswa" required
                                                class="form-control form-select">
                                                <option value="">Pilih Siswa</option>
                                                <?php 
                                                $data = $konfigs->query("SELECT * FROM santri where status = '1' order by nisn_santri asc");
                                                    while($isi = $data->fetch_array()){
                                                ?>
                                                <option value="<?=$isi['nisn_santri']?>">
                                                    <?php echo $isi['nama_santri'] ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <h4 class="panel-heading">Data Pembayaran SPP</h4>
                        <div class="card container">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-label">
                                        <label for="">Data pembayaran : </label>
                                        <div class="form-inline">
                                            <select name="id_spp" id="cmb_pembayaran" class="form-control form-select">
                                                <option value="" selected>Pilih nominal pembayaran</option>
                                                <?php 
                                                    $data = $konfigs->query("SELECT * FROM spp order by id_spp asc");
                                                    while($isi = $data->fetch_array()){
                                                ?>
                                                <option value="<?=$isi['id_spp']?>"><?php echo $isi['nominal'] ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow container mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title">Data Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="table-responsive">
                                <form action="?aksi=bayar-spp" method="post">
                                    <div class="form-group">
                                        <div class="form-label">
                                            <label for="">Nama Petugas : </label>
                                            <div class="form-inline">
                                                <div class="col-sm-12 col-md-12 me-5">
                                                    <select name="id_akun" id="id_akun" class="form-select" required>
                                                        <option value="" selected>Pilih Petugas</option>
                                                        <?php 
                                                            $data = $konfigs->query("SELECT * FROM users WHERE role='admin'");
                                                            while($isi = $data->fetch_array()){
                                                        ?>
                                                        <option value="<?=$isi['id_akun']?>">
                                                            <?php echo $isi['nama'] ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tampung mt-1"></div>
                                    <div class="d-flex justify-content-center flex-wrap align-items-center gap-4">
                                        <div class="form-group">
                                            <div class="form-label">
                                                <label for="">Tanggal Pembayaran :</label>
                                                <div class="form-inline">
                                                    <div class="col-sm-12 col-md-12">
                                                        <select name="tgl_bayar" id="tgl_bayar" required
                                                            class="form-select">
                                                            <?php 
                                                            for ($i=1; $i <= 31; $i++) { 
                                                        ?>
                                                            <option value="<?=$i?>"><?php echo $i; ?></option>
                                                            <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label">
                                                <label for="">bulan Pembayaran :</label>
                                                <div class="form-inline">
                                                    <div class="col-sm-12 col-md-12">
                                                        <select name="bulan_dibayar" id="bulan_dibayar" required
                                                            class="form-select">
                                                            <option value="1" selected="">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label">
                                                <label for="">tahun Pembayaran :</label>
                                                <div class="form-inline">
                                                    <div class="col-sm-12 col-md-12">
                                                        <select name="tahun_dibayar" id="tahun_dibayar" required
                                                            class="form-select">
                                                            <?php 
                                                            $now = date('Y');
                                                            for($i=2019; $i <= $now; $i++){
                                                        ?>
                                                            <option value="<?=$i?>"><?=$i?></option>
                                                            <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tampung1"></div>
                                    <div class="card-footer">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary hover">
                                                <i class="fab fa-buysellads"></i>
                                                <span>Bayar</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>