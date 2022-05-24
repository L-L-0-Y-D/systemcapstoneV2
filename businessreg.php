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
                  <input type="text" id="busi_name" name='business_name' required placeholder="Business Name" class="fname"/>
            </div>
            <div class="column">
                  <input type="text" id="busi_address" name='business_address' required placeholder="Business Address" class="fname"/>
            </div>
            <div>
                  <select id="municipality" name='municipality'>
                    <option value="" disabled selected hidden>Select your Business Location</option>
                    <option value=1>Mariveles</option>
                    <option value=2>Limay</option>
                    <option value=3>Orion</option>
                    <option value=4>Pilar</option>
                    <option value=5>Balanga</option>
                    <option value=6>Abucay</option>
                    <option value=7>Samal</option>
                    <option value=8>Orani</option>
                    <option value=9>Hermosa</option>
                    <option value=10>Dinalupihan</option>
                    <option value=11>Morong</option>
                    <option value=12>Bagac</option>
                  </select> 
                </div>
                <div>
                  <select id="cuisine" name='cuisine_type'>
                    <option value="" disabled selected hidden>Type of Cuisine</option>
                    <option value=1>Chinese</option>
                    <option value=2>Japanese</option>
                    <option value=3>Korean</option>
                    <option value=4>Arabic</option>
                    <option value=5>American</option>
                    <option value=6>Asian</option>
                    <option value=7>Vietnamese</option>
                    <option value=8>Indian</option>
                  </select> 
                </div>
            <h1>OWNER DETAILS</h1>
                <div class="column">
                    <input type="text" name='business_firstname' required placeholder="Firstname" class="fname"/>
                </div>
                <div class="column">
                    <input type="text" name='business_lastname' required placeholder="Lastname" class="lname"/>
                </div>
                <div class="column">
                    <input type="text" name='business_phonenumber' required placeholder="Contact Number" class="contactnum"/>
                </div>
                <div class="column">
                    <input type="text" name='business_owneraddress' required placeholder="Address" class="address"/>
                </div>
                <div class="column">
                    <input type="text" name='business_email' required placeholder="Email Address" class="email"/>
                </div>
                <div class="column">
                    <input type="password" name='business_password' required placeholder="Password" class="pword"/>
                </div>
                <div class="column">
                    <input type="password" name='business_confirmpassword' required placeholder="Confirm Password" class="pword"/>
                </div>

                <input type = "hidden" name='user_type' value = "business">
                
                <button type="submit" name="businessregister" class="busi_reg-btn" >REGISTER</button> <br> <br>
                <a href="home.php">Back to Home</a>
    </div>
</form>
</main>
</body>
</html>