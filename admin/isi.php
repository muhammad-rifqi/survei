<?php

include "config.php";

if($_GET['menu'] == ''){

echo"<h1> Selamat Datang ".$_SESSION['username']." </h1>
    <p> Silahkan Untuk Mengelola Module Di samping </p>
    <p>Akses Login : ".$_SERVER['HTTP_USER_AGENT']."</p>    
";

}
if($_GET['menu'] == 'kalkulasi'){
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kalkulasi</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Kalkulasi
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="kalkulasi">
                        <thead>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX">
                                <td>Trident</td>
                                <td>Internet Explorer 4.0</td>
                                <td>Win 95+</td>
                                <td class="center">4</td>
                                <td class="center">X</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}

if($_GET['menu'] == 'pengguna'){
$sql = mysqli_query($koneksi,"select * from user");

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pengguna</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pengguna
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="pengguna">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td class="center">
                                    <a href="#" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php    
}if($_GET['menu'] == 'jawaban'){
    $sql = mysqli_query($koneksi,"select * from jawaban");
   ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Jawaban</h1>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Jawaban
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="jawaban">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID USER</th>
                                <th>ID PERTANYAAN</th>
                                <th>JAWABAN</th>
                                <th>POINT</th>
                                <th>BENAR</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $data['id'];?></td>
                                <td><?php echo $data['id_user'];?></td>
                                <td><?php echo $data['id_pertanyaan'];?></td>
                                <td class="center"><?php echo $data['jawaban'];?></td>
                                <td class="center"><?php echo $data['point'];?></td>
                                <td class="center"><?php echo $data['benar'];?></td>
                                <td class="center">
                                    <a href="aksi_admin.php?act=hapus_jawaban&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}if($_GET['menu'] == 'pertanyaan'){
$sql = mysqli_query($koneksi,"select * from pertanyaan");
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pertanyaan</h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <a href="?menu=tambah_pertanyaan" class="btn btn-primary"> Tambah </a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pertanyaan
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="pertanyaan">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Soal</th>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>Jawaban</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['soal']; ?></td>
                                <td><?php echo $data['a']; ?></td>
                                <td class="center"><?php echo $data['b']; ?></td>
                                <td class="center"><?php echo $data['c']; ?></td>
                                <td class="center"><?php echo $data['d']; ?></td>
                                <td class="center"><?php echo $data['jawaban']; ?></td>
                                <td class="center">
                                    <a href="#" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
}if($_GET['menu'] == 'tambah_pertanyaan'){
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pertanyaan</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Pertanyaan
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=tambah_pertanyaan">
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <input type="text" class="form-control" id="soal" name="soal" placeholder="Masukan Soal">
                    </div>
                    <div class="form-group">
                        <label for="a">A</label>
                        <input type="text" class="form-control" id="a" name="a" placeholder="jawaban a">
                    </div>
                    <div class="form-group">
                        <label for="a">B</label>
                        <input type="text" class="form-control" id="b" name="b" placeholder="jawaban b">
                    </div>
                    <div class="form-group">
                        <label for="a">C</label>
                        <input type="text" class="form-control" id="c" name="c" placeholder="jawaban c">
                    </div>
                    <div class="form-group">
                        <label for="a">D</label>
                        <input type="text" class="form-control" id="d" name="d" placeholder="jawaban d">
                    </div>
                    <div class="form-group">
                        <label for="a">Jawaban</label>
                        <input type="text" class="form-control" id="jawaban" name="jawaban" placeholder="jawaban yang benar">
                    </div>

            
                        <input type="submit" value="Simpan" class="btn btn-primary">
                
                </form>
            </div>
        </div>
    </div>
</div>




<?php } ?>