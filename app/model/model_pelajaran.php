<?php 
namespace model;

class lesson {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function statusSelect($status, $id){
        $id = htmlspecialchars($_POST['id_pelajaran']) ? htmlentities($_POST['id_pelajaran']) : $_POST['id_pelajaran'];
        $status = htmlspecialchars($_POST['status']) ? htmlentities($_POST['status']) : $_POST['status'];
        $table = "pelajaran";
        $updated = "UPDATE $table SET status = '$status' WHERE id_pelajaran = '$id'";
        $data = $this->db->query($updated);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=jadwal-pelajaran'</script>";
                die;
                exit;
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=jadwal-pelajaran'</script>";
            die;
            exit;
        }
    }

    public function create($kode, $nama){
        $kode = htmlentities($_POST['kode_pelajaran']) ? htmlspecialchars($_POST['kode_pelajaran']) : $_POST['kode_pelajaran'];
        $nama = htmlentities($_POST['nama_idn']) ? htmlspecialchars($_POST['nama_idn']) : $_POST['nama_idn'];
        $id = htmlspecialchars($_POST['id_pelajaran']) ? htmlentities($_POST['id_pelajaran']) : $_POST['id_pelajaran'];
        $table = "pelajaran";
        $select = $this->db->query("SELECT count(id_pelajaran) as jumlah FROM $table WHERE id_pelajaran = '$id'");
        $cekselect = mysqli_fetch_array($select);
        
        if($cekselect['jumlah'] > 0){
            $update = "UPDATE $table SET kode_pelajaran = '$kode', nama_idn = '$nama' WHERE id_pelajaran = '$id'";
            $data = $this->db->query($update);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=jadwal-pelajaran'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=jadwal-pelajaran'</script>";
                die;
                exit;                
            }
        }else{
            $insert = "INSERT INTO $table SET kode_pelajaran = '$kode', nama_idn = '$nama'";
            $data = $this->db->query($insert);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=jadwal-pelajaran'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=jadwal-pelajaran'</script>";
                die;
                exit;                
            }
        }
    }
}

?>