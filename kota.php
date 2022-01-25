<?php
include "admin/config.php";
?>
    <div class="form__row">
    <div class="label">Kabupaten <b>)* Wajib Di Isi</b> </div>
    <select name="kota" class="form-control" class="input">
<?php
$sql=mysqli_query($koneksi,"select * from kota where id_provinsi = '".$_GET['id']."'");
while($data = mysqli_fetch_array($sql)){
    ?>
        <option value="<?php echo $data['id']; ?>"> <?php echo $data['nama_kota'];?> </option>
  
  <?php
}
?>

</select>
    </div>
