<?php
error_reporting(0);
session_start();
include"config.php";
if(empty($_SESSION['id_user'])){
	echo "
	<h1 align='center'>Maaf Sesi Anda Sudah Habis </h1>
	<p align='center'> <a href='index.php'>silahkan login kembali</a>  </p>
	";
}else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Aplikasi Survei </title>
    <link href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"
        rel="stylesheet">
    <link href="assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <?php include "nav.php";?>

        <div id="page-wrapper">

            <?php  include "isi.php"; ?>

        </div>
    </div>

    <script src="https://libs.baidu.com/jquery/1.11.1/jquery.js"></script>
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/bower_components/sammy/lib/min/sammy-latest.min.js"></script>
    <script src="assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="assets/dist/js/sb-admin-2.js"></script>

    <script src="assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    $(function() {
        $('#kalkulasi').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#pengguna').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#jawaban').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#pertanyaan').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#suku').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#agama').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#user').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#provinsi').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#kabupaten').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#kecamatan').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
<?php } ?>