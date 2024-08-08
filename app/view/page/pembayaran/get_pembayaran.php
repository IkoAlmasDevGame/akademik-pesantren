<?php 
require_once("../../../database/koneksi.php");
$tamp = htmlspecialchars($_POST["tamp"]);
$pecah_bar = explode(".", $tamp);
$kode_bar = $pecah_bar[0];

$sql = "SELECT * FROM spp where id_spp = '$kode_bar'";
$data = $konfigs->query($sql);
    while($isi = mysqli_fetch_assoc($data)) {
?>
<label for="">Nominal Pembayaran</label>
<div class="form-group">
    <div class="form-line">
        <input type="hidden" name="id_spp" value="<?=$isi['id_spp']?>">
        <input readonly="readonly" id="jumlah_bayar" name="jumlah_bayar" type="text" class="form-control"
            value="<?php echo $isi["nominal"];?>">
        </input>
    </div>
</div>
<?php
}
?>