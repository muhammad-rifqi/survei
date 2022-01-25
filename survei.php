<?php 
session_start();
include "admin/config.php";
?>
<html>

<head>
    <title> App Form Survei </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    window.addEventListener('load', (e) => {
        getLocation();
    });

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {

        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        localStorage.setItem("latitude", latitude);
        localStorage.setItem("longitude", longitude);
    }

    console.log(localStorage.getItem("latitude"));
    console.log(localStorage.getItem("longitude"));

    function showProp(idp) {
        if (idp == "") {
            alert('please choose data!');
            return false;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("kota").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "kota.php?id=" + idp, true);
            xmlhttp.send();
        }
    }

    function showKecamatan(idk) {
        if (idk == "") {
            alert('please choose data!');
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("kecamatan").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "kecamatan.php?id=" + idk, true);
            xmlhttp.send();
        }
    }


    function simpanpengguna() {

        var ktp = document.getElementById("no_ktp").value;
        var nama = document.getElementById("nama").value;
        var email = document.getElementById("email").value;
        var suku = document.getElementById("suku").value;
        var agama = document.getElementById("agama").value;
        var provinsi = document.getElementById("provinsi").value;
        var kota = document.getElementById("kota").value;
        var kecamatan = document.getElementById("kecamatan").value;
        var umur = document.getElementById("umur").value;
        var alamat = document.getElementById("alamat").value;
        var files = document.getElementById("foto").files[0];
        var aksi = 'user';
        var lat = localStorage.getItem("latitude");
        var long = localStorage.getItem("longitude");

        var hr = new XMLHttpRequest();
        var url = "ajax.php";

        if (nama == "" || email == "" || files == "") {

            swal({
                title: "Field Is Required",
                text: "Failed",
                icon: "error",
            }).then(function() {
                window.location = "survei.php";
            });

        } else {

            var formdata = new FormData();
            formdata.append("ktp", ktp);
            formdata.append("nama", nama);
            formdata.append("email", email);
            formdata.append("suku", suku);
            formdata.append("agama", agama);
            formdata.append("provinsi", provinsi);
            formdata.append("kota", kota);
            formdata.append("kecamatan", kecamatan);
            formdata.append("umur", umur);
            formdata.append("alamat", alamat);
            formdata.append("foto", files);
            formdata.append("aksi", aksi);
            formdata.append("lat", lat);
            formdata.append("long", long);

            //var vars = "nama=" + name + "&email=" + email + "&alamat=" + alamat + "&aksi=" + aksi;
            hr.open("POST", url, true);
            //hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            hr.onreadystatechange = function() {
                if (hr.readyState == 4 && hr.status == 200) {
                    var return_data = JSON.parse(hr.responseText);

                    if (return_data.success == true) {
                        swal({
                            title: "Thanks For Submitted!",
                            text: "success",
                            icon: "success",
                        }).then(function() {
                            localStorage.removeItem("latitude");
                            localStorage.removeItem("longitude");
                            window.location = "survei.php?id=" + return_data.data.id + "&token=" +
                                return_data.data.token;

                        });
                    } else {
                        swal({
                            title: "Submitted Failed",
                            text: return_data.success,
                            icon: "error",
                        }).then(function() {
                            window.location = "survei.php";
                        });
                    }
                }
            }
            hr.send(formdata);
            document.getElementById("status").innerHTML = "processing...";
        }
    }
    </script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#006699">
        <div class="container">
            <a class="navbar-brand" href="#">App Survei</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="#"><?php echo $_SESSION['username']; ?> / <?php echo $_SESSION['status']; ?></a></li>
                </ul>
            </div>
        </div>
    </nav>


    <?php 
        if(isset($_GET['id']) == "" && isset($_GET['token']) == ""){
    ?>

    <form enctype="multipart/form-data" onsubmit="simpanpengguna(); return false;">
        <div class="form">
            <div class="form__title">
                <h1 class="title">Form Pemilih</h1>
            </div>
            <div class="form__row">
                <div class="label">No KTP <b>)* Sesuai KTP</b></div>
                <input type="text" id="no_ktp" class="form-control" placeholder="Masukan No KTP" class="input" required>
            </div>
            <div class="form__row">
                <div class="label">Nama <b>)* Sesuai KTP</b></div>
                <input type="text" id="nama" class="form-control" placeholder="Masukan Nama" class="input" required>
            </div>
            <div class="form__row">
                <div class="label">Email <b>)* Yang Aktif</b> </div>
                <input type="email" id="email" class="form-control" placeholder="Masukan Email" class="input" required>
            </div>
            <div class="form__row">
                <div class="label">Suku <b>)* Wajib Di Isi</b> </div>
                <select id="suku" class="form-control" class="input" required>
                    <option value="">Pilih Suku</option>
                    <?php
                    $sql = mysqli_query($koneksi,"select * from suku");
                    while($data = mysqli_fetch_array($sql)){
                        echo"<option value='$data[id]'>$data[nama_suku]</option>";
                    } 
                ?>
                </select>
            </div>
            <div class="form__row">
                <div class="label">Agama <b>)* Sesuai KTP</b> </div>
                <select id="agama" class="form-control" class="input" required>
                    <option value="">Pilih Agama</option>
                    <?php
                    $sql2 = mysqli_query($koneksi,"select * from agama");
                    while($data2 = mysqli_fetch_array($sql2)){
                        echo"<option value='$data2[id]'>$data2[nama_agama]</option>";
                    } 
                ?>
                </select>
            </div>
            <div class="form__row">
                <div class="label">Provinsi <b>)* Wajib Di Isi</b> </div>
                <select id="provinsi" class="form-control" class="input" onchange="showProp(this.value)">
                    <option value="">Pilih Provinsi</option>
                    <?php
                    $sql3 = mysqli_query($koneksi,"select * from provinsi");
                    while($data3 = mysqli_fetch_array($sql3)){
                        echo"<option value='$data3[id]'>$data3[nama_provinsi]</option>";
                    } 
                    ?>
                </select>
            </div>
            <div class="form__row">
                <div class="label">Kabupaten/Kota <b>)* Wajib Di Isi</b> </div>
                <select id="kota" class="form-control" class="input" onchange="showKecamatan(this.value)">
                    <option value="">Pilih Kabupaten/Kota</option>
                </select>
            </div>
            <div class="form__row">
                <div class="label">Kecamatan <b>)* Wajib Di Isi</b> </div>
                <select id="kecamatan" class="form-control" class="input" required>
                    <option value="">Pilih Kecamatan</option>
                </select>
            </div>
            <div class="form__row">
                <div class="label">Umur <b>)* Wajib Di Isi</b> </div>
                <input type="number" id="umur" class="form-control" class="input" required>
            </div>
            <div class="form__row">
                <div class="label">Tambahkan Keterangan Alamat <b>)* Wajib Di Isi</b> </div>
                <input type="text" id="alamat" class="form-control" placeholder="Masukan Alamat" class="input" required>
            </div>
            <div class="form__row">
                <div class="label">Foto <b>)* Wajib Diisi</b> </div>
                <input type="file" id="foto" class="form-control" accept="image/*" class="input" required>
            </div>
            <button class="btn btn-primary ml2 db" type="submit">Simpan Pemilih</button>
            <br><br>
            <h4 id="status" align="center" style="color:silver"></h4>
        </div>
    </form>

    <?php } ?>

    <?php 
        if(isset($_GET['id']) != "" && isset($_GET['token']) != ""){
    ?>

    <div class="form">
        <div class="form__title">
            <h1 class="title">Form Isian</h1>
        </div>
        <form method="POST" action="aksi.php?act=input_jawaban">
            <input type="hidden" name="id_user" value="<?php echo $_GET['id'];?>">
            <?php
        $no=1;
        $q = mysqli_query($koneksi,"select * from pertanyaan");
        while($d = mysqli_fetch_array($q)){
        ?>
            <input type="hidden" name="id_pertanyaan<?php echo $no;?>" value="<?php echo $d['id']; ?>">
            <input type="hidden" name="benar<?php echo $no;?>" value="<?php echo $d['jawaban']; ?>">
            <div class="form__row">
                <div class="label"><?php echo $d['soal']; ?> ?? <b>)* Wajib di-Isi</b> </div>
                <?php
                if($d['a'] != ""){
                    $a = "<input type='radio' name='jawaban$no' value='A' class='input'
                    required>&nbsp;$d[a]";
                }else{
                    $a="";
                }

                if($d['b'] != ""){
                    $b = "<input type='radio' name='jawaban$no' value='B' class='input'
                    required>&nbsp;$d[b]";
                }else{
                    $b="";
                }

                if($d['c'] != ""){
                    $c = "<input type='radio' name='jawaban$no' value='C' class='input'
                    required>&nbsp;$d[c]";
                }else{
                    $c="";
                }

                if($d['d'] != ""){
                    $d = "<input type='radio' name='jawaban$no' value='D' class='input'
                    required>&nbsp;$d[d]";
                }else{
                    $d="";
                }

                ?>

                &nbsp; &nbsp; <?php echo $a; ?>
                &nbsp;

                &nbsp; &nbsp; <?php echo $b; ?>
                &nbsp;

                &nbsp;&nbsp;<?php echo $c; ?>
                &nbsp;

                &nbsp;&nbsp;<?php echo $d; ?>
                &nbsp;


            </div>
            <?php 
       $no++;}
        ?>
            <input type="hidden" name="n" value="<?php echo $no-1; ?>">
            <input type="submit" class="btn btn-primary ml2 db" value="Simpan Isian">
        </form>
    </div>

    <?php } ?>

</body>



</html>