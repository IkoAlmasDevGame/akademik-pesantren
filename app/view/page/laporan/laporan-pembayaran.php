<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rekapitulasi Laporan Pembayaran</title>
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
            <h4 class="panel-heading">Rekapitulasi Laporan Pembayaran</h4>
            <div class="panel-body">
                <div class="d-flex justify-content-end align-items-end flex-wrap mx-2">
                    <div class="breadcrumb">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=laporan-pembayaran" aria-current="page"
                                class="text-decoration-none text-primary">Rekapitulasi Laporan Pembayaran</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow container mb-4">
            <div class="card-header py-2">
                <h4 class="card-title">
                    <div class="text-dark">Rekapitulasi Pembayaran</div>
                    <br>
                    <div class="text-dark">Sumbangan Pembinaan Pendidikan</div>
                </h4>
                <form action="" method="post">
                    <div class="d-flex justify-content-start align-items-start flex-wrap">
                        <div class="form-inline d-flex justify-content-start align-items-center">
                            <div class="form-label col-sm-2 col-md-3">
                                <label for="" class="label label-default">Nama Santri :</label>
                            </div>
                            <div class="col-sm-3 col-md-4">
                                <select name="nama_santri" required class="form-select">
                                    <option value="">Pilih Siswa</option>
                                    <?php 
                                    $data = $konfigs->query("SELECT * FROM santri where status = '1' group by nama_santri asc");
                                        while($isi = $data->fetch_array()){
                                    ?>
                                    <option value="<?=$isi['nama_santri']?>">
                                        <?php echo $isi['nama_santri'] ?>
                                    </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-label col-sm-2 col-md-3 mx-1">
                                <label for="" class="label label-default">Bulan Dibayar :</label>
                            </div>
                            <div class="col-sm-3 col-md-4">
                                <select name="bulan" required class="form-select">
                                    <option value="">Pilih Bulan</option>
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
                            <button type="submit" class="btn btn-primary mx-2 mb-auto mb-lg-1">tampilkan</button>
                        </div>
                    </div>
                </form>
                <div class="text-start mt-2">
                    <a href="" aria-current="page" class="btn btn-info">
                        <i class="fa fa-refresh fa-1x"></i>
                        <span>Refresh Page</span>
                    </a>
                    <a href="" aria-current="page" class="btn btn-danger">
                        <i class="fa fa-file-excel fa-1x"></i>
                        <span>Export File To Excel</span>
                    </a>
                    <a href="" aria-current="page" class="btn btn-warning">
                        <i class="fa fa-print fa-1x"></i>
                        <span>Print File</span>
                    </a>
                </div>
            </div>
            <div class="card-body mt-1">
                <div class="container">
                    <form action="" method="post">
                        <input type="search" name="cari" required aria-controls="example2_filter" id="example1_filter">
                    </form>
                    <div class="table-responsive">
                        <div class="d-table">
                            <table class="table-layout" id="example1">
                                <thead>
                                    <tr>
                                        <th class="table-layout-2 text-center">No</th>
                                        <th class="table-layout-2 text-center">Petugas</th>
                                        <th class="table-layout-2 text-center">Nama Santri</th>
                                        <th class="table-layout-2 text-center">Kelas</th>
                                        <th class="table-layout-2 text-center">Tanggal Pembayaran</th>
                                        <th class="table-layout-2 text-center">SPP</th>
                                        <th class="table-layout-2 text-center">Jumlah Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $bayar = 0;
                                        if(isset($_POST['nama_santri']) && isset($_POST['bulan'])){
                                            $nama = htmlspecialchars($_POST['nama_santri']);
                                            $bulan = htmlspecialchars($_POST['bulan']);
                                            $pembayaran = "SELECT reg_kelas.*, santri.id_santri, santri.nama_santri, santri.status, pembayaran.id_akun, pembayaran.id_santri, pembayaran.id_kelas, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.id_spp, pembayaran.jumlah_bayar, spp.id_spp, spp.nominal, kelas.id_kelas, kelas.nama_kelas, users.id_akun, users.nama FROM pembayaran left join santri on pembayaran.id_santri = santri.id_santri left join reg_kelas on reg_kelas.id_santri = pembayaran.id_santri left join spp on pembayaran.id_spp = spp.id_spp left join kelas on reg_kelas.id_kelas = kelas.id_kelas && pembayaran.id_kelas = kelas.id_kelas left join users on pembayaran.id_akun = users.id_akun WHERE santri.nama_santri = ? && pembayaran.bulan_dibayar = ? && santri.status = '1' order by pembayaran.id_santri asc";
                                            $data = $configs->prepare($pembayaran);
                                            $data->execute(array($nama, $bulan));
                                            $hasil = $data->fetchAll();
                                        }else{
                                            $pembayaran = "SELECT reg_kelas.*, santri.id_santri, santri.nama_santri, santri.status, pembayaran.id_akun, pembayaran.id_santri, pembayaran.id_kelas, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.id_spp, pembayaran.jumlah_bayar, spp.id_spp, spp.nominal, kelas.id_kelas, kelas.nama_kelas, users.id_akun, users.nama FROM pembayaran left join santri on pembayaran.id_santri = santri.id_santri left join reg_kelas on reg_kelas.id_santri = pembayaran.id_santri left join spp on pembayaran.id_spp = spp.id_spp left join kelas on reg_kelas.id_kelas = kelas.id_kelas && pembayaran.id_kelas = kelas.id_kelas left join users on pembayaran.id_akun = users.id_akun where santri.status = '1' order by pembayaran.id_santri asc";
                                            $data = $configs->prepare($pembayaran);
                                            $data->execute();
                                            $hasil = $data->fetchAll();
                                        }
                                        foreach($hasil as $isi){
                                    ?>
                                    <tr>
                                        <td class="table-layout-2 text-center"><?php echo $no; ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['nama'] ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['nama_santri'] ?></td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['nama_kelas'] ?></td>
                                        <td class="table-layout-2 text-center">
                                            <?php echo $isi['tgl_bayar']." / ".$isi['bulan_dibayar']." / ".$isi['tahun_dibayar'] ?>
                                        </td>
                                        <td class="table-layout-2 text-center"><?php echo $isi['id_spp'] ?></td>
                                        <td class="table-layout-2 text-center">Rp.
                                            <?php echo number_format($isi['jumlah_bayar']) ?>,-
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    $bayar += $isi['jumlah_bayar'];
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <th colspan="6" class="bg-secondary text-light text-center">
                                        Total Pembayaran Rekapitulasi
                                    </th>
                                    <th class="table-layout-2 text-center">
                                        Rp. <?php echo number_format($bayar); ?>,-
                                    </th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>