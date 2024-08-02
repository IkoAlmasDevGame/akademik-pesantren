<?php 
function agama($agama){
    if($agama == 1){
        echo "Islam";
    }elseif($agama == 2){
        echo "Kristen";
    }elseif($agama == 3){
        echo "Katholik";
    }elseif($agama == 4){
        echo "Buddha";
    }elseif($agama == 5){
        echo "Hindu";
    }elseif($agama == 6){
        echo "Konghucu";
    }else{
        echo "Ateis";
    }
}

function kelamin($jenis){
    if($jenis == "L"){
        echo "Laki - Laki";
    }else{
        echo "Perempuan";
    }
}

function jenjang($jenjang){
    if($jenjang == "1"){
        echo "Madrasah Ibtidaiyah";
    }elseif($jenjang == "2"){
        echo "Madrasah Tsanawiyah";
    }elseif($jenjang == "3"){
        echo "Madrasah Aliyah";        
    }else{
        echo "Tidak ada Jenjang Sekolah";
    }
}

if(isset($_GET['info'])){
    if($_GET['info'] == "bertambah"){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>Anda berhasil menambahkan data santri baru ...</p>
    <button type="button" onclick="document.location.href = '?page=pendaftaran-santri'" class="btn-close"
        data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }elseif($_GET['info'] == "ubah"){
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>Anda berhasil mengupdate data santri baru ...</p>
    <button type="button" onclick="document.location.href = '?page=pendaftaran-santri'" class="btn-close"
        data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }elseif($_GET['info'] == "hapus"){
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>Anda berhasil menghapus data santri baru ...</p>
    <button type="button" onclick="document.location.href = '?page=pendaftaran-santri'" class="btn-close"
        data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }elseif($_GET['info'] == "gagal"){
?>
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>Anda gagal menambahkan/mengupdate/menghapus data santri baru ...</p>
    <button type="button" onclick="document.location.href = '?page=pendaftaran-santri'" class="btn-close"
        data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php   
    }
}
?>