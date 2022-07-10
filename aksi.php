<?php
session_start();
include "admin/config.php";

if($_GET['act'] == 'input_jawaban'){

$jumlah = $_POST['n'];
for($i=1;$i<=$jumlah;$i++){
    mysqli_query($koneksi,"insert into jawaban(id_user,id_pemilih,id_pertanyaan,jawaban,point,benar)values('".$_POST['id_user']."','".$_POST['id_pemilih']."','".$_POST['id_pertanyaan'.$i]."','".$_POST['jawaban'.$i]."','0','".$_POST['benar'.$i]."')");
}
session_regenerate_id();
header('location:selesai.php');
}

?>
