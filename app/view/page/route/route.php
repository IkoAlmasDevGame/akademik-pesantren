<?php 
require_once("../../../database/koneksi.php");
$name = mysqli_query($konfigs, "SELECT * FROM sistem WHERE flags = '1'");
$row = mysqli_fetch_array($name);

/* Mode & Controller Files */
/* Model Akademik Pesantren */
require_once("../../../model/model_pengguna.php");
require_once("../../../model/model_pendaftaran.php");
$userAuth = new model\userAuthentication($konfigs);
/* Controller Akademik Pesantren */ 
require_once("../../../controller/controller.php");
$Authuser = new controller\Authentication($konfigs);

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
        case 'ubah-pendaftaran':
            require_once("../pendaftaran/ubah.php");
            break;
            case 'value':
                # code...
                break;
        /* Aksi Pendaftaran */
        default:
            require_once("../../../controller/controller.php");
            break;
    }
}

?>