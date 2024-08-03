<?php 
namespace model;

class people {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($username, $email, $nama, $password, $repassword, $role){
        $id = htmlentities($_POST['id_akun']) ? htmlspecialchars($_POST['id_akun']) : $_POST['id_akun'];
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $email = htmlentities($_POST['email']) ? htmlspecialchars($_POST['email']) : $_POST['email'];
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $password = md5($_POST['password'], false);
        $repassword = md5($_POST['repassword'], false);
        $role = htmlentities($_POST['role']) ? htmlspecialchars($_POST['role']) : $_POST['role'];
        // Database Insert and Update
        $table = "users";
        $select = $this->db->query("SELECT count(id_akun) as id FROM $table WHERE id_akun = '$id'");
        $cekselect = mysqli_fetch_array($select);

        if($cekselect['id'] > 0){
            $update = "UPDATE $table SET username='$username', email='$email', nama='$nama', password='$password', repassword='$repassword', role='$role' WHERE id_akun='$id'";
            $data = $this->db->query($update);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=petugas&info=ubah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=petugas&info=gagal'</script>";
                die;
                exit;
            }
        }else{
           $insert = "INSERT INTO $table SET username='$username', email='$email', nama='$nama', password='$password', repassword='$repassword', role='$role'";
           $data = $this->db->query($insert);
           if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=petugas&info=bertambah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=petugas&info=gagal'</script>";
                die;
                exit;
            } 
        }
    }

    public function delete($id){
        $id = htmlentities($_GET['id_akun']) ? htmlspecialchars($_GET['id_akun']) : $_GET['id_akun'];
        $table = "users";
        $delete = "DELETE FROM $table WHERE id_akun = '$id'";
        $data = $this->db->query($delete);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=petugas&info=hapus'</script>";
                die;
                exit;
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=petugas&info=gagal'</script>";
            die;
            exit;
        }
    }
}

?>