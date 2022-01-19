<?php
session_start();
include "admin/config.php";
if($_POST['aksi'] == 'user'){

$check = mysqli_num_rows(mysqli_query($koneksi,"select email from user where email = '".$_POST['email']."'"));
if($check > 0){

$response = array(
    "success"=>"User Sudah Ada",
    "data"=>null
);

}else{

$sql=mysqli_query($koneksi,"insert into user(nama,email,alamat,token)values('".$_POST['nama']."','".$_POST['email']."','".$_POST['alamat']."','".session_id()."')");
if($sql){
    $id = mysqli_insert_id($koneksi);
    $row = mysqli_fetch_assoc(mysqli_query($koneksi,"select * from user where id = '".$id."'"));
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

}
   
echo json_encode($response);


}
