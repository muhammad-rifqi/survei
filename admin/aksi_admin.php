<?php
session_start();
include "config.php";
if($_GET['act'] == 'tambah_pertanyaan'){
$nama_file = $_FILES['photo']['name'];
$lokasi_file = $_FILES['photo']['tmp_name'];
if(!empty($lokasi_file)){
move_uploaded_file($lokasi_file,"assets/upload/pertanyaan/$nama_file");
mysqli_query($koneksi,"insert into pertanyaan(soal,a,b,c,d,jawaban,foto,provinsi)values('".$_POST['soal']."','".$_POST['a']."','".$_POST['b']."','".$_POST['c']."','".$_POST['d']."','".$_POST['jawaban']."','".$nama_file."','".$_POST['provinsi']."')");
}else{
mysqli_query($koneksi,"insert into pertanyaan(soal,a,b,c,d,jawaban,provinsi)values('".$_POST['soal']."','".$_POST['a']."','".$_POST['b']."','".$_POST['c']."','".$_POST['d']."','".$_POST['jawaban']."','".$_POST['provinsi']."')");    
}
header('location:dashboard.php?menu=pertanyaan');
}

if($_GET['act'] == 'hapus_pertanyaan'){
mysqli_query($koneksi,"delete from pertanyaan where id = '$_GET[id]'");
header('location:dashboard.php?menu=pertanyaan');
}
    
if($_GET['act'] == 'edit_pertanyaan'){

$nama_file = $_FILES['photo']['name'];
$lokasi_file = $_FILES['photo']['tmp_name'];
if(!empty($lokasi_file)){
move_uploaded_file($lokasi_file,"assets/upload/pertanyaan/$nama_file");
mysqli_query($koneksi,"update pertanyaan set soal='".$_POST['soal']."',a='".$_POST['a']."',b='".$_POST['b']."',c='".$_POST['c']."',d='".$_POST['d']."',jawaban='".$_POST['jawaban']."',foto='".$nama_file."',provinsi='".$_POST['provinsi']."' where id = '".$_POST['id']."'");
}else{
mysqli_query($koneksi,"update pertanyaan set soal='".$_POST['soal']."',a='".$_POST['a']."',b='".$_POST['b']."',c='".$_POST['c']."',d='".$_POST['d']."',jawaban='".$_POST['jawaban']."',provinsi='".$_POST['provinsi']."' where id = '".$_POST['id']."'");
}   
header('location:dashboard.php?menu=pertanyaan');
}

if($_GET['act'] == 'hapus_jawaban'){
mysqli_query($koneksi,"delete from jawaban where id = '$_GET[id]'");
header('location:dashboard.php?menu=jawaban');
}


if($_GET['act'] == 'hapus_pemilih'){
mysqli_query($koneksi,"delete from pemilih where id = '$_GET[id]'");
header('location:dashboard.php?menu=pemilih');
}

if($_GET['act'] == 'tambah_suku'){
mysqli_query($koneksi,"insert into suku(nama_suku)values('".$_POST['nama_suku']."')");
header('location:dashboard.php?menu=msuku');
}

if($_GET['act'] == 'edit_suku'){
mysqli_query($koneksi,"update suku set nama_suku='".$_POST['nama_suku']."' where id = '".$_POST['id']."'");
header('location:dashboard.php?menu=msuku');
}

if($_GET['act'] == 'hapus_suku'){
mysqli_query($koneksi,"delete from suku where id = '$_GET[id]'");
header('location:dashboard.php?menu=msuku');
}

if($_GET['act'] == 'tambah_user'){
mysqli_query($koneksi,"insert into user(username,password,status)values('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['status']."')");
header('location:dashboard.php?menu=muser');
}

if($_GET['act'] == 'hapus_user'){
mysqli_query($koneksi,"delete from user where id = '$_GET[id]'");
header('location:dashboard.php?menu=muser');
}

if($_GET['act'] == 'edit_user'){
if($_POST['password'] == ""){
    mysqli_query($koneksi,"update user set  username='".$_POST['username']."',status='".$_POST['status']."' where id='".$_POST['id']."'");
}else{
    mysqli_query($koneksi,"update user set  username='".$_POST['username']."',password='".md5($_POST['password'])."',status='".$_POST['status']."' where id='".$_POST['id']."'");
}
header('location:dashboard.php?menu=muser');
}


if($_GET['act'] == 'tambah_agama'){
mysqli_query($koneksi,"insert into agama(nama_agama)values('".$_POST['nama_agama']."')");
header('location:dashboard.php?menu=magama');
}

if($_GET['act'] == 'edit_agama'){
mysqli_query($koneksi,"update agama set nama_agama='".$_POST['nama_agama']."' where id = '".$_POST['id']."'");
header('location:dashboard.php?menu=magama');
}

if($_GET['act'] == 'hapus_agama'){
mysqli_query($koneksi,"delete from agama where id = '$_GET[id]'");
header('location:dashboard.php?menu=magama');
}


if($_GET['act'] == 'tambah_provinsi'){
mysqli_query($koneksi,"insert into provinsi(nama_provinsi)values('".$_POST['nama_provinsi']."')");
header('location:dashboard.php?menu=mprovinsi');
}

if($_GET['act'] == 'edit_provinsi'){
mysqli_query($koneksi,"update provinsi set nama_provinsi='".$_POST['nama_provinsi']."' where id = '".$_POST['id']."'");
header('location:dashboard.php?menu=mprovinsi');
}

if($_GET['act'] == 'hapus_provinsi'){
mysqli_query($koneksi,"delete from provinsi where id = '$_GET[id]'");
header('location:dashboard.php?menu=mprovinsi');
}


if($_GET['act'] == 'tambah_kabupaten'){
mysqli_query($koneksi,"insert into kota(id_provinsi,nama_kota)values('".$_POST['id_provinsi']."','".$_POST['nama_kota']."')");
header('location:dashboard.php?menu=mkabupaten');
}

if($_GET['act'] == 'edit_kabupaten'){
mysqli_query($koneksi,"update kota set id_provinsi='".$_POST['id_provinsi']."',nama_kota='".$_POST['nama_kota']."' where id = '".$_POST['id']."'");
header('location:dashboard.php?menu=mkabupaten');
}

if($_GET['act'] == 'hapus_kabupaten'){
mysqli_query($koneksi,"delete from kota where id = '$_GET[id]'");
header('location:dashboard.php?menu=mkabupaten');
}


if($_GET['act'] == 'tambah_kecamatan'){
mysqli_query($koneksi,"insert into kecamatan(id_kota,nama_kecamatan)values('".$_POST['id_kota']."','".$_POST['nama_kecamatan']."')");
header('location:dashboard.php?menu=mkecamatan');
}

if($_GET['act'] == 'edit_kecamatan'){
mysqli_query($koneksi,"update kecamatan set id_kota='".$_POST['id_kota']."',nama_kecamatan='".$_POST['nama_kecamatan']."' where id = '".$_POST['id']."'");
header('location:dashboard.php?menu=mkecamatan');
}

if($_GET['act'] == 'hapus_kecamatan'){
mysqli_query($koneksi,"delete from kecamatan where id = '$_GET[id]'");
header('location:dashboard.php?menu=mkecamatan');
}