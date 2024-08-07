<?php 
namespace model;

class Meetclass {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($kode, $nama, $kapasitas){
        $id = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        $kode = htmlentities($_POST['kode_kelas']) ? htmlspecialchars($_POST['kode_kelas']) : $_POST['kode_kelas'];
        $nama = htmlentities($_POST['nama_kelas']) ? htmlspecialchars($_POST['nama_kelas']) : $_POST['nama_kelas'];
        $kapasitas = htmlentities($_POST['kapasitas']) ? htmlspecialchars($_POST['kapasitas']) : $_POST['kapasitas'];

        $table = "kelas";
        $select = $this->db->query("SELECT count(id_kelas) as jumlah FROM $table WHERE id_kelas = '$id'");
        $cekselect = mysqli_fetch_array($select);

        if($cekselect['jumlah'] > 0){
            $update = "UPDATE $table SET kode_kelas = '$kode', nama_kelas = '$nama', kapasitas = '$kapasitas' WHERE id_kelas = '$id'";
            $data = $this->db->query($update);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=kelas&info=ubah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=kelas&info=gagal'</script>";
                die;
                exit;                
            }
        }else{
            $insert = "INSERT INTO $table SET kode_kelas = '$kode', nama_kelas = '$nama', kapasitas = '$kapasitas'";
            $data = $this->db->query($insert);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=kelas&info=bertambah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=kelas&info=gagal'</script>";
                die;
                exit;                
            }
        }
    }

    public function delete($id){
        $id = htmlentities($_GET['id_kelas']) ? htmlspecialchars($_GET['id_kelas']) : $_GET['id_kelas'];
        $table = "kelas";
        $delete = "DELETE FROM $table WHERE id_kelas = '$id'";
        $data = $this->db->query($delete);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=kelas&info=hapus'</script>";
                die;
                exit;
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=kelas&info=gagal'</script>";
            die;
            exit;                
        }
    }
}
?>