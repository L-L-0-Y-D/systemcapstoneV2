
<?php 
    /* Getting the current page name. */
  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: rgb(255,128,64);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon"><img class=" img-profile" src="../uploads/I-EatLogo.png" width="80" height="80"></div>
                    <div class="sidebar-brand-text mx-3"><span>I - Eat</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link <?= $page == "../index.php"? 'active':'';  ?>" href="../index.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><i class="fas fa-home"></i><span>Home</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "index.php"? 'active':'';  ?>" href="index.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "reservation.php"? 'active':'';  ?>" href="reservation.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><i class="fas fa-edit"></i><span>Reservation</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "menu.php"? 'active':'';  ?>" href="menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><i class="fas fa-store"></i><span>Menu Management</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="margin-left: 37px;"></button></div>
            </div>
        </nav>