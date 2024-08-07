<?php 
namespace model;

class waktu {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function statusSelect($status, $id){
        $id = htmlspecialchars($_POST['jam_ke']) ? htmlentities($_POST['jam_ke']) : $_POST['jam_ke'];
        $status = htmlspecialchars($_POST['status']) ? htmlentities($_POST['status']) : $_POST['status'];
        $table = "jam";
        $updated = "UPDATE $table SET status = '$status' WHERE jam_ke = '$id'";
        $data = $this->db->query($updated);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=jam-jadwal'</script>";
                die;
                exit;
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=jam-jadwal'</script>";
            die;
            exit;
        }
    }

    public function create($mulai, $selesai){
        $ke = htmlentities($_POST['jam_ke']) ? htmlspecialchars($_POST['jam_ke']) : $_POST['jam_ke'];
        $mulai = htmlentities($_POST['mulai']) ? htmlspecialchars($_POST['mulai']) : $_POST['mulai'];
        $selesai = htmlentities($_POST['selesai']) ? htmlspecialchars($_POST['selesai']) : $_POST['selesai'];
        
        $table = "jam";
        $select = $this->db->query("SELECT count(jam_ke) as jam FROM $table WHERE jam_ke = '$ke'");
        $cekselect = mysqli_fetch_array($select);

        if($cekselect['jam'] > 0){
            $update = "UPDATE $table SET mulai = '$mulai', selesai = '$selesai' WHERE jam_ke = '$ke'";
            $data = $this->db->query($update);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=jam-jadwal&info=ubah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "document.location.href = '../ui/header.php?page=jam-jadwal&info=gagal'";
                die;
                exit;
            }
        }else{
            $insert = "INSERT INTO $table SET mulai = '$mulai', selesai = '$selesai'";
            $data = $this->db->query($insert);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=jam-jadwal&info=bertambah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=jam-jadwal&info=gagal'</script>";
                die;
                exit;
            }
        }
    }
}

?>