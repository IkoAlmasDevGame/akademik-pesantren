<?php 
namespace controller;
use model\userAuthentication;
use model\pendaftaran;
use model\WorkName;

class Authentication {
    protected $konfigs;
    public function __construct($konfigs)
    {
        $this->konfigs = new userAuthentication($konfigs);
    }

    public function login(){
        session_start();
        $userInput = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $passInput = md5(htmlspecialchars($_POST['passInput']), false);
        $data = $this->konfigs->signin($userInput,$passInput);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class registerd {
    protected $konfigs;
    public function __construct($konfigs)
    {
        $this->konfigs = new pendaftaran($konfigs);
    }

    public function buat(){
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

        $data = $this->konfigs->create($nisn,$nama,$tmpt,$tgl,$jenis_kelamin,$agama,$jenjang,$nama_ayah,$pekerjaan_ayah,$nama_ibu,$pekerjaan_ibu,$alamat_rumah,$kode_pos,$nomor_telepon);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_santri']) ? htmlspecialchars($_GET['id_santri']) : $_GET['id_santri'];
        $data = $this->konfigs->delete($id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class pekerjaan {
    protected $konfigs;
    public function __construct($konfigs)
    {
        $this->konfigs = new WorkName($konfigs);
    }

    public function buat(){
        $nama = htmlentities($_POST['nama_pekerjaan']) ? htmlspecialchars($_POST['nama_pekerjaan']) : $_POST['nama_pekerjaan'];
        $data = $this->konfigs->create($nama);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_pekerjaan']) ? htmlspecialchars($_GET['id_pekerjaan']) : $_GET['id_pekerjaan'];
        $data = $this->konfigs->delete($id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

?>