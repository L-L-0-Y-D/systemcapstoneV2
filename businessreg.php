<?php

include('functions/businessfunctions.php');
include('config/dbcon.php');
if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are Already Login";
    header('Location: index.php');
    exit();
}

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
        <img src="uploads/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
    <map name="workmap">
        <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
    </map>
    </header>
<main>
<div class="container">
        <p>COMPANY INFORMATION</p>
        <form method="POST" action="functions/busiauthcode.php">
            <div class="column">
                <div class="input" style="margin-left:110px">
                    <label for="">Upload Image</label><br>
                    <input type="file" name="image" required class="form-control">
                </div>
            </div>
            <div class="column">
                  <input type="text" name='business_name' required placeholder="Business Name" class="input"/>
            </div>
            <div class="column">
                  <input type="text" name='business_address' required placeholder="Business Address" class="input"/>
            </div>
            <div>
                  <select name="municipalityid" >
                    <option disabled selected hidden>Select your Business Location</option>
                    <?php 
                        $municipality = getAllActive("municipality");
                        if(mysqli_num_rows($municipality) > 0)
                            {
                                foreach ($municipality as $item)
                                {
                                    ?>
                                    <option value="<?= $item['municipalityid']; ?>"><?= $item['municipality_name']; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Municipality Available";
                            }?>
                  </select> 
                </div>
                <div>
                  <select name="categoryid">
                    <option disabled selected hidden>Type of Cuisine</option>
                    <?php 
                        $category = getAllActive("mealcategory");
                        if(mysqli_num_rows($category) > 0)
                            {
                                foreach ($category as $item)
                                {
                                    ?>
                                    <option value="<?= $item['categoryid']; ?>"><?= $item['categoryname']; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Municipality Available";
                            }?>
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
                
                <button type="submit" name="business_register_btn" class="busi_reg-btn" >REGISTER</button> <br> <br>
                <a href="index.php">Back to Home</a>
    </div>
</form>
</main>
</body>
</html>