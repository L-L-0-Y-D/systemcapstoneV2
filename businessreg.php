<?php

session_start();
include('config/dbcon.php');
//include('functions/businessfunctions.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/assets/css/vanilla-zoom.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=21f14b60305aa9b0449170550a54b7e5">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic.css?h=561e53509f5bc926993a2226fdbdf2f4">
    <link rel="stylesheet" href="assets/css/styles.css?h=d41d8cd98f00b204e9800998ecf8427e">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Business Register| I-Eat</title>
    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
            <div class="container ml-2">
                <a class="navbar-brand" href="index.php" style="color: white;font-size: 28px;">
                    <span><img src="uploads/logoT.png" usemap=#workmap style="width: 50px;">&nbsp;</span>
                        <map name="workmap">
                            <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                        </map>I - Eat</a>
                <nav class="navbar navbar-expand">
                    <div class="container-fluid">
                        <span class="bs-icon-md d-flex justify-content-center align-items-center me-2 bs-icon" style="background: transparent;">
                        <a href="index.php"><i class="fa fa-home" style="float:right; color:white;"></i></a>
                        </span></div>
                </nav>
            </div>
        </nav>
<section class="position-relative py-4 py-xl-5">
    <div class="container" style="margin-top:50px;">
        <div class="row d-flex justify-content-center align-items-md-end">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-5" style="border-style: none;">
                    <div class="card-body d-flex flex-column align-items-center" style="border-radius: 10px;border-style: solid;border-color: rgb(255, 128, 64);box-shadow: 0px 0px 18px var(--bs-gray);">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="height:110px; width:110px; border-style: solid;border-color: rgb(255, 128, 64);background: transparent;">
                            <picture><img src="uploads/I-EatLogo.png" style="width: 150px;height: 150px;" usemap=#workmap></picture>
                            <map name="workmap">
                                <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                            </map>
                        </div>
            <form class="text-center" method="post" action="functions/busiauthcode.php" enctype="multipart/form-data">
            <p class="text-center" style="text-align: left;font-size: 20px;font-weight: bold;">BUSINESS DETAILS</p>
                <p style="text-align: left;font-size: 16px; font-weight:bold;">Upload Business Logo</p>
                <input class="form-control" type="file" name="image" style="margin-bottom: 10px;" required>
                <div class="row row-cols-1" style="margin-bottom: 10px;">
                    <div class="col">
                        <input class="form-control" type="text" name='business_name' placeholder="Business Name" style="margin-bottom: 10px;" required></div>
                    <div class="col">
                        <input class="form-control" type="text" name='business_address' placeholder="Business Address" style="margin-bottom: 10px;" required></div>
                    <div class="col">
                        <select class="form-select" name="municipalityid" style="margin-bottom: 10px;" required>
                            <option disabled selected hidden>Select your Business Location</option>
                            <?php 
                                //$municipality = getAllActive("municipality");
                                $query = "SELECT * FROM municipality WHERE status= '0'";
                                $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach ($query_run as $item)
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
                </div>
                <p style="text-align: left;font-size: 16px; font-weight:bold;">Cuisine Type</p>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                        <div class="form-check">        
                                <?php 
                                    //$category = getAllActive("mealcategory");
                                    $query = "SELECT * FROM mealcategory WHERE status= '0'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach ($query_run as $item)
                                            {
                                                ?>
                                                <input class= "form-checkbox" type="checkbox" style="margin-right:5px;" name="cuisinename[]" value="<?= $item['categoryname']; ?>"><?= $item['categoryname']; ?></input>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Cuisine Type Available";
                                        }
                                ?>
                                <a class="btn d-block w-100" name="addcuisinebtn" onclick="openForm()" href="addcuisine.php" style="text-decoration:underline;">Add Cuisine Type</a>
                                    <!-- <div class="form-popup bg-light p-3" id="myForm" style="border-radius:10px; border: solid 2px rgb(255,128,64); ">
                                        <form name="form" method="post" action="functions/busiauthcode.php" class="form-container">
                                            <i class="far fa-times-circle" onclick="closeForm()" style="float:right;"></i>
                                            <p class="fw-bold mt-2 mb-1">Add Cuisine Type</p>
                                            <input class="form-control" type="text" name="categoryname"></input>
                                            <input type = "hidden" name="status" value = '0'>
                                            <button type="submit" class="btn btn-primary d-block w-50 mt-2 fw-light text-center" name="add_category_btn"  style="background-color:rgb(255,128,64);border:none;" href="#">Add</button>
                                        </form>
                                        <script>
                                            function openForm() {
                                                document.getElementById("myForm").style.display = "block";
                                            }
                                            function closeForm() {
                                                document.getElementById("myForm").style.display = "none";
                                            }
                                        </script>
                                    </div> -->
                    </div>
                </div>
                    <p style="text-align:left;font-size: 16px;font-weight:bold;">Upload Business Permit</p>
                    <input class="form-control" name="image_cert" type="file" style="margin-bottom: 10px;" required>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col mb-3">
                        <p style="text-align: left;font-size: 16px;">Opening Time</p>
                        <input class="form-control" type="time" name="opening"  required></div>
                    <div class="col">
                        <p style="text-align: left;font-size: 16px;">Closing Time</p>
                        <input class="form-control" type="time" name="closing" required></div>
                </div>
                <div class="mb-3">
                    <p class="text-center" style="text-align: left;font-size: 20px;font-weight: bold;">OWNER INFORMATION</p>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col"><input class="form-control" name='business_firstname' type="text" placeholder="Firstname" required ></div>
                        <div class="col"><input class="form-control" name='business_lastname' type="text" placeholder="Lastname" required ></div>
                    </div>
                </div>
                <div class="mb-3">
                    <input class="form-control" name='business_phonenumber' type="text" placeholder="Phone Number" required></div>
                <div class="mb-3">
                    <input class="form-control" name='business_owneraddress' type="text" placeholder="Address" required></div>
                <div class="mb-3">
                    <input class="form-control" name='business_email' type="email" placeholder="Email Address" required></div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col"><input class="form-control" name='business_password' type="password" placeholder="Password" required></div>
                    <input type="hidden" name="status" value = '0'>
                    <div class="col"><input class="form-control" name='business_confirmpassword' type="password" placeholder="Confirm Password" required></div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-block w-100" type="submit" name="business_register_btn" style="background: rgb(255, 128, 64);border-style: none;">Register</button>
                </div>
                    <p><a class="d-flex justify-content-center" href="index.php" style="color: var(--bs-dark);font-weight: bold;">Back to Home</a></p>
    </form>
    </div> </div> </div> </div> </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/assets/js/vanilla-zoom.js"></script>
    <script src="asset/sassets/js/theme.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

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