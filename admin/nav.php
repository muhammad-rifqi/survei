 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
     <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#"> App Survei </a>
     </div>

     <ul class="nav navbar-top-links navbar-right">
         <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">&nbsp; <?php echo strtoupper($_SESSION['username']); ?> &nbsp;
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
                 <li>
                     <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                 </li>
                 <li>
                     <a href="?menu=kalkulasi"><i class="fa fa-bar-chart-o fa-fw"></i> Kalkulasi </a>
                 </li>
                 <li>
                     <a href="?menu=pengguna"><i class="fa fa-user fa-fw"></i> Pengguna </a>
                 </li>
                 <li>
                     <a href="?menu=jawaban"><i class="fa fa-book fa-fw"></i> Jawaban </a>
                 </li>
                 <li>
                     <a href="?menu=pertanyaan"><i class="fa fa-pencil fa-fw"></i> Pertanyaan </a>
                 </li>

             </ul>
         </div>
     </div>
 </nav>