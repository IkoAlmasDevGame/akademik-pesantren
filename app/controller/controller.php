<?php 
namespace controller;
use model\userAuthentication;
use model\pendaftaran;
use model\WorkName;
use model\people;
use model\Teacher;
use model\PelajarMuslim;

class Authentication {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new userAuthentication($konfig);
    }

    public function login(){
        session_start();
        $userInput = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $passInput = md5(htmlspecialchars($_POST['passInput']), false);
        $data = $this->konfig->signin($userInput,$passInput);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class registerd {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pendaftaran($konfig);
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

        $data = $this->konfig->create($nisn,$nama,$tmpt,$tgl,$jenis_kelamin,$agama,$jenjang,$nama_ayah,$pekerjaan_ayah,$nama_ibu,$pekerjaan_ibu,$alamat_rumah,$kode_pos,$nomor_telepon);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_santri']) ? htmlspecialchars($_GET['id_santri']) : $_GET['id_santri'];
        $data = $this->konfig->delete($id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class pekerjaan {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new WorkName($konfig);
    }

    public function buat(){
        $nama = htmlentities($_POST['nama_pekerjaan']) ? htmlspecialchars($_POST['nama_pekerjaan']) : $_POST['nama_pekerjaan'];
        $data = $this->konfig->create($nama);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_pekerjaan']) ? htmlspecialchars($_GET['id_pekerjaan']) : $_GET['id_pekerjaan'];
        $data = $this->konfig->delete($id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class petugas {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new people($konfig);
    }

    public function buat(){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $email = htmlentities($_POST['email']) ? htmlspecialchars($_POST['email']) : $_POST['email'];
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $password = md5($_POST['password'], false);
        $repassword = md5($_POST['repassword'], false);
        $role = htmlentities($_POST['role']) ? htmlspecialchars($_POST['role']) : $_POST['role'];
        $data = $this->konfig->create($username, $email, $nama, $password, $repassword, $role);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_akun']) ? htmlspecialchars($_GET['id_akun']) : $_GET['id_akun'];
        $data = $this->konfig->delete($id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class guru {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Teacher($konfig);
    }

    public function buat(){
        $niptk = htmlentities($_POST['niptk']) ? htmlspecialchars($_POST['niptk']) : $_POST['niptk'];
        $nama = htmlentities($_POST['nama_guru']) ? htmlspecialchars($_POST['nama_guru']) : $_POST['nama_guru'];
        $tmpt = htmlentities($_POST['tmpt_lahir']) ? htmlspecialchars($_POST['tmpt_lahir']) : $_POST['tmpt_lahir'];
        $tgl = htmlentities($_POST['tgl_lahir']) ? htmlspecialchars($_POST['tgl_lahir']) : $_POST['tgl_lahir'];
        $jenis = htmlentities($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : $_POST['jenis_kelamin'];
        $data = $this->konfig->create($niptk,$nama,$tmpt,$tgl,$jenis);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_guru']) ? htmlspecialchars($_GET['id_guru']) : $_GET['id_guru'];
        $data = $this->konfig->delete($id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class Pelajar {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new PelajarMuslim($konfig);
    }

    public function buat(){
        $santri = htmlentities($_POST['id_santri']) ? htmlspecialchars($_POST['id_santri']) : $_POST['id_santri'];
        $kelas = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        $guru = htmlentities($_POST['id_guru']) ? htmlspecialchars($_POST['id_guru']) : $_POST['id_guru'];
        $data = $this->konfig->create($santri,$kelas,$guru);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}
?>