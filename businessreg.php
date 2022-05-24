<?php

session_start();
include ('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="businessreg.css"> 
    <title>Register your Business</title>
</head>
<body>
    <header>
        <img src="images/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
    <map name="workmap">
        <area shape="circle" coords="100,100,400,400" alt="logo" href="home.php">
    </map>
    </header>
<main>
<div class="container">
        <p>COMPANY INFORMATION</p>
        <?php 
        
        include('error.php'); 
        
        ?>
        <form method="post" action="businessreg.php">
            <div class="column">
                  <input type="text" id="busi_name" name='business_name' required placeholder="Business Name" class="input"/>
            </div>
            <div class="column">
                  <input type="text" id="busi_address" name='business_address' required placeholder="Business Address" class="input"/>
            </div>
            <div>
                  <select name="municipalityid" name='municipality'>
                    <option disabled selected hidden>Select your Business Location</option>
                    <<?php 
                        include 'connect.php';
                        $sql = "SELECT * FROM municipality;";
                        $result =mysqli_query($conn,$sql);
                        foreach ($result as $r) {
                      ?>
                        <option value="<?php echo $r['municipalityid']; ?>"><?php echo $r['municipality_name']; ?></option>
                      <?php } ?>
                  </select> 
                </div>
                <div>
                  <select name="categoryid" name='cuisine_type'>
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
            <p>OWNER DETAILS</p>
                <div class="column">
                    <input type="text" name='business_firstname' required placeholder="Firstname" class="input"/>
                </div>
                <div class="column">
                    <input type="text" name='business_lastname' required placeholder="Lastname" class="input"/>
                </div>
                <div class="column">
                    <input type="text" name='business_phonenumber' required placeholder="Contact Number" class="input"/>
                </div>
                <div class="column">
                    <input type="text" name='business_owneraddress' required placeholder="Address" class="input"/>
                </div>
                <div class="column">
                    <input type="text" name='business_email' required placeholder="Email Address" class="input"/>
                </div>
                <div class="column">
                    <input type="password" name='business_password' required placeholder="Password" class="input"/>
                </div>
                <div class="column">
                    <input type="password" name='business_confirmpassword' required placeholder="Confirm Password" class="input"/>
                </div>
                
                <button type="submit" name="businessregister" class="busi_reg-btn" >REGISTER</button> <br> <br>
                <a href="home.php">Back to Home</a>
    </div>
</form>
</main>
</body>
</html>