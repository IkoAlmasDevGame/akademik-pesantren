<?php 
namespace model;

class PelajarMuslim {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($santri, $kelas, $guru){
        $santri = htmlentities($_POST['id_santri']) ? htmlspecialchars($_POST['id_santri']) : $_POST['id_santri'];
        $kelas = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        $guru = htmlentities($_POST['id_guru']) ? htmlspecialchars($_POST['id_guru']) : $_POST['id_guru'];
        $id = htmlentities($_POST['id_reg_kelas']) ? htmlspecialchars($_POST['id_reg_kelas']) : $_POST['id_reg_kelas'];

        $table = "reg_kelas";
        $select = $this->db->query("SELECT count(id_reg_kelas) as jumlah FROM $table WHERE id_reg_kelas = '$id'");
        $cekselect = mysqli_fetch_array($select);

        if($cekselect['jumlah'] > 0){
            $update = "UPDATE $table SET id_kelas = '$kelas' WHERE id_reg_kelas = '$id'";
            $data = $this->db->query($update);
            if($data != null){
                if($data){
                    $this->db->query("UPDATE kelas SET id_guru = '$guru' WHERE id_kelas = '$kelas'");
                    echo "<script>document.location.href = '../ui/header.php?page=santri'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=santri'</script>";
                die;
                exit;
            }
        }else{
            $insert = "INSERT INTO $table SET id_santri = '$santri', id_kelas = '$kelas'";
            $data = $this->db->query($insert);
            if($data != null){
                if($data){
                    $this->db->query("INSERT INTO kelas SET id_guru = '$guru'");
                    echo "<script>document.location.href = '../ui/header.php?page=santri'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=santri'</script>";
                die;
                exit;
            }
        }
    }
}

?>