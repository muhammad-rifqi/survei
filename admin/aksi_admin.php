<?php
session_start();
include "config.php";
if($_GET['act'] == 'tambah_pertanyaan'){
mysqli_query($koneksi,"insert into pertanyaan(soal,a,b,c,d,jawaban)values('".$_POST['soal']."','".$_POST['a']."','".$_POST['b']."','".$_POST['c']."','".$_POST['d']."','".$_POST['jawaban']."')");
header('location:dashboard.php?menu=pertanyaan');
}

if($_GET['act'] == 'hapus_jawaban'){
    mysqli_query($koneksi,"delete from jawaban where id = '$_GET[id]'");
    header('location:dashboard.php?menu=jawaban');
    }