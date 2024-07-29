<?php 
// error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$konfigs = mysqli_connect("localhost", "root", "", "akademik-pesantren");

try {
    $configs = new PDO("mysql:host=localhost;dbname=akademik-pesantren;", "root", "");
}catch(PDOException $e){
    die("Database Gagal : ".$e->getMessage());
}
?>