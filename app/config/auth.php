<?php 
if(isset($_SESSION["status"])){
    if(isset($_SESSION["id"])){
        if(isset($_SESSION["username"])){
            if(isset($_SESSION["nama"])){
                if(isset($_SESSION["role"])){
                    if(isset($_COOKIE['cookies'])){
                        if(isset($_SERVER['HTTPS']) && "on" == $_SERVER['HTTP'] || "off" == $_SERVER['HTTP']){
                            
                        }
                    }
                }
            }
        }
    }
}else{
   echo "<script lang='javascript'>
    window.setTimeout(() => {
        alert('Maaf anda gagal masuk ke halaman utama ...'),
        window.location.href='../../auth/login.php'
    }, 3000);
    </script>
    ";
    die;
    exit(0);
}
?>