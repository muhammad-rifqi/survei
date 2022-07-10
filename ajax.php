<?php
session_start();
include "admin/config.php";
if($_POST['aksi'] == 'user'){

$check = mysqli_num_rows(mysqli_query($koneksi,"select email from pemilih where email = '".$_POST['email']."'"));
if($check > 0){

$response = array(
    "success"=>"User Sudah Ada",
    "data"=>null
);
echo json_encode($response);

}else{
$nama_file = $_FILES['foto']['name'];
$lokasi_file = $_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi_file,"admin/assets/upload/$nama_file");
$sql=mysqli_query($koneksi,"insert into pemilih(no_ktp,nama,email,suku, agama, provinsi, kota, kecamatan, umur, pekerjaan, alamat, foto,token, latitude, longitude,id_user)values('".$_POST['ktp']."','".$_POST['nama']."','".$_POST['email']."','".$_POST['suku']."','".$_POST['agama']."','".$_POST['provinsi']."','".$_POST['kota']."','".$_POST['kecamatan']."','".$_POST['umur']."','".strtolower(str_replace(" ","",$_POST['pekerjaan']))."','".$_POST['alamat']."','".$nama_file."','".session_id()."','".$_POST['lat']."','".$_POST['long']."','".$_SESSION['id_user']."')");
if($sql){
    $id = mysqli_insert_id($koneksi);
    $row = mysqli_fetch_assoc(mysqli_query($koneksi,"select * from pemilih where id = '".$id."'"));
    $response = array(
        "success"=>true,
        "data"=>$row
    );
}else{
    $response = array(
        "success"=>false,
        "data"=>null
    );
}

echo json_encode($response);

}
   



}