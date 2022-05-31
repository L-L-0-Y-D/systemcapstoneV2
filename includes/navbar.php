<?php 

$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); 

?>
<!--eveything inside the bg image-->
<div id="header-img">
    <div id="header-signup">
        <?php if(empty($_SESSION["auth"])&&empty($_SESSION["business_email"])):?>
            <!--For business registration-->
            <p>Do you need business account?  <span><a href="businessreg.php">REGISTER</a></span></p>
        <?php endif ?>
    </div>
    <header>
            <div class="nav-menu">
                <?php if(empty($_SESSION["auth"])&&empty($_SESSION["business_email"]))
                {// if user is not login
                    ?>
							
                    <button class="loginbtn" onclick="openForm()">Login</button>
                        <div class="form-popup" id="myForm">
                            <form name="form" class="form-container">
                                <h3>Login as</h3>
                                <button type="submit" class="ownerbtn" onclick="javascript: form.action='business/ownerlogin.php';" href="ownerlogin.php">Business</button>
                                <button type="submit" class="customerbtn" onclick="javascript: form.action='login.php';" href="login.php">Customer</button>
                                <button type="submit" class="adminbtn" onclick="javascript: form.action='admin/adminlogin.php';" href="adminlogin.php">Admin</button>
                                <div><button type="button" class="btn cancel" onclick="closeForm()">Close</button></div>
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

                    <a href="register.php">Sign up</a>
                               
                <?php 
                }
                elseif(isset($_SESSION['auth']))
                {
                        if($_SESSION['auth_user']['role_as'] != "1")
                        {
                        ?>
                                            
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['name'];?></strong> !</h2>
                            <a href="your_reservation.php">Your Reservation</a>
                            <a href="logout.php">Logout</a>

                    <?php
                        }
                        else
                        {
                            ?>
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['name'];?></strong> !</h2>
                            <a href="admin/index.php">Dashboard</a>
                            <a href="logout.php">Logout</a> 
                            <?php 
                        }
                    
                    ?> 
                    <?php 
                }
                elseif(isset($_SESSION['business_email'])) 
                {
                ?>
                    <!--if user is login-->
                    <h2> Welcome <strong><?php echo $_SESSION['business_name']; ?></strong> !</h2>
                    <a href="business/admin.php">Dashboard</a> 
                    <a href="logout.php">Logout</a>
                 
                <?php } ?>
            </div>
    <div class="logo">
        <img src="uploads/I-EatLogo.png" alt="LOGO" width="300" height="300"> 
    </div>
    <div class="container">
        <div class="d-flex float-right">
            <select id="cuisine" name='cuisine_type'>
            <option disabled selected hidden>Type of Cuisine</option>
              <?php 
                  include 'connect.php';
                  $sql = "SELECT * FROM mealcategory;";
                  $result =mysqli_query($conn,$sql);
                  foreach ($result as $r) {
              ?>
                  <option value="<?php echo $r['categoryid']; ?>"><?php echo $r['categoryname']; ?></option>
                  <?php } ?>
            </select> 
        </div>
    </div>
</div>
</header>
