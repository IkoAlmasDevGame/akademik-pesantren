<?php 
namespace model;

class pendaftaran {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function delete($id){
        $id = htmlentities($_GET['id_santri']) ? htmlspecialchars($_GET['id_santri']) : $_GET['id_santri'];
        $table = "santri";
        $delete = "DELETE FROM $table WHERE id_santri = '$id'";
        $data = $this->db->query($delete);
        if($data != null){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=pendaftaran-santri&info=hapus'</script>";
                die;
                exit;                    
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=pendaftaran-santri&info=gagal'</script>";
            die;
            exit;
        }
    }

    public function create($nisn,$nama,$tmpt,$tgl,$jenis_kelamin,$agama,$jenjang,$nama_ayah,$pekerjaan_ayah,$nama_ibu,$pekerjaan_ibu,$alamat_rumah,$kode_pos,$nomor_telepon){
        $nisn = htmlentities($_POST['nisn_santri']) ? htmlspecialchars($_POST['nisn_santri']) : $_POST['nisn_santri'];
        $nama = htmlentities($_POST['nama_santri']) ? htmlspecialchars($_POST['nama_santri']) : $_POST['nama_santri'];
        $tmpt = htmlentities($_POST['tmpt_lahir']) ? htmlspecialchars($_POST['tmpt_lahir']) : $_POST['tmpt_lahir'];
        $tgl = htmlentities($_POST['tgl_lahir']) ? htmlspecialchars($_POST['tgl_lahir']) : $_POST['tgl_lahir'];
        $jenis_kelamin = htmlentities($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : $_POST['jenis_kelamin'];
        $agama = htmlentities($_POST['agama']) ? htmlspecialchars($_POST['agama']) : $_POST['agama'];
        $jenjang = htmlentities($_POST['jenjang']) ? htmlspecialchars($_POST['jenjang']) : $_POST['jenjang'];
        /* Data Orang Tua */
        $nama_ayah = htmlentities($_POST['nama_ayah']) ? htmlspecialchars($_POST['nama_ayah']) : $_POST['nama_ayah'];
        $pekerjaan_ayah = htmlentities($_POST['pekerjaan_ayah']) ? htmlspecialchars($_POST['pekerjaan_ayah']) : $_POST['pekerjaan_ayah'];
        $nama_ibu = htmlentities($_POST['nama_ibu']) ? htmlspecialchars($_POST['nama_ibu']) : $_POST['nama_ibu'];
        $pekerjaan_ibu = htmlentities($_POST['pekerjaan_ibu']) ? htmlspecialchars($_POST['pekerjaan_ibu']) : $_POST['pekerjaan_ibu'];
        $alamat_rumah = htmlentities($_POST['alamat_rumah']) ? htmlspecialchars($_POST['alamat_rumah']) : $_POST['alamat_rumah'];
        $kode_pos = htmlentities($_POST['kode_pos']) ? htmlspecialchars($_POST['kode_pos']) : $_POST['kode_pos'];
        $nomor_telepon = htmlentities($_POST['nomor_telepon']) ? htmlspecialchars($_POST['nomor_telepon']) : $_POST['nomor_telepon'];
        /* Data Orang Tua */
        
        /* Photo Ayah, Photo Ibu, Photo Santri */
        # code photo santri
        $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif'); 
        $photo_src = htmlentities($_FILES["photo_src"]["name"]) ? htmlspecialchars($_FILES["photo_src"]["name"]) : $_FILES["photo_src"]["name"];
        $x_foto = explode('.', $photo_src);
        $ekstensi_photo_src = strtolower(end($x_foto));
        $ukuran_photo_src = $_FILES['photo_src']['size'];
        $file_tmp_photo_src = $_FILES['photo_src']['tmp_name'];
        
        if(in_array($ekstensi_photo_src, $ekstensi_diperbolehkan_foto) === true){
            if($ukuran_photo_src < 10440070){
                move_uploaded_file($file_tmp_photo_src, "../../../../assets/photo/" . $photo_src);
            }else{
                echo "Tidak Dapat Ter - Upload Size Gambar";
                exit;                
            }
        }else{
            echo "Tidak Dapat Ter - Upload Gambar";
            exit;
        }

        # code photo ayah
        $ekstensi_diperbolehkan_photo_src_ayah = array('png', 'jpg', 'jpeg', 'jfif', 'gif'); 
        $photo_src_ayah = htmlentities($_FILES["photo_src_ayah"]["name"]) ? htmlspecialchars($_FILES["photo_src_ayah"]["name"]) : $_FILES["photo_src_ayah"]["name"];
        $x_photo_src_ayah = explode('.', $photo_src_ayah);
        $ekstensi_photo_src_ayah = strtolower(end($x_photo_src_ayah));
        $ukuran_photo_src_ayah = $_FILES['photo_src_ayah']['size'];
        $file_tmp_photo_src_ayah = $_FILES['photo_src_ayah']['tmp_name'];

        if(in_array($ekstensi_photo_src_ayah,$ekstensi_diperbolehkan_photo_src_ayah) === true){
            if($ukuran_photo_src_ayah < 10440070){
                move_uploaded_file($file_tmp_photo_src_ayah, "../../../../assets/photo/". $photo_src_ayah);   
            }else{
                echo "Tidak Dapat Ter - Upload Size Gambar";
                exit;                
            }
        }else{
            echo "Tidak Dapat Ter - Upload Gambar";
            exit;
        }

        # code photo ayah
        $ekstensi_diperbolehkan_photo_src_ibu = array('png', 'jpg', 'jpeg', 'jfif', 'gif'); 
        $photo_src_ibu = htmlentities($_FILES["photo_src_ibu"]["name"]) ? htmlspecialchars($_FILES["photo_src_ibu"]["name"]) : $_FILES["photo_src_ibu"]["name"];
        $x_photo_src_ibu = explode('.', $photo_src_ibu);
        $ekstensi_photo_src_ibu = strtolower(end($x_photo_src_ibu));
        $ukuran_photo_src_ibu = $_FILES['photo_src_ibu']['size'];
        $file_tmp_photo_src_ibu = $_FILES['photo_src_ibu']['tmp_name'];

        if(in_array($ekstensi_photo_src_ibu,$ekstensi_diperbolehkan_photo_src_ibu) === true){
            if($ukuran_photo_src_ibu < 10440070){
                move_uploaded_file($file_tmp_photo_src_ibu, "../../../../assets/photo/" . $photo_src_ibu);   
            }else{
                echo "File Photo anda melibih dari 1mb";
                die;
                exit;
            }
        }else{
            echo "File ekstension anda tidak diperbolehkan";
            die;
            exit;
        }
        /* Photo Ayah, Photo Ibu, Photo Santri */

        $table = "santri";
        $cekSantri = $this->db->query("SELECT count(id_santri) as jumlah FROM $table WHERE id_santri = '$_POST[id_santri]'");
        $cekselect = mysqli_fetch_array($cekSantri);

        if($cekselect['jumlah'] > 0){
            $update = "UPDATE $table SET nisn_santri='$nisn', nama_santri='$nama', tmpt_lahir='$tmpt', tgl_lahir='$tgl', jenis_kelamin='$jenis_kelamin', agama='$agama', jenjang='$jenjang', photo_src='$photo_src', nama_ayah='$nama_ayah', pekerjaan_ayah='$pekerjaan_ayah', photo_src_ayah='$photo_src_ayah',  nama_ibu='$nama_ibu', pekerjaan_ibu='$pekerjaan_ibu', photo_src_ibu='$photo_src_ibu', alamat_rumah='$alamat_rumah', kode_pos='$kode_pos', nomor_telepon='$nomor_telepon' WHERE id_santri='$_POST[id_santri]'";
            $data = $this->db->query($update);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=pendaftaran-santri&info=ubah'</script>";
                    die;
                    exit;                    
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=pendaftaran-santri&info=gagal'</script>";
                die;
                exit;
            }
        }else{
            $insert = "INSERT INTO $table (nisn_santri, nama_santri, tmpt_lahir, tgl_lahir, jenis_kelamin, agama, jenjang, photo_src, nama_ayah, pekerjaan_ayah, photo_src_ayah, nama_ibu, pekerjaan_ibu,photo_src_ibu, alamat_rumah, kode_pos, nomor_telepon) VALUES ('$nisn', '$nama', '$tmpt', '$tgl', '$jenis_kelamin', '$agama', '$jenjang', '$photo_src', '$nama_ayah', '$pekerjaan_ayah', '$photo_src_ayah', '$nama_ibu', '$pekerjaan_ibu', '$photo_src_ibu', '$alamat_rumah', '$kode_pos', '$nomor_telepon')";
            $data = $this->db->query($insert);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=pendaftaran-santri&info=bertambah'</script>";
                    die;
                    exit;                    
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=pendaftaran-santri&info=gagal'</script>";
                die;
                exit;
            }
        }
    }
}
?>