<?php

session_start();
include('config/dbcon.php');
//include('functions/businessfunctions.php');
if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are Already Login";
    $_SESSION['alert'] = "warning";
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Business Register| I-Eat</title>
    <style>
        .reg {
            background-image: url(uploads/layout1.jpg)!important;
            background-attachment:fixed;
            background-position:center;
            background-repeat: no-repeat;
            background-size: cover;
            padding:10px;
            }
    </style>

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
            </div>
        </nav>
<section class="reg">
    <form method="post" action="functions/busiauthcode.php" enctype="multipart/form-data">
        <!-- Start: 1 Row 2 Columns -->
        <div class="containe">
            <button class="btn-lg btn-close float-end pt-4" onclick="location.href='index.php'"></button>
            <h5 class="pt-4">Create a Business Account</h5>
            <hr>
            <label class="form-label">Upload your Business Logo (max 2mb)</label>
            <input class="form-control" type="file" name="image" required>
            <label class="form-label">Upload your Business Permit (max 2mb)</label>
            <input class="form-control" name="image_cert" type="file" required>
            <div class="row">
                <div class="col">
                    <label class="form-label">Business Name</label>
                    <!-- /* Checking if the name is set, if it is, it will display the name in the input
                    field. If it is not set, it will display the input field without the name. */ -->
                    <?php if (isset($_GET['business_name'])){?>
                        <div class="col">
                            <input class="form-control" type="text" name="business_name" value="<?= $_GET['business_name']?>" required></div>
                    <?php }else{?>
                        <div class="col">
                            <input class="form-control" type="text" name='business_name' required></div>
                    <?php }?>

                    <label class="form-label">Business Address</label>
                    <!-- /* Checking if the variable business_address is set. If it is, it will display the
                    value of the variable. If it is not set, it will display the placeholder. */ -->
                    <?php if (isset($_GET['business_address'])){?>
                        <div class="col">
                            <input class="form-control" type="text" name="business_address" value="<?= $_GET['business_address']?>" required ></div>
                    <?php }else{?>
                        <div class="col">
                            <input class="form-control" type="text" name='business_address' required></div>
                    <?php }?>

                    <label class="form-label">Municipality where it located</label>
                    <!-- /* The above code is checking if the municipalityid is set. If it is set, it will
                    display the municipalityid. If it is not set, it will display the
                    municipalityid. */ -->
                    <?php if (isset($_GET['municipalityid'])){?>
                        <div class="col">
                            <select class="form-select" name="municipalityid" style="margin-bottom: 10px;" required>
                                <option disabled selected hidden>Select your Municipality</option>
                                <?php 
                                    //$municipality = getAll("municipality");
                                    $query_municipality = "SELECT * FROM municipality WHERE status= '1'";
                                    $query_municipality_run = mysqli_query($con, $query_municipality);
                                    if(mysqli_num_rows($query_municipality_run) > 0)
                                        {
                                            foreach ($query_municipality_run as $item)
                                            {
                                                ?>
                                                <option value="<?= $item['municipalityid']; ?>" <?= $_GET['municipalityid'] == $item['municipalityid']?'selected':''?>><?= $item['municipality_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Municipality Available";
                                        }?>
                            </select>
                    <?php }else{?>
                        <div class="col">
                        <select class="form-select" name="municipalityid" style="margin-bottom: 10px;" required>
                        <option disabled selected hidden>Select your Municipality</option>
                            
                            <?php 
                                //$municipality = getAllActive("municipality");
                                $query_municipality = "SELECT * FROM municipality WHERE status= '1'";
                                $query_municipality_run = mysqli_query($con, $query_municipality);
                                if(mysqli_num_rows($query_municipality_run) > 0)
                                    {
                                        foreach ($query_municipality_run as $item)
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
                    <?php }?>
 
                    <label class="form-label ">Cuisine Type</label>
                    <!-- /* The above code is a PHP code that is used to display the cuisine type in the
                    form of checkboxes. */ -->
                    <?php if (isset($_GET['cuisinename[]'])){?>
                        <div class="col">
                            <?php 
                                //$category = getAllActive("mealcategory");
                                $query_mealcategory = "SELECT * FROM mealcategory WHERE status= '1'";
                                $query_mealcategory_run = mysqli_query($con, $query_mealcategory);
                                if(mysqli_num_rows($query_mealcategory_run) > 0)
                                    {
                                        foreach ($query_mealcategory_run as $item)
                                            {
                                                ?>
                                                <input class= "form-checkbox" type="checkbox" name="cuisinename[]" value="<?= $item['categoryname']; ?>"
                                                <?php
                                                $cuisine = str_word_count($_GET['cuisinename'],1);
                                                foreach ($cuisine as $itemcuisine)
                                                    {
                                                        ?>
                                                        <?= $itemcuisine == $item['categoryname']?'checked':''?>
                                                        <?php
                                                    }
                                                    ?>
                                                    ><?= $item['categoryname']; ?></input>
                                                    <?php
                                                    }
                                                }
                                            else
                                                {
                                                    echo "No Cuisine Type Available";
                                                }
                                        ?>
                                        <br><a name="addcuisinebtn" href="addcuisine.php" >Add Cuisine Type</a> 
                        </div>  
                    <?php }else{?>
                        <div class="col">
                            <div class="form-check">        
                                <?php 
                                    //$category = getAllActive("mealcategory");
                                    $query = "SELECT * FROM mealcategory WHERE status= '1'";
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
                                <br><a name="addcuisinebtn" href="addcuisine.php" >Add Cuisine Type</a>   
                            </div>
                        </div>
                    <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pin Location</label>
                     <!-- /* The above code is creating a map and pinning the location of the user. */ -->
                        <input type="hidden" id="address" name="address">
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                    <div id="map" style=" height: 300px;"></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Opening Time</label>
                    <!-- /* Checking if the business name is set, if it is then it will display the business
                    name, if not then it will display the opening time. */ -->
                    <?php if (isset($_GET['opening'])){?>
                        <div class="col">
                            <input type="time" name="opening" value="<?= $_GET['opening'] ?>"  required placeholder="Opening"></div>
                    <?php }else{?>
                        <div class="col">
                            <input class="form-control" type="time" name="opening"  required></div>
                    <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Closing Time</label>
                    <?php if (isset($_GET['closing'])){?>
                        <div class="col">
                            <input type="time" name="closing" value="<?= $_GET['closing'] ?>"  required placeholder="Opening"></div>
                    <?php }else{?>
                        <div class="col">
                            <input class="form-control" type="time" name="closing" required></div>
                    <?php }?>
                </div>
            </div>
            <h5 style="margin-top:30px;">Owner Information</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Firstname</label>
                    <!-- /* Checking if the variable business_firstname is set. If it is, it will display
                    the value of the variable. If it is not set, it will display a blank input
                    field. */ -->
                    <?php if (isset($_GET['business_firstname'])){?>
                        <div class="col">
                        <input class="form-control" name='business_firstname' type="text" value="<?= $_GET['business_firstname']?>" required ></div>
                    <?php }else{?>
                        <div class="col">
                            <input class="form-control" name='business_firstname' type="text" required ></div>
                    <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Lastname</label>
                    <!-- /* Checking if the variable business_lastname is set. If it is, it will display
                    the value of the variable. If it is not set, it will display the placeholder. */ -->
                    <?php if (isset($_GET['business_lastname'])){?>
                        <div class="col">
                            <input class="form-control" name='business_lastname' type="text" value="<?= $_GET['business_lastname']?>" required ></div>
                    <?php }else{?>
                        <div class="col">
                            <input class="form-control" name='business_lastname' type="text" required ></div>
                    <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Contact Number</label>
                    <!-- /* Checking if the variable business_phonenumber is set. If it is, it will display
                    the value of the variable. If it is not set, it will display a blank input
                    field. */ -->
                    <?php if (isset($_GET['business_phonenumber'])){?>
                        <div class="col">
                            <input class="form-control" name='business_phonenumber' type="text" value="<?= $_GET['business_phonenumber']?>" required></div>
                    <?php }else{?>
                        <div class="col">
                            <input class="form-control" name='business_phonenumber' type="text" required></div>
                    <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <!-- /* Checking if the business_email is set in the URL. If it is, it will display the
                    value in the input field. If it is not, it will display a blank input field. */ -->
                    <?php if (isset($_GET['business_email'])){?>
                        <div class="col">
                            <input class="form-control" name='business_email' type="email" value="<?= $_GET['business_email']?>" required></div>
                    <?php }else{?>
                        <div class="col">
                            <input class="form-control" name='business_email' type="email" required></div>
                    <?php }?>
                </div>
                <div class="col-mb-3">
                    <label class="form-label">Address</label>
                    <!-- /* Checking if the variable business_owneraddress is set. If it is, it will display
                    the value of the variable. If it is not set, it will display a blank input
                    field. */ -->
                    <?php if (isset($_GET['business_owneraddress'])){?>
                        <div class="col">
                            <input class="form-control" name='business_owneraddress' type="text" value="<?= $_GET['business_owneraddress']?>" required></div>
                    <?php }else{?>
                        <div class="col">
                            <input class="form-control" name='business_owneraddress' type="text" required></div>
                    <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input class="form-control" name='business_password' type="password" required></div>
                    <input type="hidden" name="status" value = '0'>
                <div class="col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input class="form-control" name='business_confirmpassword' type="password" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit" name="business_register_btn">Register</button>
                </div>
            </div>
            <p>Already have an account?&nbsp&nbsp<a href="ownerlogin.php">Login</a></p>
        </div><!-- End: 1 Row 2 Columns -->
    </form>    
</section>

    <!-- <script type="text/javascript" src="map.js"></script> -->
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    <?php if(isset($_SESSION['message'])) 
    { ?>
        alertify.set('notifier','position', 'top-center');
        alertify.success('<?= $_SESSION['message']; ?>');
        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);
    }
    
    ?>
    </script>  
    <script type="text/javascript" src="map.js"></script>

    

</body>
</html>