<?php 
require_once("../../../database/koneksi.php");
$name = mysqli_query($konfigs, "SELECT * FROM sistem WHERE flags = '1'");
$row = mysqli_fetch_array($name);

/* Mode & Controller Files */
/* Model Akademik Pesantren */
require_once("../../../model/model_pengguna.php");
require_once("../../../model/model_pendaftaran.php");
require_once("../../../model/model_kerjaan.php");
require_once("../../../model/model_petugas.php");
$userAuth = new model\userAuthentication($konfigs);
$regAuths = new model\pendaftaran($konfigs);
$workname = new model\WorkName($konfigs);
$peopleAuths = new model\people($konfigs);
/* Controller Akademik Pesantren */ 
require_once("../../../controller/controller.php");
$Authuser = new controller\Authentication($konfigs);
$Authregs = new controller\registerd($konfigs);
$AuthWork = new controller\pekerjaan($konfigs);
$AuthPeople = new controller\petugas($konfigs);

if(!isset($_GET['page'])){
    require_once("../dashboard/index.php");
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
    require_once("../../../controller/controller.php");
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
            require_once("../guru/tambah.php");
            break;
            case 'tambah-guru':
                # code...
                break;
            case 'ubah-guru':
                # code...
                break;
        /* Aksi Guru */ 

        default:
            require_once("../../../controller/controller.php");
            break;
    }
}

?>