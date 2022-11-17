<?php

include "config.php";
include "helper/helper.php";

if($_GET['menu'] == ''){

echo"<h1> Selamat Datang ".$_SESSION['username']." </h1>
    <p> Silahkan Untuk Mengelola Module Di samping </p>
    <p>Akses Login : ".$_SERVER['HTTP_USER_AGENT']."</p>    
";

}
if($_GET['menu'] == 'suku'){
    $sql = mysqli_query($koneksi,"select suku.nama_suku,suku.id,pemilih.suku,count(pemilih.suku) as pemilih_suku from suku left join pemilih on suku.id = pemilih.suku group by suku.id");
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kalkulasi Berdasarkan Suku</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pemilih Berdasarkan Suku
            </div>

            <canvas id="sk" style="width:100%;"></canvas>

            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="suku">
                            <thead>
                                <tr>

                                    <th>Nama Suku</th>
                                    <th>Pemilih Suku</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $np = array();
                            $ns = array();    
                            while($data = mysqli_fetch_array($sql)){    
                            $np[] = $data['pemilih_suku'];
                            $ns[] = $data['nama_suku'];                        
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['nama_suku']; ?></td>
                                    <td><?php echo $data['pemilih_suku']; ?></td>

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
</div>
<script>
    var xValues = <?php echo json_encode($ns,true);?>;
    var yValues = <?php echo json_encode($np,true);?>;
    var barColors = "blue";

    new Chart("sk", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Data Pemilih Berdasarkan Suku"
            }
        }
    });
    </script>

<?php 
}if($_GET['menu'] == 'agama'){
    $sql = mysqli_query($koneksi,"select agama.nama_agama,agama.id,pemilih.agama,count(pemilih.agama) as pemilih_agama from agama left join pemilih on agama.id = pemilih.agama group by agama.id");
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kalkulasi Berdasarkan Agama</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pemilih Berdasarkan Agama
            </div>

            <canvas id="ag" style="width:100%;"></canvas>


            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="agama">
                            <thead>
                                <tr>

                                    <th>Nama Agama</th>
                                    <th>Pemilih Agama</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $na = array();
                            $npa = array();
                            while($data = mysqli_fetch_array($sql)){    
                            $na[] = $data['nama_agama'];
                            $npa[] = $data['pemilih_agama'];                        
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['nama_agama']; ?></td>
                                    <td><?php echo $data['pemilih_agama']; ?></td>

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
</div>

<script>
    var xValues = <?php echo json_encode($na,true);?>;
    var yValues = <?php echo json_encode($npa,true);?>;
    var barColors = "yellow";

    new Chart("ag", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Data Pemilih Berdasarkan Agama"
            }
        }
    });
    </script>

<?php 
}if($_GET['menu'] == 'pekerjaan'){
    $sql = mysqli_query($koneksi,"select *,count(pemilih.pekerjaan) as pemilih_pekerjaan from pemilih group by pekerjaan");
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kalkulasi Berdasarkan Pekerjaan</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pemilih Berdasarkan Pekerjaan
            </div>

            <canvas id="pp" style="width:100%;"></canvas>
            
            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="pekerjaan">
                            <thead>
                                <tr>

                                    <th>Nama Pekerjaan</th>
                                    <th>Pemilih Pekerjaan</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $p = array();
                            $pp = array();
                            while($data = mysqli_fetch_array($sql)){                            
                            $p[] = $data['pekerjaan'];
                            $pp[] = $data['pemilih_pekerjaan'];
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['pekerjaan']; ?></td>
                                    <td><?php echo $data['pemilih_pekerjaan']; ?></td>

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
</div>

<script>
    var xValues = <?php echo json_encode($p,true);?>;
    var yValues = <?php echo json_encode($pp,true);?>;
    var barColors = "red";

    new Chart("pp", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Data Pemilih Berdasarkan Pekerjaan"
            }
        }
    });
    </script>


