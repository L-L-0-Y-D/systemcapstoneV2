<?php 
  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: rgb(255,128,64);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-1" href="#">
                    <div class="sidebar-brand-icon"><img class=" img-profile" src="../uploads/I-EatLogo.png" width="80" height="80"></div>
                    <div class="sidebar-brand-text mx-1"><span>I - Eat</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link <?= $page == "../undex.php"? 'active':'';  ?>" href="../index.php"><i class="fas fa-home"></i><span class="align-middle">Home</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "index.php"? 'active':'';  ?>" href="index.php"><i class="fas fa-tachometer-alt"></i><span class="align-middle">Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "busiowner.php"? 'active':'';  ?>" href="busiowner.php"><i class="fas fa-handshake"></i><span class="align-middle">Business Owners</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "customers.php"? 'active':'';  ?>" href="customers.php"><i class="fas fa-user-friends"></i><span class="align-middle">Customers</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "category.php"? 'active':'';  ?>" href="category.php"><i class="fas fa-bookmark"></i><span class="align-middle">Category</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "municipality.php"? 'active':'';  ?>" href="municipality.php"><i class="fas fa-map-marker"></i><span class="align-middle">Municipality</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "menu.php"? 'active':'';  ?>" href="menu.php"><i class="fas fa-map-marker"></i><span class="align-middle">Menu</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "reservation.php"? 'active':'';  ?>" href="reservation.php"><i class="fas fa-map-marker"></i><span class="align-middle">Reservation</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"></div><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="margin-left: 35px;"></button>
            </div>
        </nav>