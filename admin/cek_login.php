<?php
session_start();
include"config.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$sql = mysqli_query($koneksi,"select * from  user where username = '".$username."' and password  ='".$password."'");
$data = mysqli_fetch_array($sql);
$cek = mysqli_num_rows($sql);
if($cek > 0){
    $_SESSION['id_user'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['status'] = $data['status'];
    $response = "success";
}else{
    $response = "failed";
}
echo $response;
?>