<?php 
require_once("../../../database/koneksi.php");
$tamp = htmlspecialchars($_POST["tamp"]);
$pecah_bar = explode(".", $tamp);
$kode_bar = $pecah_bar[0];

$sql = "SELECT reg_kelas.*, santri.id_santri, santri.nama_santri, santri.nisn_santri, santri.status, kelas.id_kelas, kelas.nama_kelas FROM reg_kelas 
left join santri on reg_kelas.id_santri = santri.id_santri left join kelas on kelas.id_kelas = reg_kelas.id_kelas where santri.nisn_santri = '$kode_bar' && santri.status = '1'";
$data = $konfigs->query($sql);
    while($row = mysqli_fetch_array($data)) {
?>
<label for="">Nisn Santri</label>
<input type="hidden" name="id_santri" value="<?php echo $row['id_santri']?>">
<div class="form-group">
    <div class="form-line">
        <input readonly="readonly" id="nisn_santri" name="nisn_santri" type="text" class="form-control"
            value="<?php echo $row["nisn_santri"];?>">
        </input>
    </div>
</div>
<label for="">Nama Santri</label>
<div class="form-group">
    <div class="form-line">
        <input readonly="readonly" id="nama_santri" name="nama_santri" type="text" class="form-control"
            value="<?php echo $row["nama_santri"];?>">
        </input>
    </div>
</div>
<label for="">Kelas</label>
<div class="form-group">
    <div class="form-line">
        <input type="hidden" name="id_kelas" value="<?php echo $row['id_kelas']?>">
        <input readonly="readonly" id="id_kelas" name="" type="text" class="form-control"
            value="<?php echo $row["nama_kelas"];?>">
        </input>
    </div>
</div>
<?php
}
?>