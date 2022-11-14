 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
     <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#"> <img src="assets/img/logo.png" width="11%"></a>
     </div>

     <ul class="nav navbar-top-links navbar-right">
         <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">&nbsp;
                 <?php echo strtoupper($_SESSION['username']); ?> &nbsp;
                 <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
             </a>
             <ul class="dropdown-menu dropdown-user">
                 <li class="divider"></li>
                 <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                 </li>
             </ul>
         </li>
     </ul>


     <div class="navbar-default sidebar" role="navigation">
         <div class="sidebar-nav navbar-collapse">
             <ul class="nav" id="side-menu">
                 <li class="sidebar-search">
                     <div class="input-group custom-search-form">
                         <input type="text" class="form-control" placeholder="Search...">
                         <span class="input-group-btn">
                             <button class="btn btn-default" type="button">
                                 <i class="fa fa-search"></i>
                             </button>
                         </span>
                     </div>
                 </li>
                 <?php 
                if($_SESSION['status'] == 'admin'){
                ?>
                 <li>
                     <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                 </li>
                 <li>
                     <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Kalkulasi<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li>
                             <a href="?menu=suku">Pemilih Suku</a>
                         </li>
                         <li>
                             <a href="?menu=agama"> Pemilih Agama </a>
                         </li>
                         <li>
                             <a href="?menu=umur"> Pemilih Berdasarkan Umur </a>
                         </li>
                         <li>
                             <a href="?menu=pekerjaan"> Pemilih Berdasarkan Pekerjaan </a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a href="?menu=pemilih"><i class="fa fa-user fa-fw"></i> Pemilih </a>
                 </li>
                 <li>
                     <a href="?menu=jawaban"><i class="fa fa-book fa-fw"></i> Jawaban </a>
                 </li>
                 <li>
                     <a href="?menu=pertanyaan"><i class="fa fa-pencil fa-fw"></i> Pertanyaan </a>
                 </li>
                 <li>
                     <a href="#"><i class="fa fa-database fa-fw"></i> Master <span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li>
                             <a href="?menu=msuku"><i class="fa fa-database fa-fw"></i> Master Suku </a>
                         </li>
                         <li>
                             <a href="?menu=magama"><i class="fa fa-database fa-fw"></i> Master Agama </a>
                         </li>
                         <li>
                             <a href="?menu=mprovinsi"><i class="fa fa-database fa-fw"></i> Master Provinsi </a>
                         </li>
                         <li>
                             <a href="?menu=mkabupaten"><i class="fa fa-database fa-fw"></i> Master Kabupaten/Kota </a>
                         </li>
                         <li>
                             <a href="?menu=mkecamatan"><i class="fa fa-database fa-fw"></i> Master Kecamatan </a>
                         </li>
                         <li>
                             <a href="?menu=muser"><i class="fa fa-database fa-fw"></i> Master Pengelola </a>
                         </li>
                     </ul>
                 </li>
                 <?php
                }else{
                ?>
                 <li>
                     <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                 </li>
                 <li>
                     <a href="?menu=pemilih"><i class="fa fa-user fa-fw"></i> Pemilih </a>
                 </li>
                 <li>
                     <a href="?menu=jawaban"><i class="fa fa-book fa-fw"></i> Jawaban </a>
                 </li>
                 <li>
                     <a href="?menu=survei"><i class="fa fa-globe fa-fw"></i> Mulai Survei </a>
                 </li>
                 <?php    
                }
                ?>
             </ul>
         </div>
     </div>
 </nav>