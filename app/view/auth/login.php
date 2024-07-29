<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            require_once("../../database/koneksi.php");
            $table = "sistem";
            $sql = "SELECT * FROM $table WHERE flags = '1'";
            $row = mysqli_query($konfigs, $sql);
            $hasil = $row->fetch_array();
        ?>
        <title>Login <?php echo $hasil['nama_sekolah'] ?></title>
        <link rel="stylesheet" href="style-min.css" crossorigin="anonymous">
        <link rel="shortcut icon" crossorigin="anonymous" href="../../../assets/logo/<?php echo $hasil['icon']?>"
            type="image/x-icon">
        <link rel="stylesheet" crossorigin="anonymous"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" crossorigin="anonymous"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>

    <body class="body" onload="startTime()">
        <div class="container-fluid mt-4 pt-5">
            <div class="d-flex justify-content-center align-items-center flex-wrap mt-1 pt-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title text-center">Login</h4>
                        <h4 class="card-title text-center"><?php echo $hasil['nama_sekolah'] ?></h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            require_once("../../model/model_pengguna.php");
                            require_once("../../controller/controller.php");
                            $userAuth = new controller\Authentication($konfigs);
                            if(!isset($_GET['aksi'])){
                                require_once("../../controller/controller.php");
                            }else{
                                switch ($_GET['aksi']) {
                                    case 'sign-in':
                                        $userAuth->login();
                                        break;
                                    
                                    default:
                                        require_once("../../controller/controller.php");
                                        break;
                                }
                            }
                        ?>
                        <form action="?aksi=sign-in" method="post">
                            <div class="form-group">
                                <div class="form-inline">
                                    <div class="form-label">
                                        <label for="Inputuser" class="label label-default">username / email</label>
                                    </div>
                                    <input type="text" name="userInput" class="form-control" required
                                        aria-required="TRUE" placeholder="masukkan usernama atau email anda ..."
                                        id="Inputuser">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-inline">
                                    <div class="form-label">
                                        <label for="Inputpass" class="label label-default">password</label>
                                    </div>
                                    <input type="password" name="passInput" class="form-control" required
                                        aria-required="TRUE" placeholder="masukkan password anda ..." id="Inputpass">
                                </div>
                            </div>
                            <div class="card-footer m-1">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-sign-in-alt fa-1x"></i>
                                        <span>Sign In</span>
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        <i class="fa fa-eraser fa-1x"></i>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                                <div class="container mt-4 p-1">
                                    <footer class="footer">
                                        <p id="year" class="text-center"></p>
                                    </footer>
                                    <div class="text-center">By <?php echo $hasil['nama_sekolah'] ?></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script crossorigin="anonymous"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script type="text/javascript" crossorigin="anonymous">
        function startTime() {
            var day = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];
            var today = new Date();
            var h = today.getHours();
            var tahun = today.getFullYear();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('year').innerHTML =
                "&copy <?php echo $hasil['nama_sekolah']?> " + tahun + "<br>" + day[today.getDay()] + ", " + h + " : " +
                m +
                " : " + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
        </script>
        <script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
        </script>
        <script crossorigin="anonymous" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
    </body>

</html>