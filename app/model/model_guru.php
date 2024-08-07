<?php 
namespace model;

class Teacher {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($niptk, $nama, $tmpt, $tgl, $jenis){
        $niptk = htmlentities($_POST['niptk']) ? htmlspecialchars($_POST['niptk']) : $_POST['niptk'];
        $nama = htmlentities($_POST['nama_guru']) ? htmlspecialchars($_POST['nama_guru']) : $_POST['nama_guru'];
        $tmpt = htmlentities($_POST['tmpt_lahir']) ? htmlspecialchars($_POST['tmpt_lahir']) : $_POST['tmpt_lahir'];
        $tgl = htmlentities($_POST['tgl_lahir']) ? htmlspecialchars($_POST['tgl_lahir']) : $_POST['tgl_lahir'];
        $jenis = htmlentities($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : $_POST['jenis_kelamin'];
        $id = htmlentities($_POST['id_guru']) ? htmlspecialchars($_POST['id_guru']) : $_POST['id_guru'];

        $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif'); 
        $photo_src = htmlentities($_FILES["photo_src"]["name"]) ? htmlspecialchars($_FILES["photo_src"]["name"]) : $_FILES["photo_src"]["name"];
        $x_foto = explode('.', $photo_src);
        $ekstensi_photo_src = strtolower(end($x_foto));
        $ukuran_photo_src = $_FILES['photo_src']['size'];
        $file_tmp_photo_src = $_FILES['photo_src']['tmp_name'];
        
        if(in_array($ekstensi_photo_src, $ekstensi_diperbolehkan_foto) === true){
            if($ukuran_photo_src < 10440070){
                move_uploaded_file($file_tmp_photo_src, "../../../../assets/photo/guru/" . $photo_src);
            }else{
                echo "Tidak Dapat Ter - Upload Size Gambar";
                exit;                
            }
        }else{
            echo "Tidak Dapat Ter - Upload Gambar";
            exit;
        }

        $table = "guru";
        $select = $this->db->query("SELECT count(id_guru) as jumlah FROM $table WHERE id_guru = '$id'");
        $cekselect = mysqli_fetch_array($select);

        if($cekselect['jumlah'] > 0){
            $update = "UPDATE $table SET niptk = '$niptk', nama_guru = '$nama', tmpt_lahir = '$tmpt', tgl_lahir = '$tgl', jenis_kelamin = '$jenis', photo_src = '$photo_src' WHERE id_guru = '$id'";
            $data = $this->db->query($update);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=guru&info=ubah'</script>";
                    die;
                    exit;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=guru&info=gagal'</script>";
                die;
                exit;
            }
        }else{
            $insert = "INSERT INTO $table SET niptk = '$niptk', nama_guru = '$nama', tmpt_lahir = '$tmpt', tgl_lahir = '$tgl', jenis_kelamin = '$jenis', photo_src = '$photo_src'";
            $data = $this->db->query($insert);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=guru&info=bertambah'</script>";
                    die;
                    exit;   
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=guru&info=gagal'</script>";
                die;
                exit;
            }
        }
    }

    public function statusSelect($status, $id){
        $id = htmlentities($_POST['id_guru']) ? htmlspecialchars($_POST['id_guru']) : $_POST['id_guru'];
        $status = htmlentities($_POST['status']) ? htmlspecialchars($_POST['status']) : $_POST['status'];
        $table = "guru";
        $updated = "UPDATE $table SET status = '$status' WHERE id_guru = '$id'";
        $data = $this->db->query($updated);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=guru'</script>";
                die;
                exit;
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=guru'</script>";
            die;
            exit;
        }
    }

    public function delete($id){
        $id = htmlentities($_GET['id_guru']) ? htmlspecialchars($_GET['id_guru']) : $_GET['id_guru'];
        $table = "guru";
        $delete = "DELETE FROM $table WHERE id_guru = '$id'";
        $data = $this->db->query($delete);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=guru&info=hapus'</script>";
                die;
                exit;   
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=guru&info=gagal'</script>";
            die;
            exit;
        }
    }
}
?>