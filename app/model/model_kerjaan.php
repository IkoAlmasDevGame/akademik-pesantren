<?php 
namespace model;

class WorkName{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function delete($id){
        $id = htmlentities($_GET['id_pekerjaan']) ? htmlspecialchars($_GET['id_pekerjaan']) : $_GET['id_pekerjaan'];
        $table = "pekerjaan";
        $delete = "DELETE FROM $table WHERE id_pekerjaan='$id'";
        $data = $this->db->query($delete);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=pekerjaan&info=hapus'</script>";
                die;
                exit;
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=pekerjaan&info=gagal'</script>";
            die;
            exit;
        }
    }

    public function create($nama){
        $id = htmlentities($_POST['id_pekerjaan']) ? htmlspecialchars($_POST['id_pekerjaan']) : $_POST['id_pekerjaan'];
        $nama = htmlentities($_POST['nama_pekerjaan']) ? htmlspecialchars($_POST['nama_pekerjaan']) : $_POST['nama_pekerjaan'];
        /* Database Table */
        $table = "pekerjaan";
        $select = $this->db->query("SELECT count(id_pekerjaan) as id FROM $table WHERE id_pekerjaan = '$id'");
        $cekselect = mysqli_fetch_array($select);
        
        if($cekselect['id'] > 0){
            $update = "UPDATE $table SET nama_pekerjaan = '$nama' WHERE id_pekerjaan = '$id'";
            $data = $this->db->query($update);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=pekerjaan&info=ubah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=pekerjaan&info=gagal'</script>";
                die;
                exit;
            }
        }else{
            $insert = "INSERT INTO $table SET nama_pekerjaan = '$nama'";
            $data = $this->db->query($insert);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=pekerjaan&info=bertambah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=pekerjaan&info=gagal'</script>";
                die;
                exit;                
            }
        }
    }
}
?>