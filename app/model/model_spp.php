<?php 
namespace model;

class sppembayaran {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function delete($id){
        $id = htmlentities($_GET['id_spp']) ? htmlspecialchars($_GET['id_spp']) : $_GET['id_spp'];
        $table = "spp";
        $delete = "DELETE FROM $table WHERE id_spp = '$id'";
        $data = $this->db->query($delete);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=spp&info=hapus'</script>";
                die;
                exit;   
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=spp&info=gagal'</script>";
            die;
            exit;
        }
    }

    public function created($nominal){
        $nominal = htmlentities($_POST['nominal']) ? htmlspecialchars($_POST['nominal']) : $_POST['nominal'];
        $id = htmlentities($_POST['id_spp']) ? htmlspecialchars($_POST['id_spp']) : $_POST['id_spp'];
        $table = "spp";
        $select = $this->db->query("SELECT count(id_spp) as id FROM $table where id_spp = '$id'");
        $cekselect = mysqli_fetch_array($select);

        if($cekselect['id'] > 0){
            $update = "UPDATE $table SET nominal = '$nominal' WHERE id_spp = '$id'";
            $datae = $this->db->query($update);
            if($datae != null){
                if($datae){
                    echo "<script>document.location.href = '../ui/header.php?page=spp&info=ubah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=spp&info=gagal'</script>";
                uniqid($id);
                die;
                exit;
            }
        }else{
            $insert = "INSERT INTO $table SET nominal = '$nominal'";
            $data = $this->db->query($insert);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=spp&info=bertambah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=spp&info=gagal'</script>";
                uniqid($id);
                die;
                exit;
            }
        }
    }
}

?>