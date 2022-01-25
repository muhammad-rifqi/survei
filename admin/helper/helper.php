<?php
function convert_provinsi($id){
include "config.php";
$sql = mysqli_query($koneksi,"select * from provinsi where id = '".$id."'");
$data = mysqli_fetch_array($sql); 
return $data['nama_provinsi']; 
}

function convert_kota($id){
include "config.php";
$sql = mysqli_query($koneksi,"select * from kota where id = '".$id."'");
$data = mysqli_fetch_array($sql); 
return $data['nama_kota']; 
}

function convert_kecamatan($id){
include "config.php";
$sql = mysqli_query($koneksi,"select * from kecamatan where id = '".$id."'");
$data = mysqli_fetch_array($sql); 
return $data['nama_kecamatan']; 
}

function convert_suku($id){
include "config.php";
$sql = mysqli_query($koneksi,"select * from suku where id = '".$id."'");
$data = mysqli_fetch_array($sql); 
return $data['nama_suku']; 
}

function convert_agama($id){
include "config.php";
$sql = mysqli_query($koneksi,"select * from agama where id = '".$id."'");
$data = mysqli_fetch_array($sql); 
return $data['nama_agama']; 
}

function convert_pertanyaan($id){
include "config.php";
$sql = mysqli_query($koneksi,"select * from pertanyaan where id = '".$id."'");
$data = mysqli_fetch_array($sql); 
return $data['soal']; 
}

function convert_user($id){
include "config.php";
$sql = mysqli_query($koneksi,"select * from user where id = '".$id."'");
$data = mysqli_fetch_array($sql); 
return $data['username']; 
}
?>