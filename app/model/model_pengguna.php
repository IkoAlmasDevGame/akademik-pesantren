<?php 
namespace model;

class userAuthentication {
    protected $db;
    public function __construct($db)
    {
        $this -> db = $db;
    }

    public function signin($userInput, $passInput){
        $userInput = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $passInput = md5(htmlspecialchars($_POST['passInput']), false);
        password_verify($passInput, PASSWORD_DEFAULT);

        if($userInput == "" || $passInput == ""){
            echo "<script>document.location.href = '../auth/login.php'</script>";
            die;
            exit;
        }

        $table = "users";
        $sql = "SELECT * FROM $table WHERE username = '$userInput' and password = '$passInput' || email = '$userInput' and password = '$passInput'";
        $data = $this->db->query($sql);
        $cek = mysqli_num_rows($data);

        if($cek > 0){
            $reseponse = array($userInput, $passInput);
            $reseponse['users'] = $reseponse;
            if($row = mysqli_fetch_assoc($data)){
                if($row['role'] == "superadmin"){
                    $_SESSION['id'] = $row['id_akun'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['role'] = "superadmin";
                    echo "<script>document.location.href = '../page/ui/header.php?page=beranda';</script>";
                }elseif($row['role'] == "admin"){
                    $_SESSION['id'] = $row['id_akun'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['role'] = "admin";
                    echo "<script>document.location.href = '../page/ui/header.php?page=beranda';</script>";
                }
                $_SESSION['status'] = true;
                $_COOKIE['cookies'] = $userInput;
                setcookie($reseponse['users'], $row, time() + (86400 * 30), "/");
                $_SERVER['HTTPS'] == $_SERVER['HTTP'] = "on";
                array_push($reseponse['users'], $row);
            }else{
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] == $_SERVER['HTTP'] = "off";
                echo "<script>document.location.href = '../auth/login.php'</script>";
                die;
                exit;
            }
        }
    }
}

?>