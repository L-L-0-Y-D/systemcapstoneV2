
<?php 
    /* Getting the current page name. */
  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: rgb(255,128,64);">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
        <div class="sidebar-brand-icon"><img class=" img-profile" src="../uploads/logoT.png" width="50" height="50"></div>
            <div class="sidebar-brand-text mx-3"><span>I - Eat</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link <?= $page == "../index.php"? 'active':'';  ?>" href="../index.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><span class="fas fa-home"></span><span>&nbspHome</span></a></li>
                    <li class="nav-item active"><a class="nav-link <?= $page == "index.php"? 'active':'';  ?>" href="index.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><span class="fas fa-bars"></span><span>&nbspDashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "arriving.php"? 'active':'';  ?>" href="arriving.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><span class="fas fa-clock"></span><span>&nbspArriving</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "reservation.php"? 'active':'';  ?>" href="reservation.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><span class="fa fa-clipboard-list"></span><span>&nbspReservation</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "table.php"? 'active':'';  ?>" href="table.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><span class="fas fa-edit"></span><span>&nbspTable Management</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "menu.php"? 'active':'';  ?>" href="menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><span class="fas fa-utensils"></span><span>&nbspMenu Management</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "feedback.php"? 'active':'';  ?>" href="feedback.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><span class="far fa-file-alt"></span><span>&nbspFeedback</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "location.php"? 'active':'';  ?>" href="location.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><span class="fas fa-map-marker"></span><span>&nbspLocation</span></a></li>
                    <li class="nav-item"><a class="nav-link <?= $page == "blockdate.php"? 'active':'';  ?>" href="blockdate.php?id=<?= $_SESSION['auth_user']['businessid'];?>"><span class="fas fa-calendar-times"></span><span>&nbspBlock Date</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="margin-left: 37px;"></button></div>
            </div>
        </nav>
        