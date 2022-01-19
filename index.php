<?php 
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
    function simpanpengguna() {
        var hr = new XMLHttpRequest();
        var url = "ajax.php";
        var name = document.getElementById("nama").value;
        var email = document.getElementById("email").value;
        var alamat = document.getElementById("alamat").value;
        var aksi = 'user';

        if (name == "" || email == "" || alamat == "") {

            swal({
                title: "Field Is Required",
                text: "Failed",
                icon: "error",
            }).then(function() {
                window.location = "index.php";
            });

        } else {

            var vars = "nama=" + name + "&email=" + email + "&alamat=" + alamat + "&aksi=" + aksi;
            hr.open("POST", url, true);
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            hr.onreadystatechange = function() {
                if (hr.readyState == 4 && hr.status == 200) {
                    var return_data = JSON.parse(hr.responseText);
                    console.log(return_data);
                    if (return_data.success == true) {
                        swal({
                            title: "Thanks For Submitted!",
                            text: "success",
                            icon: "success",
                        }).then(function() {
                            window.location = "index.php?id=" + return_data.data.id + "&token=" +
                                return_data.data.token;
                        });
                    } else {
                        swal({
                            title: "Submitted Failed",
                            text: return_data.success,
                            icon: "error",
                        }).then(function() {
                            window.location = "index.php";
                        });
                    }
                }
            }
            hr.send(vars);
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="admin">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <?php 
        if(isset($_GET['id']) == "" && isset($_GET['token']) == ""){
    ?>


    <div class="form">
        <div class="form__title">
            <h1 class="title">Form Pengguna</h1>
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
            <div class="label">Alamat <b>)* Sesuai KTP</b> </div>
            <input type="text" id="alamat" class="form-control" placeholder="Masukan Alamat" class="input" required>
        </div>
        <a href="#" class="btn btn-primary ml2 db" onclick="simpanpengguna()">Simpan Pengguna</a>
        <br><br>
        <h4 id="status" align="center" style="color:silver"></h4>
    </div>

    <?php } ?>


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

            <div class="form__row">
                <div class="label"><?php echo $d['soal']; ?> ?? <b>)* Wajib di-Isi</b> </div>
                &nbsp;<input type="radio" name="jawaban<?php echo $no;?>" value="A" class="input"
                    required>&nbsp;<?php echo $d['a']; ?>
                &nbsp;
                &nbsp;<input type="radio" name="jawaban<?php echo $no;?>" value="B" class="input"
                    required>&nbsp;<?php echo $d['b']; ?>
                &nbsp;
                &nbsp;<input type="radio" name="jawaban<?php echo $no;?>" value="C" class="input"
                    required>&nbsp;<?php echo $d['c']; ?>
                &nbsp;
                &nbsp;<input type="radio" name="jawaban<?php echo $no;?>" value="D" class="input"
                    required>&nbsp;<?php echo $d['d']; ?>
                &nbsp;
                <input type="hidden" name="id_pertanyaan<?php echo $no;?>" value="<?php echo $d['id']; ?>">
                <input type="hidden" name="benar<?php echo $no;?>" value="<?php echo $d['jawaban']; ?>">

            </div>
            <?php 
       $no++;}
        ?>
            <input type="hidden" name="n" value="<?php echo $no-1; ?>">
            <input type="submit" class="btn btn-primary ml2 db" value="Simpan Isian">
        </form>
    </div>

</body>



</html>