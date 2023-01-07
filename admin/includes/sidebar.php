
<?php 
  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: rgb(255,128,64);">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-1" href="#">
        <div class="sidebar-brand-icon"><img class=" img-profile" src="../uploads/logoT.png" width="50" height="50"></div>
            <div class="sidebar-brand-text mx-1"><span>I - Eat</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link <?= $page == "../index.php"? 'active':'';  ?>" href="../index.php"><span class="fas fa-home"></span><span class="align-middle">&nbsp;Home</span></a></li>
                    <li class="nav-item active"><a class="nav-link <?= $page == "index.php"? 'active':'';  ?>" href="index.php"><span class="fas fa-bars"></span><span class="align-middle">&nbsp;Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "busiowner.php"? 'active':'';  ?>" href="busiowner.php"><span class="fas fa-handshake"></span><span class="align-middle">&nbsp;Business Owners</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "customers.php"? 'active':'';  ?>" href="customers.php"><span class="fas fa-user-friends"></span><span class="align-middle">&nbsp;Customers</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "category.php"? 'active':'';  ?>" href="category.php"><span class="fas fa-store"></span><span class="align-middle">&nbsp;Category</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "municipality.php"? 'active':'';  ?>" href="municipality.php"><span class="fas fa-map-marker"></span><span class="align-middle">&nbsp;Municipality</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "menu.php"? 'active':'';  ?>" href="menu.php"><span class="fas fa-utensils"></span><span class="align-middle">&nbsp;Menu</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "reservation.php"? 'active':'';  ?>" href="reservation.php"><span class="fas fa-list"></span><span class="align-middle">&nbsp;Reservations</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "feedback.php"? 'active':'';  ?>" href="feedback.php"><span class="far fa-file-alt"></span><span class="align-middle">&nbsp;Feedbacks</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "map.php"? 'active':'';  ?>" href="map.php"><span class="fas fa-map-marked-alt"></span><span class="align-middle">&nbsp;Map</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="margin-left: 35px;"></button></div>
            </div>
        </nav>