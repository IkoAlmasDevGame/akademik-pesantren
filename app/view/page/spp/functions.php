<?php 
if(isset($_GET['info'])){
    if($_GET['info'] == "bertambah"){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>Anda berhasil menambahkan data spp baru ...</p>
    <button type="button" onclick="document.location.href = '?page=spp'" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
    }elseif($_GET['info'] == "ubah"){
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>Anda berhasil mengupdate data spp baru ...</p>
    <button type="button" onclick="document.location.href = '?page=spp'" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
    }elseif($_GET['info'] == "hapus"){
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>Anda berhasil menghapus data spp baru ...</p>
    <button type="button" onclick="document.location.href = '?page=spp'" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
    }elseif($_GET['info'] == "gagal"){
?>
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>Anda gagal menambahkan/mengupdate/menghapus data spp baru ...</p>
    <button type="button" onclick="document.location.href = '?page=spp'" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php   
    }
}
?>