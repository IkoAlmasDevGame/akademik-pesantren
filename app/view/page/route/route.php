<?php 
require_once("../../../database/koneksi.php");
$name = mysqli_query($konfigs, "SELECT * FROM sistem WHERE flags = '1'");
$row = mysqli_fetch_array($name);

/* Model & Controller Files */
/* Model Akademik Pesantren */
require_once("../../../model/model_pengguna.php");
require_once("../../../model/model_pendaftaran.php");
require_once("../../../model/model_kerjaan.php");
require_once("../../../model/model_petugas.php");
require_once("../../../model/model_guru.php");
require_once("../../../model/model_santri.php");
require_once("../../../model/model_kelas.php");
require_once("../../../model/model_hari.php");
require_once("../../../model/model_jam.php");
require_once("../../../model/model_pelajaran.php");
require_once("../../../model/model_spp.php");
require_once("../../../model/model_pembayaran.php");
/* Required File Model */
$userAuth = new model\userAuthentication($konfigs);
$regAuths = new model\pendaftaran($konfigs);
$workname = new model\WorkName($konfigs);
$peopleAuths = new model\people($konfigs);
$guruAuth = new model\Teacher($konfigs);
$santriAuth = new model\PelajarMuslim($konfigs);
$kelasAuth = new model\Meetclass($konfigs);
$hariAuth = new model\days($konfigs);
$waktuAuth = new model\waktu($konfigs);
$LessonAuth = new model\lesson($konfigs);
$SppAuth = new model\sppembayaran($konfigs);
$payment = new model\pembayaran($konfigs);
/* Controller Akademik Pesantren */ 
require_once("../../../controller/controller.php");
$Authuser = new controller\Authentication($konfigs);
$Authregs = new controller\registerd($konfigs);
$AuthWork = new controller\pekerjaan($konfigs);
$AuthPeople = new controller\petugas($konfigs);
$AuthGuru = new controller\guru($konfigs);
$AuthSantri = new controller\Pelajar($konfigs);
$AuthKelas = new controller\Kelas($konfigs);
$AuthHari = new controller\Hari($konfigs);
$AuthWaktu = new controller\jam($konfigs);
$AuthLesson = new controller\pelajaran($konfigs);
$AuthSPP = new controller\spp($konfigs);
$AuthPayment = new controller\cashpayment($konfigs);

if(!isset($_GET['page'])){
}else{
    switch ($_GET['page']) {
        case 'beranda':
            require_once("../dashboard/index.php");
            break;
            
        case 'pendaftaran-santri':
            require_once("../pendaftaran/pendaftaran.php");
            break;
            
        case 'pekerjaan':
            require_once("../pekerjaan/pekerjaan.php");
            break;
            
        case 'petugas':
            require_once("../petugas/petugas.php");
            break;
            
        case 'guru':
            require_once("../guru/guru.php");
            break;
            
        case 'santri':
            require_once("../santri/santri.php");
            break;
            
        case 'kelas':
            require_once("../kelas/kelas.php");
            break;
            
        case 'matapelajaran':
            require_once("../matapelajaran/mapel.php");
            break;
            
        case 'jadwal-pelajaran':
            require_once("../matapelajaran/jadwal.php");
            break;
            
        case 'hari-jadwal':
            require_once("../hari/hari.php");
            break;
            
        case 'jam-jadwal':
            require_once("../jam/jam.php");
            break;
            
        case 'spp':
            require_once("../spp/spp.php");
            break;
            
        case 'pembayaran-spp':
            require_once("../pembayaran/pembayaran.php");
            break;
            
        case 'laporan-pembayaran':
            require_once("../laporan/laporan-pembayaran.php");
            break;
        
        case 'keluar':
            if(isset($_SESSION['status'])){
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../../auth/login.php");
            exit(0);
            break;
        
        default:
            require_once("../dashboard/index.php");
            break;
    }
}

if(!isset($_GET['aksi'])){
}else{
    switch ($_GET['aksi']) {
        /* Aksi Pendaftaran */
        case 'tambah-pendaftaran-santri':
            require_once("../pendaftaran/tambah.php");
            break;
        case 'ubah-pendaftaran-santri':
            require_once("../pendaftaran/ubah.php");
            break;
            case 'tambah-santri':
                $Authregs->buat();
                break;
            case 'hapus-santri':
                $Authregs->hapus();
                break;
        /* Aksi Pendaftaran */

        /* Aksi Pekerjaan */
        case 'tambah-pekerjaan':
            $AuthWork->buat();
            break; 
        case 'hapus-pekerjaan':
            $AuthWork->hapus();
            break; 
        /* Aksi Pekerjaan */

        /* Aksi Petugas */
        case 'tambah-petugas':
            $AuthPeople->buat();
            break;
        case 'hapus-petugas':
            $AuthPeople->hapus();
            break;
        /* Aksi Petugas */

        /* Aksi Guru */ 
        case 'tambah-data-guru':
            require_once("../guru/tambah.php");
            break;
        case 'ubah-data-guru':
            require_once("../guru/ubah.php");
            break;
            case 'tambah-guru':
                $AuthGuru->buat();
                break;
            case 'select-guru':
                $AuthGuru->select();
                break;
            case 'hapus-guru':
                $AuthGuru->hapus();
                break;
        /* Aksi Guru */ 

        /* Aksi Santri Akses */
        case 'santri-access':
            $AuthSantri->buat();
            break;
        case 'santri-selection':
            $AuthSantri->select();
            break;
        /* Aksi Santri Akses */

        /* Aksi Kelas */
        case 'tambah-data-kelas':
            require_once("../kelas/tambah.php");
            break;
        case 'ubah-data-kelas':
            require_once("../kelas/ubah.php");
            break;
            case 'tambah-kelas':
                $AuthKelas->buat();
                break;
            case 'hapus-kelas':
                $AuthKelas->hapus();
                break;
        /* Aksi Kelas */

        /* Aksi Hari */
        case 'select-hari':
            $AuthHari->select();
            break;
        case 'tambah-hari':
            $AuthHari->buat();
            break;
        /* Aksi Hari */

        /* Aksi Jam Pelajaran */
        case 'tambah-waktu':
            $AuthWaktu->buat();
            break;
        case 'select-waktu':
            $AuthWaktu->select();
            break;
        /* Aksi Jam Pelajaran */

        /* Aksi Pelajaran */
        case 'tambah-pelajaran':
            $AuthLesson->buat();
            break;
        case 'select-pelajaran':
            $AuthLesson->select();
            break;
        /* Aksi Pelajaran */

        /* Aksi SPPembayaran */
        case 'tambah-spp':
            $AuthSPP->buat();
            break;
        case 'hapus-spp':
            $AuthSPP->hapus();
            break;
        /* Aksi SPPembayaran */

        /* Aksi Payemnt */
        case 'bayar-spp':
            $AuthPayment->getpayment();
            break;

        default:
            require_once("../../../controller/controller.php");
            break;
    }
}

?>