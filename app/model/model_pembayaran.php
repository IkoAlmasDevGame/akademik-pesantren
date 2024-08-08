<?php 
namespace model;

class pembayaran {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function payment($id_akun, $id_santri, $id_kelas, $tgl, $bln, $thn, $id_spp, $total){
        $id_akun = htmlentities($_POST['id_akun']) ? htmlspecialchars($_POST['id_akun']) : $_POST['id_akun'];
        $id_santri = htmlentities($_POST['id_santri']) ? htmlspecialchars($_POST['id_santri']) : $_POST['id_santri'];
        $id_kelas = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        $tgl = htmlentities($_POST['tgl_bayar']) ? htmlspecialchars($_POST['tgl_bayar']) : $_POST['tgl_bayar'];
        $bln = htmlentities($_POST['bulan_dibayar']) ? htmlspecialchars($_POST['bulan_dibayar']) : $_POST['bulan_dibayar'];
        $thn = htmlentities($_POST['tahun_dibayar']) ? htmlspecialchars($_POST['tahun_dibayar']) : $_POST['tahun_dibayar'];
        $id_spp = htmlentities($_POST['id_spp']) ? htmlspecialchars($_POST['id_spp']) : $_POST['id_spp'];
        $total = htmlentities($_POST['jumlah_bayar']) ? htmlspecialchars($_POST['jumlah_bayar']) : $_POST['jumlah_bayar'];

        $table = "pembayaran";
        $insert = "INSERT INTO $table SET id_akun = '$id_akun', id_santri = '$id_santri', id_kelas = '$id_kelas',
         tgl_bayar = '$tgl', bulan_dibayar = '$bln', tahun_dibayar = '$thn', id_spp = '$id_spp', jumlah_bayar = '$total'";
        $data = $this->db->query($insert);
        $update = "UPDATE santri SET id_spp = '$id_spp' WHERE id_santri = '$id_santri'";
        $this->db->query($update);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=pembayaran-spp'</script>";
                die;
                exit;
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
            die;
            exit;            
        }
    }
}

?>