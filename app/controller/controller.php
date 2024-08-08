<?php 
namespace controller;
use model\userAuthentication;
use model\pendaftaran;
use model\WorkName;
use model\people;
use model\Teacher;
use model\PelajarMuslim;
use model\Meetclass;
use model\days;
use model\waktu;
use model\lesson;
use model\sppembayaran;
use model\pembayaran;

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

    public function select(){
        $id = htmlspecialchars($_POST['id_guru']) ? htmlentities($_POST['id_guru']) : $_POST['id_guru'];
        $status = htmlspecialchars($_POST['status']) ? htmlentities($_POST['status']) : $_POST['status'];
        $data = $this->konfig->statusSelect($status, $id);
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

    public function select(){
        $id_santri = htmlentities($_POST['id_santri']) ? htmlspecialchars($_POST['id_santri']) : $_POST['id_santri'];
        $status = htmlentities($_POST['status']) ? htmlspecialchars($_POST['status']) : $_POST['status'];
        $data = $this->konfig->statusSelect($status, $id_santri);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class Kelas {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Meetclass($konfig);
    }

    public function buat(){
        $kode = htmlentities($_POST['kode_kelas']) ? htmlspecialchars($_POST['kode_kelas']) : $_POST['kode_kelas'];
        $nama = htmlentities($_POST['nama_kelas']) ? htmlspecialchars($_POST['nama_kelas']) : $_POST['nama_kelas'];
        $kapasitas = htmlentities($_POST['kapasitas']) ? htmlspecialchars($_POST['kapasitas']) : $_POST['kapasitas'];
        $data = $this->konfig->create($kode, $nama, $kapasitas);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_kelas']) ? htmlspecialchars($_GET['id_kelas']) : $_GET['id_kelas'];
        $data = $this->konfig->delete($id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class Hari {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new days($konfig);
    }

    public function select(){
        $id = htmlspecialchars($_POST['id_hari']) ? htmlentities($_POST['id_hari']) : $_POST['id_hari'];
        $status = htmlspecialchars($_POST['status']) ? htmlentities($_POST['status']) : $_POST['status'];
        $data = $this->konfig->statusSelect($status, $id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function buat(){
        $nama_hari = htmlspecialchars($_POST['nama_hari']) ? htmlentities($_POST['nama_hari']) : $_POST['nama_hari'];
        $data = $this->konfig->create($nama_hari);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class jam {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new waktu($konfig);
    }

    public function buat(){
        $mulai = htmlentities($_POST['mulai']) ? htmlspecialchars($_POST['mulai']) : $_POST['mulai'];
        $selesai = htmlentities($_POST['selesai']) ? htmlspecialchars($_POST['selesai']) : $_POST['selesai'];
        $data = $this->konfig->create($mulai, $selesai);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function select(){
        $id = htmlspecialchars($_POST['jam_ke']) ? htmlentities($_POST['jam_ke']) : $_POST['jam_ke'];
        $status = htmlspecialchars($_POST['status']) ? htmlentities($_POST['status']) : $_POST['status'];
        $data = $this->konfig->statusSelect($status, $id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class pelajaran{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new lesson($konfig);
    }

    public function buat(){
        $kode = htmlentities($_POST['kode_pelajaran']) ? htmlspecialchars($_POST['kode_pelajaran']) : $_POST['kode_pelajaran'];
        $nama = htmlentities($_POST['nama_idn']) ? htmlspecialchars($_POST['nama_idn']) : $_POST['nama_idn'];
        $data = $this->konfig->create($kode,$nama);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
    
    public function select(){
        $id = htmlspecialchars($_POST['id_pelajaran']) ? htmlentities($_POST['id_pelajaran']) : $_POST['id_pelajaran'];
        $status = htmlspecialchars($_POST['status']) ? htmlentities($_POST['status']) : $_POST['status'];
        $data = $this->konfig->statusSelect($status, $id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class spp {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new sppembayaran($konfig);
    }

    public function buat(){
        $nominal = htmlentities($_POST['nominal']) ? htmlspecialchars($_POST['nominal']) : $_POST['nominal'];
        $data = $this->konfig->created($nominal);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id = htmlentities($_GET['id_spp']) ? htmlspecialchars($_GET['id_spp']) : $_GET['id_spp'];
        $data = $this->konfig->delete($id);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class cashpayment {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pembayaran($konfig);
    }

    public function getpayment(){
        $id_akun = htmlentities($_POST['id_akun']) ? htmlspecialchars($_POST['id_akun']) : $_POST['id_akun'];
        $id_santri = htmlentities($_POST['id_santri']) ? htmlspecialchars($_POST['id_santri']) : $_POST['id_santri'];
        $id_kelas = htmlentities($_POST['id_kelas']) ? htmlspecialchars($_POST['id_kelas']) : $_POST['id_kelas'];
        $tgl = htmlentities($_POST['tgl_bayar']) ? htmlspecialchars($_POST['tgl_bayar']) : $_POST['tgl_bayar'];
        $bln = htmlentities($_POST['bulan_dibayar']) ? htmlspecialchars($_POST['bulan_dibayar']) : $_POST['bulan_dibayar'];
        $thn = htmlentities($_POST['tahun_dibayar']) ? htmlspecialchars($_POST['tahun_dibayar']) : $_POST['tahun_dibayar'];
        $id_spp = htmlentities($_POST['id_spp']) ? htmlspecialchars($_POST['id_spp']) : $_POST['id_spp'];
        $total = htmlentities($_POST['jumlah_bayar']) ? htmlspecialchars($_POST['jumlah_bayar']) : $_POST['jumlah_bayar'];
        $data = $this->konfig->payment($id_akun, $id_santri, $id_kelas, $tgl, $bln, $thn, $id_spp, $total);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}
?>