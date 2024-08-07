<?php 
namespace model;

class days {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function statusSelect($status, $id){
        $id = htmlspecialchars($_POST['id_hari']) ? htmlentities($_POST['id_hari']) : $_POST['id_hari'];
        $status = htmlspecialchars($_POST['status']) ? htmlentities($_POST['status']) : $_POST['status'];
        $table = "hari";
        $updated = "UPDATE $table SET status = '$status' WHERE id_hari = '$id'";
        $data = $this->db->query($updated);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=hari-jadwal'</script>";
                die;
                exit;
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=hari-jadwal'</script>";
            die;
            exit;
        }
    }

    public function create($nama_hari){
        $id = htmlspecialchars($_POST['id_hari']) ? htmlentities($_POST['id_hari']) : $_POST['id_hari'];
        $nama_hari = htmlspecialchars($_POST['nama_hari']) ? htmlentities($_POST['nama_hari']) : $_POST['nama_hari'];

        $table = "hari";
        $select = $this->db->query("SELECT count(id_hari) as id FROM $table WHERE id_hari = '$id'");
        $cekselect = mysqli_fetch_array($select);

        if($cekselect['id'] > 0){
            $update = "UPDATE $table SET nama_hari = '$nama_hari' WHERE id_hari = '$id'";
            $data = $this->db->query($update);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=hari-jadwal&info=ubah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=hari-jadwal&info=gagal'</script>";
                die;
                exit;
            }
        }else{
            $insert = "INSERT INTO $table SET nama_hari = '$nama_hari'";
            $data = $this->db->query($insert);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=hari-jadwal&info=bertambah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=hari-jadwal&info=gagal'</script>";
                die;
                exit;
            }
        }
    }
}

?>