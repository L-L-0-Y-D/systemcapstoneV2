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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="reg.css"> 
    <title>Register Business | I-Eat</title>
</head>
<body>
    <main class="page registration-page">
        <section class="clean-block clean-form dark" style="height: auto;background: transparent;">
            <img class="img-fluid d-flex d-lg-flex align-items-center m-auto" loading="eager" src="uploads/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200px" height="200px">
            <map name="workmap">
                <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
             </map>
            <form method="POST" action="functions/busiauthcode.php" enctype="multipart/form-data"  style="background: rgb(255, 128, 64);border-style: solid;border-color: rgb(255, 128, 64);border-radius: 20px;">
                <div class="container">
                    <h2 class="d-flex justify-content-center" style="font-weight:bold;">BUSINESS DETAILS</h2>
            <div class="column mb-3">
                <label class="form-label" for="" style="font-weight: bold;">Upload Image</label>
                <input class="form-control" type="file" name="image" style="margin-bottom: 5px;height: 40px;" required >
            </div>
            <div class="column mb-3">
                <label class="form-label" for="" style="font-weight: bold;">Business Name</label>
                <input type="text" name='business_name' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
            </div>
            <div class="column mb-3">
                <label class="form-label" for="" style="font-weight: bold;">Business Address</label>
                <input type="text" name='business_address' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
            </div>
            <div>
                  <select class= "border rounded form-select mb-3" name="municipalityid" style="height:40px; border-style:none;"  required>
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
                  <select class= "border rounded form-select mb-3" name="categoryid" style="height:40px; border-style:none;" required>
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
                <div class="column mb-3">
                    <label class="form-label" for="" style="font-weight: bold;">Upload Business Permit</label>
                    <input class="form-control" type="file" name="image_cert" style="margin-bottom: 5px;height: 40px;" required >
            </div>
            <h2 class="d-flex justify-content-center" style="font-weight:bold;">Owner Information</h2>
                <div class="column mb-3">
                    <label class="form-label" for="" style="font-weight: bold;">Firstname</label>
                    <input type="text" name='business_firstname' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                </div>
                <div class="column mb-3">
                    <label class="form-label" for="" style="font-weight: bold;">Lastname</label>
                    <input type="text" name='business_lastname' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                </div>
                <div class="column mb-3">
                    <label class="form-label" for="" style="font-weight: bold;">Phone Number</label>
                    <input type="text" name='business_phonenumber' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                </div>
                <div class="column mb-3">
                    <label class="form-label" for="" style="font-weight: bold;">Address</label>
                    <input type="text" name='business_owneraddress' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                </div>
                <div class="column mb-3">
                    <label class="form-label" for="" style="font-weight: bold;">Email Address</label>
                    <input type="email" name='business_email' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                </div>
                <div class="column mb-3">
                    <label class="form-label" for="" style="font-weight: bold;">Password</label>
                    <input type="password" name='business_password'  class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                </div>
                <div class="column mb-3">
                    <label class="form-label" for="" style="font-weight: bold;">Confirm Password</label>
                    <input type="hidden" name="status" value = '0'>
                    <input type="password" name='business_confirmpassword'  class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                </div>
                
                <button class="btn btn-primary d-flex d-xl-flex align-items-center m-auto" type="submit" name="business_register_btn"style="background: black;color: white;border-style: none;padding-right: 15px;padding-left: 15px;font-size: 18px;padding-bottom: 7px;" >REGISTER</button> <br>
                <a class="d-flex justify-content-center" style="color: black;" href="index.php">Back to Home</a>
        </div>
    </form>
</section>
</main>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        <?php if(isset($_SESSION['message'])) 
    { ?>
          alertify.set('notifier','position', 'top-center');
         var msg = alertify.message('Default message');
        msg.delay(3).setContent('<?= $_SESSION['message']; ?>');
        <?php 
        unset($_SESSION['message']);
    }
    ?> 
    </script> 
</body>
</html>