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
    <header>
            <div class="nav-menu">
                <?php if(empty($_SESSION["auth"]))
                {// if user is not login
                    ?>
							
                    <button class="loginbtn" onclick="openForm()">Login</button>
                        <div class="form-popup" id="myForm">
                            <form name="form" class="form-container">
                            <i class="fas fa-times-circle" onclick="closeForm()" style="float:right;"></i>
                                <h3>Login as</h3>
                                <button type="submit" class="ownerbtn" onclick="javascript: form.action='ownerlogin.php';" href="ownerlogin.php">Business</button>
                                <button type="submit" class="customerbtn" onclick="javascript: form.action='login.php';" href="login.php">Customer</button>
                            </form>
                        </div>
                        <script>
                        function openForm() {
                            document.getElementById("myForm").style.display = "block";
                        }
                        function closeForm() {
                            document.getElementById("myForm").style.display = "none";
                        }
                        </script>
                    <button class="loginbtn" onclick="location.href='register.php'">Sign Up</button>  
                               
                <?php 
                }
                elseif(isset($_SESSION['auth']))
                {
                        if($_SESSION['auth_user']['role_as'] == "0")
                        {
                        ?>    
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['name'];?></strong>!</h2>
                                <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                            <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                                    <div class="dropdown-menu position-fixed">
                                        <a class="dropdown-item" href="profile.php?id=<?= $_SESSION['auth_user']['userid'];?>"style="font-size:16px; text-align:left;"><i class="far fa-user"></i>&nbsp;Profile</a>
                                        <a class="dropdown-item" href="your_reservation.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="far fa-calendar alt"></i>&nbsp;Reservations</a>
                                        <a class="dropdown-item" href="changepassword.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="far fa-key"></i>&nbsp;Change Password</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                        <?php
                        }
                        else if($_SESSION['auth_user']['role_as'] == "2")
                        {
                            ?>
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['business_name'];?></strong> !</h2>
                            <button class="loginbtn" onclick="location.href='business/index.php?id=<?= $_SESSION['auth_user']['businessid'];?>'">Dashboard</button>
                            <button class="loginbtn" onclick="location.href='logout.php'">Logout</button> 

                         <?php
                        }
                        else
                        {
                            ?>
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['name'];?></strong> !</h2>
                            <button class="loginbtn" onclick="location.href='admin/index.php'">Dashboard</button>
                            <button class="loginbtn" onclick="location.href='logout.php'">Logout</button> 
                            <?php 
                        }
                    
                    ?> 
                    <?php 
                }
                elseif(isset($_SESSION['busi'])) 
                {
                ?>
                    <!--if user is login-->
                    <h2> Welcome <strong><?php echo $_SESSION['auth_user']['business_name']; ?></strong> !</h2>
                    <button class="loginbtn" onclick="location.href='business/admin.php'">Dashboard</button>
                    <button class="loginbtn" onclick="location.href='logout.php'">Logout</button> 
                 
                <?php } ?>
            </div>
            <div class="row d-flex justify-content-end py-5" style=" margin-top:40px;width:90%;">
                <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-end mb-4">
                    <div class="text-center" style="max-width: 450px;">
                        <img src="uploads/logoT.png" alt="LOGO" usemap="#workmap" width="200" height="200">
                            <map name="workmap">
                                <area shape="circle" coords="100,100,200,200" alt="logo" href="index.php">
                            </map>
                        <p class="my-2" style="font-size:20px;">First we eat, I-Eat.</p>
                        <form class="d-flex justify-content-center flex-wrap justify-content-md-start flex-lg-nowrap" action="search.php" method="POST">
                            <div class="my-2 me-2">
                                <input class=" form-control" type="text" name="search" placeholder="Search Restaurant..." style="width:200px;border:solid 1px gray; border-radius:20px;"></div>
                            <div class="my-2">
                                <button class="btn btn-primary shadow" type="submit" name="submit" style="height:38px;  border:none;background: rgb(255,128,64); border-radius:20px;"><i class="far fa-search"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</header>