<?php 
}if($_GET['menu'] == 'umur'){
    $data1 = mysqli_fetch_array(mysqli_query($koneksi,"select count(pemilih.umur) as pemilih_umur1 from pemilih where umur < 25"));
    $data2 = mysqli_fetch_array(mysqli_query($koneksi,"select count(pemilih.umur) as pemilih_umur2 from pemilih where umur between 25 and 40"));
    $data3 = mysqli_fetch_array(mysqli_query($koneksi,"select count(pemilih.umur) as pemilih_umur3 from pemilih where umur > 40"));
    $a = array("<25" => $data1['pemilih_umur1'],"25<>40" => $data2['pemilih_umur2'],">40" => $data3['pemilih_umur3']);
    $b = array();
    array_push($b,$data1['pemilih_umur1'],$data2['pemilih_umur2'],$data3['pemilih_umur3']);
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kalkulasi Berdasarkan Umur</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pemilih Berdasarkan Umur
            </div>

            <canvas id="um" style="width:100%;"></canvas>

            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="pekerjaan">
                            <thead>
                                <tr>

                                    <th>< 25</th>
                                    <th>25 <> 40</th>
                                    <th>> 40</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td><?php echo $a['<25'];?></td>
                                    <td><?php echo $a['25<>40'];?></td>
                                    <td><?php echo $a['>40'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var xValues = ["> 25","25 <> 40","> 40"];
    var yValues = <?php echo json_encode($b,true);?>;
    var barColors = "green";

    new Chart("um", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Data Pemilih Berdasarkan Umur"
            }
        }
    });
    </script>


<?php
}if($_GET['menu'] == 'pemilih'){
if($_SESSION['status'] == 'admin'){
    $sql = mysqli_query($koneksi,"select * from pemilih");
}else{
    $sql = mysqli_query($koneksi,"select * from pemilih where id_user = '".$_SESSION['id_user']."'");
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pemilih</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pemilih
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="pengguna">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> Surveyor </th>
                                    <th>Nama Pemilih</th>
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
                                    <td><?php echo convert_user($data['id_user']); ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td class="center">
                                        <a href="aksi_admin.php?act=hapus_pemilih&id=<?php echo $data['id'];?>"
                                            class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
                                        <a href="?menu=detail_pemilih&id=<?php echo $data['id'];?>"
                                            class="btn btn-primary"><i class="fa fa-eye fa-fw"></i></a>
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
</div>


<?php
}if($_GET['menu'] == 'detail_pemilih'){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from pemilih where id = '".$_GET['id']."'"));
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css"
    type="text/css">
<style>
.map {
    height: 300px;
    width: 400px;
}
</style>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Detail Pemilih </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Pemilih
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="soal">Nama</label>
                    <input type="text" class="form-control" value="<?php echo $data['nama'];?>" disabled>
                </div>
                <div class="form-group">
                    <label for="a">Email</label>
                    <input type="text" class="form-control" value="<?php echo $data['email'];?>" disabled>
                </div>
                <div class="form-group">
                    <label for="a">Suku</label>
                    <input type="text" class="form-control" value="<?php echo convert_suku($data['suku']);?>" disabled>
                </div>
                <div class="form-group">
                    <label for="a">Agama</label>
                    <input type="text" class="form-control" value="<?php echo convert_agama($data['agama']);?>"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="a">Provinsi</label>
                    <input type="text" class="form-control" value="<?php echo convert_provinsi($data['provinsi']);?>"
                        disabled>
                </div>

                <div class="form-group">
                    <label for="a">Kota</label>
                    <input type="text" class="form-control" value="<?php echo convert_kota($data['kota']);?>" disabled>
                </div>

                <div class="form-group">
                    <label for="a">Kecamatan</label>
                    <input type="text" class="form-control" value="<?php echo convert_kecamatan($data['kecamatan']);?>"
                        disabled>
                </div>

                <div class="form-group">
                    <label for="a">Umur</label>
                    <input type="text" class="form-control" value="<?php echo $data['umur'];?>" disabled>
                </div>

                <div class="form-group">
                    <label for="a">Alamat</label>
                    <input type="text" class="form-control" value="<?php echo $data['alamat'];?>" disabled>
                </div>

                <div class="form-group">
                    <label for="a">Photo</label><br><br>
                    <img src="assets/upload/<?php echo $data['foto']?>" width="100">
                </div>


                <div class="form-group">
                    <label for="a">Lokasi Penginputan Data</label><br><br>
                    <div id="map" class="map"></div>
                </div>


            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var map = new ol.Map({
    target: 'map',
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        })
    ],
    view: new ol.View({
        center: ol.proj.fromLonLat([<?= $data['longitude'];?>, <?= $data['latitude'];?>]),
        zoom: 15,
        maxZoom: 18,
        constrainOnlyCenter: true,
    })
});
</script>



