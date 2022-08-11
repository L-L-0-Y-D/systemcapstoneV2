<?php 

/* Getting the current page name. */
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); 


?>

<!--eveything inside the bg image-->
<div id="header-img">
    <div id="header-signup">
        <?php if(empty($_SESSION["auth"])):?>
            <!--For business registration-->
            <p style="padding-top:5px;">Do you need business account?  <span><a href="businessreg.php">REGISTER</a></span>
            <i class="far fa-times-circle" onclick="closeNav()"style="float:right; margin-right:30px;"></i></p>
        <?php endif ?>
        <script>
            function closeNav() {
                document.getElementById("header-signup").style.display = "none";
            }
        </script>
    </div>
  
<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav" style="height:80px; background-color:rgb(255,128,64);">
        <div class="container">
            <a class="navbar-brand" href="#page-top" style="color: white;font-size: 28px;">
            <span><img src="uploads/logoT.png" usemap=#workmap style="width: 50px;">&nbsp;</span>
                        <map name="workmap">
                            <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                        </map>I - Eat</a>
            <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" href="index.php" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: gray;"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive" style="padding-left:10px;background-color:rgb(255,128,64);" >
                <ul class="navbar-nav ms-auto text-uppercase" >
                
                <?php if(empty($_SESSION["auth"]))
                {// if user is not login
                ?>
                    <li class="nav-item"><a class="nav-link" href="#page-top" active>HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">LOCATIONS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">SIGNUP</a></li>
                <?php 
                }
                 elseif(isset($_SESSION['auth']))
                {
                    if($_SESSION['auth_user']['role_as'] == "0")
                    {
                    ?>   
                    <li class="nav-item">
                        <h2 class="text-white text-capitalize" style="font-size:25px;"> Welcome 
                        <strong><?= $_SESSION['auth_user']['name'];?></strong>!&nbsp;</h2>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
                            <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profile.php?id=<?= $_SESSION['auth_user']['userid'];?>"style="font-size:16px; text-align:left;"><i class="far fa-user"></i>&nbsp;Profile</a>
                                    <a class="dropdown-item" href="your_reservation.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="far fa-calendar alt"></i>&nbsp;Reservations</a>
                                    <a class="dropdown-item" href="changepassword.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="far fa-key"></i>&nbsp;Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                                </div>
                        </div>
                    </li>                   
                <?php
                }
                else if($_SESSION['auth_user']['role_as'] == "2")
                {
                    ?>
                    <li class="nav-item">
                        <h2 class="text-white text-capitalize" style="font-size:25px;"> Welcome
                        <strong><?= $_SESSION['auth_user']['business_name'];?></strong>!&nbsp;</h2>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
                            <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="business/index.php?id=<?= $_SESSION['auth_user']['businessid'];?>"style="font-size:16px; text-align:left;"><i class="fa fa-align-justify"></i>&nbsp;Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                                </div>
                        </div>
                    </li>     
                <?php
                }
                else
                {
                    ?>
                    <li class="nav-item">
                        <h2 class="text-white text-capitalize" style="font-size:25px;"> Welcome 
                        <strong><?= $_SESSION['auth_user']['name'];?></strong> !&nbsp;</h2>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
                            <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="admin/index.php"style="font-size:16px; text-align:left;"><i class="fa fa-align-justify"></i>&nbsp;Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                                </div>
                        </div>
                    </li> 
                <?php 
                }  
                    ?> 
                <?php 
                }
                elseif(isset($_SESSION['busi'])) 
                {
                    ?>
                    <!--if user is login-->
                    <li class="nav-item">
                        <h2 class="text-white text-capitalize" style="font-size:25px;"> Welcome 
                        <strong><?php echo $_SESSION['auth_user']['business_name']; ?></strong> !&nbsp;</h2>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
                            <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="business/admin.php"style="font-size:16px; text-align:left;"><i class="fa fa-align-justify"></i>&nbsp;Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                                </div>
                        </div>
                    </li> 
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>        
    <header class="masthead "  style="padding-top:100px;">
        <div class="container">
            <div class="intro-text" style="color: var(--bs-dark);padding-top: 40px;">
                <div class="intro-lead-in">
                    <span><img src="uploads/logoT.png" style="width: 150px;"></span>
                </div>
                <div class="intro-heading text-uppercase ">
                    <span style="font-family: 'Kaushan Script', serif; font-size:55px;">First we eat,&nbsp; i - eat.</span></div>
                    <form action="search.php" method="POST">
                        <input class="form-control-lg" type="text" name="search" style="border-radius: 20px;border: 2px solid var(--bs-secondary) ;" placeholder="Search Restaurants,Locations,Foods...">
                        <button class="btn btn-primary btn-lg" type="submit" name="submit" style="background: rgb(255,128,64);border-style: none;border-radius: 50px;padding-top: 10px;padding-bottom: 10px;padding-left: 30px;padding-right: 30px;">
                        <i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </header>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</header>
