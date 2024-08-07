<?php 
require_once("../ui/header.php");
?>
<?php require_once("../ui/sidebar.php"); ?>
<?php if($_SESSION['role'] == "superadmin"){ ?>
<div class="container-fluid">
    <div class="d-flex justify-content-around align-items-center flex-wrap gap-4">
        <div class="col-sm-3 col-md-4">
            <div class="card shadow mb-3">
                <div class="card-header py-2">
                    <h4 class="card-title">
                        <i class="fa fa-user-graduate fa-2x"></i>
                    </h4>
                    <figcaption class="text-end fs-5 fw-normal fst-normal text-dark">Santri</figcaption>
                </div>
                <div class="card-footer">
                    <div class="card-body">
                        <?php 
                        $santri = $konfigs->query("SELECT count(id_santri) as jumlah FROM santri");
                        $count = mysqli_fetch_array($santri);
                        echo "<h3 class='fs-2 text-center'>$count[jumlah]</h3>";
                        ?>
                    </div>
                    <div class="border border-bottom my-1"></div>
                    <div class="text-end">
                        <a href="?page=pendaftaran-santri" aria-current="page" class="btn btn-outline-secondary btn-sm">
                            <i class="fa fa-arrow-right fa-1x"></i>
                            <span>Page Santri</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-4">
            <div class="card shadow mb-3">
                <div class="card-header py-2">
                    <h4 class="card-title">
                        <i class="fa fa-user fa-2x"></i>
                    </h4>
                    <figcaption class="text-end fs-5 fw-normal fst-normal text-dark">Guru</figcaption>
                </div>
                <div class="card-footer">
                    <div class="card-body">
                        <?php 
                        $guru = $konfigs->query("SELECT count(id_guru) as jumlah FROM guru");
                        $count = mysqli_fetch_array($guru);
                        echo "<h3 class='fs-2 text-center'>$count[jumlah]</h3>";
                        ?>
                    </div>
                    <div class="border border-bottom my-1"></div>
                    <div class="text-end">
                        <a href="?page=guru" aria-current="page" class="btn btn-outline-secondary btn-sm">
                            <i class="fa fa-arrow-right fa-1x"></i>
                            <span>Page Guru</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-4">
            <div class="card shadow mb-3">
                <div class="card-header py-2">
                    <h4 class="card-title">
                        <i class="fa-brands fa-meetup fa-2x"></i>
                    </h4>
                    <figcaption class="text-end fs-5 fw-normal fst-normal text-dark">Kelas</figcaption>
                </div>
                <div class="card-footer">
                    <div class="card-body">
                        <?php 
                        $kelas = $konfigs->query("SELECT count(id_kelas) as jumlah FROM kelas");
                        $count = mysqli_fetch_array($kelas);
                        echo "<h3 class='fs-2 text-center'>$count[jumlah]</h3>";
                        ?>
                    </div>
                    <div class="border border-bottom my-1"></div>
                    <div class="text-end">
                        <a href="?page=kelas" aria-current="page" class="btn btn-outline-secondary btn-sm">
                            <i class="fa fa-arrow-right fa-1x"></i>
                            <span>Page kelas</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-4">
            <div class="card shadow mb-3">
                <div class="card-header py-2">
                    <h4 class="card-title">
                        <i class="fa fa-users"></i>
                    </h4>
                    <figcaption class="text-end fs-5 fw-normal fst-normal text-dark">Petugas</figcaption>
                </div>
                <div class="card-footer">
                    <div class="card-body">
                        <?php 
                        $petugas = $konfigs->query("SELECT count(id_akun) as jumlah FROM users where role='admin'");
                        $count = mysqli_fetch_array($petugas);
                        echo "<h3 class='fs-2 text-center'>$count[jumlah]</h3>";
                        ?>
                    </div>
                    <div class="border border-bottom my-1"></div>
                    <div class="text-end">
                        <a href="?page=petugas" aria-current="page" class="btn btn-outline-secondary btn-sm">
                            <i class="fa fa-arrow-right fa-1x"></i>
                            <span>Page petugas</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }elseif($_SESSION['role'] == "admin"){ ?>
<?php } ?>
<?php require_once("../ui/footer.php"); ?>