<?php    
}if($_GET['menu'] == 'jawaban'){
    if($_SESSION['status'] == 'admin'){
        $sql = mysqli_query($koneksi,"select * from jawaban");
    }else{
        $sql = mysqli_query($koneksi,"select * from jawaban where id_user = '".$_SESSION['id_user']."'");
    }
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
            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="jawaban">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>SURVEYOR</th>
                                    <th>PEMILIH</th>
                                    <th>ID PERTANYAAN</th>
                                    <th>JAWABAN</th>
                                    <th>POINT</th>
                                    <!-- <th>BENAR</th> -->
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['id'];?></td>
                                    <td><?php echo convert_user($data['id_user']);?></td>
                                    <td><?php echo convert_pemilih($data['id_pemilih']);?></td>
                                    <td><?php echo convert_pertanyaan($data['id_pertanyaan']);?></td>
                                    <td class="center"><?php echo $data['jawaban'];?></td>
                                    <td class="center"><?php echo $data['point'];?></td>
                                    <!-- <td class="center"><?//php echo $data['benar'];?></td> -->
                                    <td class="center">
                                        <a href="aksi_admin.php?act=hapus_jawaban&id=<?php echo $data['id']; ?>"
                                            class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
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
            <div class="table-responsive">
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
                                    <th>Foto</th>
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
                                    <td class="center"><img src="assets/upload/pertanyaan/<?php echo $data['foto']; ?>"
                                            width="100"></td>
                                    <td class="center">
                                        <a href="?menu=edit_pertanyaan&id=<?php echo $data['id'];?>"
                                            class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
                                        <a href="aksi_admin.php?act=hapus_pertanyaan&id=<?php echo $data['id'];?>"
                                            class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
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
                <form method="POST" action="aksi_admin.php?act=tambah_pertanyaan" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <select class="form-control" id="provinsi" name="provinsi">
                            <option value="--"> Pilih Provinsi </option>
                            <?php 
                            $q = mysqli_query($koneksi,"select * from provinsi");
                            while($d = mysqli_fetch_array($q)){
                                echo "<option value='".$d['id']."'>".$d['nama_provinsi']."</option>";
                            }
                        ?>
                        </select>
                    </div>
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
                        <input type="text" class="form-control" id="jawaban" name="jawaban"
                            placeholder="jawaban yang benar">
                    </div>
                    <div class="form-group">
                        <label for="a">Photo</label>
                        <input type="file" class="form-control" id="foto" name="photo" placeholder="Masukan Photo"
                            accept="image/*">
                    </div>

                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>


<?php
}if($_GET['menu'] == 'edit_pertanyaan'){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from pertanyaan where id = '".$_GET['id']."'"));
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
                Edit Pertanyaan
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=edit_pertanyaan" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id'];?>">

                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <select class="form-control" id="provinsi" name="provinsi">
                            <option value="--"> Pilih Provinsi </option>
                            <?php 
                            $q = mysqli_query($koneksi,"select * from provinsi");
                            while($d = mysqli_fetch_array($q)){
                                if($d['id'] == $data['provinsi']){
                                    echo "<option value='".$d['id']."' selected>".$d['nama_provinsi']."</option>";
                                }else{
                                    echo "<option value='".$d['id']."'>".$d['nama_provinsi']."</option>";
                                }
                            }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <input type="text" class="form-control" id="soal" name="soal"
                            value="<?php echo $data['soal'];?>" placeholder="Masukan Soal">
                    </div>
                    <div class="form-group">
                        <label for="a">A</label>
                        <input type="text" class="form-control" id="a" name="a" value="<?php echo $data['a'];?>"
                            placeholder="jawaban a">
                    </div>
                    <div class="form-group">
                        <label for="a">B</label>
                        <input type="text" class="form-control" id="b" name="b" value="<?php echo $data['b'];?>"
                            placeholder="jawaban b">
                    </div>
                    <div class="form-group">
                        <label for="a">C</label>
                        <input type="text" class="form-control" id="c" name="c" value="<?php echo $data['c'];?>"
                            placeholder="jawaban c">
                    </div>
                    <div class="form-group">
                        <label for="a">D</label>
                        <input type="text" class="form-control" id="d" name="d" value="<?php echo $data['d'];?>"
                            placeholder="jawaban d">
                    </div>
                    <div class="form-group">
                        <label for="a">Jawaban</label>
                        <input type="text" class="form-control" id="jawaban" name="jawaban"
                            placeholder="jawaban yang benar" value="<?php echo $data['jawaban'];?>">
                    </div>
                    <div class="form-group">
                        <label for="a">Photo</label>
                        <img src="assets/upload/pertanyaan/<?php echo $data['foto']?>" width="100">
                    </div>
                    <div class="form-group">
                        <label for="a">Photo</label>
                        <input type="file" class="form-control" id="foto" name="photo" placeholder="Masukan Photo"
                            accept="image/*">
                    </div>

                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>


<?php } if($_GET['menu'] == 'msuku'){
$sql = mysqli_query($koneksi,"select * from suku");
?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Master Suku</h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <a href="?menu=tambah_suku" class="btn btn-primary"> Tambah </a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Suku
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="suku">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Suku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['nama_suku']; ?></td>
                                    <td class="center">
                                        <a href="?menu=edit_suku&id=<?php echo $data['id'];?>"
                                            class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
                                        <a href="aksi_admin.php?act=hapus_suku&id=<?php echo $data['id'];?>"
                                            class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
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
</div>

<?php
}if($_GET['menu']=='tambah_suku'){
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Suku</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Suku
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=tambah_suku">
                    <div class="form-group">
                        <label for="a">Nama Suku</label>
                        <input type="text" class="form-control" name="nama_suku" placeholder="Masukan Nama Suku">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php
}if($_GET['menu']=='edit_suku'){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from suku where id = '$_GET[id]'"));    
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Suku</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Suku
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=edit_suku">
                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                    <div class="form-group">
                        <label for="a">Nama Suku</label>
                        <input type="text" class="form-control" value="<?php echo $data['nama_suku']?>" name="nama_suku"
                            placeholder="Masukan Nama Suku">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php    
} if($_GET['menu'] == 'magama'){
$sql = mysqli_query($koneksi,"select * from agama");
?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Master Agama</h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <a href="?menu=tambah_agama" class="btn btn-primary"> Tambah </a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Suku
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="agama">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Agama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['nama_agama']; ?></td>
                                    <td class="center">
                                        <a href="?menu=edit_agama&id=<?php echo $data['id'];?>"
                                            class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
                                        <a href="aksi_admin.php?act=hapus_agama&id=<?php echo $data['id'];?>"
                                            class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
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
</div>

<?php
}if($_GET['menu']=='tambah_agama'){
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Agama</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Agama
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=tambah_agama">
                    <div class="form-group">
                        <label for="a">Nama Suku</label>
                        <input type="text" class="form-control" name="nama_agama" placeholder="Masukan Nama Agama">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php
}if($_GET['menu']=='edit_agama'){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from agama where id = '$_GET[id]'"));    
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Agama</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Agama
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=edit_agama">
                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                    <div class="form-group">
                        <label for="a">Nama Agama</label>
                        <input type="text" class="form-control" value="<?php echo $data['nama_agama']?>"
                            name="nama_agama" placeholder="Masukan Nama Agama">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php    
} if($_GET['menu'] == 'mprovinsi'){
$sql = mysqli_query($koneksi,"select * from provinsi");
?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Master Provinsi</h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <a href="?menu=tambah_provinsi" class="btn btn-primary"> Tambah </a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Provinsi
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="provinsi">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Provinsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['nama_provinsi']; ?></td>
                                    <td class="center">
                                        <a href="?menu=edit_provinsi&id=<?php echo $data['id'];?>"
                                            class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
                                        <a href="aksi_admin.php?act=hapus_provinsi&id=<?php echo $data['id'];?>"
                                            class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
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
</div>

<?php
}if($_GET['menu']=='tambah_provinsi'){
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Provinsi</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Provinsi
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=tambah_provinsi">
                    <div class="form-group">
                        <label for="a">Nama Provinsi</label>
                        <input type="text" class="form-control" name="nama_provinsi"
                            placeholder="Masukan Nama provinsi">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php
}if($_GET['menu']=='edit_provinsi'){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from provinsi where id = '$_GET[id]'"));    
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Provinsi</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Provinsi
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=edit_provinsi">
                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                    <div class="form-group">
                        <label for="a">Nama Agama</label>
                        <input type="text" class="form-control" value="<?php echo $data['nama_provinsi']?>"
                            name="nama_provinsi" placeholder="Masukan Nama Provinsi">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php    
}if($_GET['menu'] == 'mkabupaten'){
$sql = mysqli_query($koneksi,"select * from kota");
?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Master Kabupaten</h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <a href="?menu=tambah_kabupaten" class="btn btn-primary"> Tambah </a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Kabupaten/Kota
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="kabupaten">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo convert_provinsi($data['id_provinsi']); ?></td>
                                    <td><?php echo $data['nama_kota']; ?></td>
                                    <td class="center">
                                        <a href="?menu=edit_kabupaten&id=<?php echo $data['id'];?>"
                                            class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
                                        <a href="aksi_admin.php?act=hapus_kabupaten&id=<?php echo $data['id'];?>"
                                            class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
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
</div>

<?php
}if($_GET['menu']=='tambah_kabupaten'){
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Kabupaten</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Kabupaten
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=tambah_kabupaten">
                    <div class="form-group">
                        <label for="a">Provinsi</label>
                        <select class="form-control" name="id_provinsi">
                            <option value="">Pilih Provinsi</option>
                            <?php
                            $sql = mysqli_query($koneksi,"select * from provinsi");
                            while($data = mysqli_fetch_array($sql)){
                                echo"<option value='$data[id]'>$data[nama_provinsi]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="a">Nama Kabupaten/Kota</label>
                        <input type="text" class="form-control" name="nama_kota"
                            placeholder="Masukan Nama Kabupaten/Kota">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php
}if($_GET['menu']=='edit_kabupaten'){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from kota where id = '$_GET[id]'"));    
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Kabupaten</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Kabupaten
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=edit_kabupaten">
                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                    <div class="form-group">
                        <label for="a">Provinsi</label>
                        <select class="form-control" name="id_provinsi">
                            <option value="">Pilih Provinsi</option>
                            <?php
                            $query = mysqli_query($koneksi,"select * from provinsi");
                            while($row = mysqli_fetch_array($query)){
                                if($row['id'] == $data['id']){
                                    echo"<option value='$row[id]' selected>$row[nama_provinsi]</option>";
                                }else{
                                    echo"<option value='$row[id]'>$row[nama_provinsi]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="a">Nama Kabupaten/Kota</label>
                        <input type="text" class="form-control" value="<?php echo $data['nama_kota']?> "
                            name="nama_kota" placeholder="Masukan Nama Kabupaten/Kota">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php    
}if($_GET['menu'] == 'mkecamatan'){
$sql = mysqli_query($koneksi,"select * from kecamatan");
?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Master Kecamatan</h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <a href="?menu=tambah_kecamatan" class="btn btn-primary"> Tambah </a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Kecamatan
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="kecamatan">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kota</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo convert_kota($data['id_kota']); ?></td>
                                    <td><?php echo $data['nama_kecamatan']; ?></td>
                                    <td class="center">
                                        <a href="?menu=edit_kecamatan&id=<?php echo $data['id'];?>"
                                            class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
                                        <a href="aksi_admin.php?act=hapus_kecamatan&id=<?php echo $data['id'];?>"
                                            class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
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
</div>

<?php
}if($_GET['menu']=='tambah_kecamatan'){
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah Kecamatan</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Kecamatan
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=tambah_kecamatan">
                    <div class="form-group">
                        <label for="a">Kota</label>
                        <select class="form-control" name="id_kota">
                            <option value="">Pilih Kota</option>
                            <?php
                            $sql = mysqli_query($koneksi,"select * from kota");
                            while($data = mysqli_fetch_array($sql)){
                                echo"<option value='$data[id]'>$data[nama_kota]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="a">Nama Kecamatan</label>
                        <input type="text" class="form-control" name="nama_kecamatan"
                            placeholder="Masukan Nama Kecamatan">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php
}if($_GET['menu']=='edit_kecamatan'){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from kecamatan where id = '$_GET[id]'"));    
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Kecamatan</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Kabupaten
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=edit_kecamatan">
                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                    <div class="form-group">
                        <label for="a">Kota</label>
                        <select class="form-control" name="id_kota">
                            <option value="">Pilih Kota</option>
                            <?php
                            $query = mysqli_query($koneksi,"select * from kota");
                            while($row = mysqli_fetch_array($query)){
                                if($row['id'] == $data['id_kota']){
                                    echo"<option value='$row[id]' selected>$row[nama_kota]</option>";
                                }else{
                                    echo"<option value='$row[id]'>$row[nama_kota]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="a">Nama Kecamatan</label>
                        <input type="text" class="form-control" value="<?php echo $data['nama_kecamatan']?>"
                            name="nama_kecamatan" placeholder="Masukan Nama Kecamatan">
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php    
}if($_GET['menu'] == 'muser'){
$sql = mysqli_query($koneksi,"select * from user");
?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Master User</h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <a href="?menu=tambah_user" class="btn btn-primary"> Tambah </a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data User
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="user">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            while($data = mysqli_fetch_array($sql)){
                                
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td class="center">
                                        <a href="?menu=edit_user&id=<?php echo $data['id'];?>"
                                            class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i></a>
                                        <a href="aksi_admin.php?act=hapus_user&id=<?php echo $data['id'];?>"
                                            class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
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
</div>

<?php
}if($_GET['menu']=='tambah_user'){
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah User</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah User
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=tambah_user">
                    <div class="form-group">
                        <label for="a">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label for="a">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label for="a">Status</label>
                        <input type="radio" name="status" value="admin" checked>Admin
                        <input type="radio" name="status" value="surveyor">Surveyor
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php
}if($_GET['menu']=='edit_user'){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from user where id = '$_GET[id]'"));    
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit User</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit User
            </div>
            <div class="panel-body">
                <form method="POST" action="aksi_admin.php?act=edit_user">
                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                    <div class="form-group">
                        <label for="a">Username</label>
                        <input type="text" class="form-control" value="<?php echo $data['username']?>" name="username"
                            placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label for="a">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label for="a">Status</label>
                        <?php
                          echo $data['status'] == 'admin' ? "<input type='radio' name='status' value='admin' checked>Admin <input type='radio' name='status' value='surveyor'>Surveyor " : "<input type='radio' name='status' value='admin'>Admin <input type='radio' name='status' value='surveyor' checked>Surveyor";
                        ?>
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>

<?php    
}if($_GET['menu'] == 'survei'){
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Mulai Survei</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Mulai Survei
            </div>
            <div class="panel-body">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <form method="GET" action="../survei.php" target="__blank">
                            <select name="wilayah" class="form-control">
                                <option value="Pilih Wilayah">Pilih Wilayah</option>
                                <?php 
                                    $q = mysqli_query($koneksi,"select * from provinsi");
                                    while($d = mysqli_fetch_array($q)){
                                            echo "<option value='$d[id]'>$d[nama_provinsi]</option>";
                                    }
                                ?>
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary">Mulai Survei</button>
                        </form>
                       
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php    
}
?>