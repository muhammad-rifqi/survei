<?php
session_start();
include "admin/config.php";
echo'
    <div class="form__row">
    <div class="label">Kabupaten <b>)* Wajib Di Isi</b> </div>
    <select class="form-control" name="kecamatan" class="input" name="kecamatan">
';
$sql=mysqli_query($koneksi,"select * from kecamatan where id_kota = '".$_GET['id']."'");
while($data = mysqli_fetch_array($sql)){
    echo '
        <option value="'.$data['id'].'">'.$data['nama_kecamatan'].'</option>
    ';
}
echo'
</select>
    </div>
';