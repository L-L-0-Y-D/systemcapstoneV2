<?php 

/* Getting the current page name. */
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); 


?>
<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top" id="mainNav" style="background: rgb(255,128,64);">
        <div class="container">

                <?php if(empty($_SESSION["auth"]))
                {// if user is not login
                ?>
                <a class="navbar-brand" href="#page-top" style="color: white;font-size: 28px;">
                    <span><img src="uploads/logoT.png" usemap=#workmap style="width: 50px;">&nbsp;</span>
                        <map name="workmap">
                            <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                        </map>I - Eat</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                        <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#portfolio">LOCATIONS</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#contact">CONTACT</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#about">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">SIGNUP</a></li>
                <?php 
                }
                 elseif(isset($_SESSION['auth']))
                {
                    if($_SESSION['auth_user']['role_as'] == "0")
                    {
                    ?>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle text-white fs-4" aria-expanded="false" data-bs-toggle="dropdown">
                        <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                        <div class="dropdown-menu ">
                            <a class="dropdown-item" href="profile.php?id=<?= $_SESSION['auth_user']['userid'];?>"style="font-size:16px; text-align:left;"><i class="fa fa-user"></i>&nbsp;Profile</a>
                            <a class="dropdown-item" href="your_reservation.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="far fa-calendar alt"></i>&nbsp;Reservations</a>
                            <a class="dropdown-item" href="changepassword.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="fas fa-key"></i>&nbsp;Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="fa fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?= $_SESSION['auth_user']['name'];?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#portfolio">LOCATIONS</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#contact">CONTACT</a></li> 
                            <li class="nav-item"><a class="nav-link" href="index.php#about">ABOUT</a></li>               
                <?php
                }
                else if($_SESSION['auth_user']['role_as'] == "2")
                {
                    ?>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle text-white fs-4" aria-expanded="false" data-bs-toggle="dropdown">
                        <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="business/index.php?id=<?= $_SESSION['auth_user']['businessid'];?>"style="font-size:16px; text-align:left;"><i class="fa fa-align-justify"></i>&nbsp;Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?= $_SESSION['auth_user']['business_name'];?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#portfolio">LOCATIONS</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#contact">CONTACT</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#about">ABOUT</a></li>     
                <?php
                }
                else
                {
                    ?>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle text-white fs-4" aria-expanded="false" data-bs-toggle="dropdown">
                        <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="admin/index.php"style="font-size:16px; text-align:left;"><i class="fa fa-align-justify"></i>&nbsp;Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?= $_SESSION['auth_user']['name'];?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#portfolio">LOCATIONS</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#contact">CONTACT</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#about">ABOUT</a></li>    
                <?php 
                }  
                    ?> 
                <?php 
                }
                elseif(isset($_SESSION['busi'])) 
                {
                    ?>
                    <!--if user is login-->
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle text-white fs-4" aria-expanded="false" data-bs-toggle="dropdown">
                        <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="business/admin.php"style="font-size:16px; text-align:left;"><i class="fa fa-align-justify"></i>&nbsp;Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?php echo $_SESSION['auth_user']['business_name']; ?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#portfolio">LOCATIONS</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#contact">CONTACT</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#about">ABOUT</a></li>     
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>        
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>

