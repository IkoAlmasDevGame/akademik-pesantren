<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
        if($_SESSION["role"] == "superadmin" || $_SESSION["role"] == "admin"){
            require_once("../ui/header.php");
            require_once("../../../database/koneksi.php");
            header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
	        header("Content-Disposition: attachment; filename=laporan_pembayaran (".date('d-m-Y').").xls");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private",false);
        }else{
            header("location:../ui/header.php?page=beranda");
        }
        ?>
        <title>Export Laporan Pembayaran</title>
    </head>

    <body>
        <h2>Laporan Pembayaran</h2>
        <?php 
            if(isset($_POST['bulan_dibayar'])){
                $bulan = htmlspecialchars($_POST['bulan']);
        ?>
        <div class="container">
            <div class="table-responsive">
                <table class="table-layout">
                    <thead>
                        <tr>
                            <th class="table-layout-2 text-center">No</th>
                            <th class="table-layout-2 text-center">Petugas</th>
                            <th class="table-layout-2 text-center">Nama Santri</th>
                            <th class="table-layout-2 text-center">Kelas</th>
                            <th class="table-layout-2 text-center">Tanggal Pembayaran</th>
                            <th hidden class="table-layout-2 text-center">SPP</th>
                            <th class="table-layout-2 text-center">Jumlah Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $pembayaran = "SELECT reg_kelas.*, santri.id_santri, santri.nama_santri, santri.status, pembayaran.id_akun, pembayaran.id_santri, pembayaran.id_kelas, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.id_spp, pembayaran.jumlah_bayar, spp.id_spp, spp.nominal, kelas.id_kelas, kelas.nama_kelas, users.id_akun, users.nama FROM pembayaran left join santri on pembayaran.id_santri = santri.id_santri left join reg_kelas on reg_kelas.id_santri = pembayaran.id_santri left join spp on pembayaran.id_spp = spp.id_spp left join kelas on reg_kelas.id_kelas = kelas.id_kelas && pembayaran.id_kelas = kelas.id_kelas left join users on pembayaran.id_akun = users.id_akun WHERE santri.status = '1' && pembayaran.bulan_dibayar = ? order by pembayaran.id_santri asc";
                            $data = $configs->prepare($pembayaran);
                            $data->execute(array($bulan));
                            $hasil = $data->fetchAll();
                            foreach($hasil as $i){
                        ?>
                        <tr>
                            <td class="table-layout-2 text-center"><?php echo $no++; ?></td>
                            <td class="table-layout-2 text-center"><?php echo $i['nama'] ?></td>
                            <td class="table-layout-2 text-center"><?php echo $i['nama_santri'] ?></td>
                            <td class="table-layout-2 text-center"><?php echo $i['nama_kelas'] ?></td>
                            <td class="table-layout-2 text-center">
                                <?php echo $isi['tgl_bayar']." / ".$i['bulan_dibayar']." / ".$i['tahun_dibayar'] ?>
                            </td>
                            <td hidden class="table-layout-2 text-center"><?php echo $i['id_spp'] ?></td>
                            <td class="table-layout-2 text-center">Rp.
                                <?php echo number_format($i['jumlah_bayar']) ?>,-
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php 
            }else{
        ?>
        <div class="container">
            <div class="table-responsive">
                <table class="table-layout">
                    <thead>
                        <tr>
                            <th class="table-layout-2 text-center">No</th>
                            <th class="table-layout-2 text-center">Petugas</th>
                            <th class="table-layout-2 text-center">Nama Santri</th>
                            <th class="table-layout-2 text-center">Kelas</th>
                            <th class="table-layout-2 text-center">Tanggal Pembayaran</th>
                            <th hidden class="table-layout-2 text-center">SPP</th>
                            <th class="table-layout-2 text-center">Jumlah Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $pembayaran = "SELECT reg_kelas.*, santri.id_santri, santri.nama_santri, santri.status, pembayaran.id_akun, pembayaran.id_santri, pembayaran.id_kelas, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.id_spp, pembayaran.jumlah_bayar, spp.id_spp, spp.nominal, kelas.id_kelas, kelas.nama_kelas, users.id_akun, users.nama FROM pembayaran left join santri on pembayaran.id_santri = santri.id_santri left join reg_kelas on reg_kelas.id_santri = pembayaran.id_santri left join spp on pembayaran.id_spp = spp.id_spp left join kelas on reg_kelas.id_kelas = kelas.id_kelas && pembayaran.id_kelas = kelas.id_kelas left join users on pembayaran.id_akun = users.id_akun where santri.status = '1' order by pembayaran.id_santri asc";
                            $data = $configs->prepare($pembayaran);
                            $data->execute();
                            $hasil = $data->fetchAll();
                            foreach($hasil as $isi){
                        ?>
                        <tr>
                            <td class="table-layout-2 text-center"><?php echo $no++; ?></td>
                            <td class="table-layout-2 text-center"><?php echo $isi['nama'] ?></td>
                            <td class="table-layout-2 text-center"><?php echo $isi['nama_santri'] ?></td>
                            <td class="table-layout-2 text-center"><?php echo $isi['nama_kelas'] ?></td>
                            <td class="table-layout-2 text-center">
                                <?php echo $isi['tgl_bayar']." / ".$isi['bulan_dibayar']." / ".$isi['tahun_dibayar'] ?>
                            </td>
                            <td hidden class="table-layout-2 text-center"><?php echo $isi['id_spp'] ?></td>
                            <td class="table-layout-2 text-center">Rp.
                                <?php echo number_format($isi['jumlah_bayar']) ?>,-
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
            }
        ?>
        <?php 
            require_once("../ui/footer.php");
        ?>