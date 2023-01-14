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
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/style-for-registration.css">
    <title>Business Registration| I-Eat</title>
    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
    
</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="color: white;font-size: 28px;">
            <span><img src="uploads/logoT.png" usemap=#workmap style="width: 50px;">&nbsp;</span>
                <map name="workmap">
                    <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                </map>I - Eat</a>
        </div>
    </nav>
    <div class="content bg-white">
    <header class="header">
        <h1 class="header__title">Create a Business Account</h1>
        <!-- <button class="btn-lg btn-close float-end " onclick="location.href='index.php'"></button>-->
    </header>
        <div class="content__inner">
            <div class="container">
                <h2 class="content__title">Kindly fill up the information needed to create your business account.</h2>
            </div>
                <div class="container overflow-hidden">
                    <div class="multisteps-form">
                        <div class="row">
                            <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Business Info</button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Address">Business Location</button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Order Info">Permits</button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Message">Owner Info</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-lg-8 m-auto">
                                <form class="multisteps-form__form" method="post" action="functions/busiauthcode.php" enctype="multipart/form-data">
                                    <!--FOR BUSINESS INFO-->
                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                        <h3 class="multisteps-form__title">Business Information</h3>
                                        <h6 class="text-muted">All fields are required<span style="color:red;">&nbsp;*</span></h6><hr>
                                        <div class="multisteps-form__content">                                   
                                            <div class="form-row mt-4">
                                                <div class="col-12 col-md-12 mb-3 ">
                                                    <div class="form-content">
                                                    <label class="form-label">Upload your Business Logo (max 2mb)<span style="color:red;">&nbsp;*</span></label>
                                                    <input class="form-control" type="file" name="image" id="file" accept=".jpg, .jpeg, .png" onchange="return fileValidation();" required>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 ">
                                                    <div class="form-content">
                                                    <label for="businessname">Business Name<span style="color:red;">&nbsp;*</span></label>
                                                    <!-- /* Checking if the name is set, if it is, it will display the name in the input
                                                    field. If it is not set, it will display the input field without the name. */ -->
                                                    <?php if (isset($_GET['business_name'])){?>
                                                            <input type="text" name="business_name" id="businessname" value="<?= $_GET['business_name']?>" oninput="checkBusiName();" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input type="text" name='business_name' id="businessname" oninput="checkBusiName();" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="form-content">
                                                    <label for="businessname">Full Address<span style="color:red;">&nbsp;*</span></label>
                                                    <!-- /* Checking if the variable business_address is set. If it is, it will display the
                                                    value of the variable. If it is not set, it will display the placeholder. */ -->
                                                    <?php if (isset($_GET['business_address'])){?>
                                                            <input type="text" name="business_address" id='businessaddress' value="<?= $_GET['business_address']?>" oninput="checkBusiAddress();" required >
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input type="text" name='business_address' id='businessaddress' oninput="checkBusiAddress();" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-4">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <div class="form-content">
                                                    <label class="form-label">Contact Number<span style="color:red;">&nbsp;*</span></label>
                                                    <?php if (isset($_GET['business_number'])){?>
                                                            <input name='business_number' id='businessnumber' oninput="checkbusiPhone();" type="text" value="<?= $_GET['business_number']?>" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input name='business_number' id='businessnumber' oninput="checkbusiPhone();" type="text" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-content">
                                                    <label for="">Time Duration For Every Reservation(Minutes)<span style="color:red;">&nbsp;*</span></label>
                                                    <?php if (isset($_GET['duration'])){?>
                                                            <input type="number" name="duration" id="duration" value="<?= $_GET['duration'] ?>"  required  onkeypress="return onlyNumberKey(event)">
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input type="number" name="duration"  id="duration" onkeypress="return onlyNumberKey(event)" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col-12 col-sm-6 ">
                                                    <div class="form-content">
                                                    <label class="form-label">Opening Time<span style="color:red;">&nbsp;*</span></span></label>
                                                    <!-- /* Checking if the business name is set, if it is then it will display the business
                                                    name, if not then it will display the opening time. */ -->
                                                    <?php if (isset($_GET['opening'])){?>
                                                            <input type="time" name="opening" id="opening" value="<?= $_GET['opening'] ?>"  required placeholder="Opening" oninput="checkOpening();" >
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input type="time" name="opening"  id="opening" oninput="checkOpening();"  required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="form-content">
                                                    <label class="form-label">Closing Time<span style="color:red;">&nbsp;*</span></span></label>
                                                    <?php if (isset($_GET['closing'])){?>
                                                            <input type="time" name="closing" id="closing" value="<?= $_GET['closing'] ?>" oninput="checkClosing();" required placeholder="Opening">
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input type="time" name="closing" id="closing" oninput="checkClosing();"required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                            </div>    
                                            <input class= "form-checkbox" type="checkbox" style="margin-right:5px;" name="sameday"></input>
                                            <label class="form-label text-black">Have same day reservation?</label><br>                         
                                            
                                            <label class="form-label mt-4">Cuisine Type<span style="color:red;">&nbsp;*</span></label>            
                                            <div class="form-row ">
                                                    <!-- /* The above code is a PHP code that is used to display the cuisine type in the
                                                    form of checkboxes. */ -->
                                                    <?php if (isset($_GET['cuisinename[]'])){?>
                                                            <?php 
                                                            //$category = getAllActive("mealcategory");
                                                            $query_mealcategory = "SELECT * FROM mealcategory WHERE status= '1'";
                                                            $query_mealcategory_run = mysqli_query($con, $query_mealcategory);
                                                            if(mysqli_num_rows($query_mealcategory_run) > 0)
                                                                {
                                                                foreach ($query_mealcategory_run as $item)
                                                                {
                                                                    ?>
                                                                    <div class="col-md-3">
                                                                        <input class= "form-checkbox" type="checkbox" name="cuisinename[]" value="<?= $item['categoryname']; ?>" required
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
                                                                    </div> 
                                                                    <?php
                                                                    }
                                                                        }
                                                                    else
                                                                        {
                                                                        echo "No Cuisine Type Available";
                                                                        }
                                                                    ?>
                                                                    <br><a name="addcuisinebtn" href="addcuisine.php" >Add Cuisine Type</a> 
                                                         
                                                        <?php }else{?>      
                                                                    <?php 
                                                                        //$category = getAllActive("mealcategory");
                                                                        $query = "SELECT * FROM mealcategory";
                                                                        $query_run = mysqli_query($con, $query);
                                                                        if(mysqli_num_rows($query_run) > 0)
                                                                            {
                                                                                foreach ($query_run as $item)
                                                                                    {
                                                                                        ?>
                                                                                        <div class=" form-check col-md-3">
                                                                                            <input class= "form-checkbox" type="checkbox" style="margin-right:5px;" name="cuisinename[]" value="<?= $item['categoryname']; ?>"><?= $item['categoryname']; ?> </input>
                                                                                        </div>
                                                                                        
                                                                                        <?php
                                                                                    }
                                                                            }
                                                                        else
                                                                            {
                                                                                echo "No Cuisine Type Available";
                                                                            }
                                                                    ?>
                                                                    <br><a name="addcuisinebtn" href="addcuisine.php" >Add Cuisine Type</a>   
                                                        <?php }?>
                                            </div>
                                            <div class="button-row d-flex mt-3">
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FOR BUSINESS LOCATION-->
                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                        <h3 class="multisteps-form__title">Business Location</h3>
                                        <h6 class="text-muted">All fields are required<span style="color:red;">&nbsp;*</span></h6><hr>
                                        <div class="multisteps-form__content">
                                            <div class="form-row mt-3 ">
                                                <label class="form-label pt-2">Municipality where it's located<span style="color:red;">&nbsp;*</span></span></label>
                                                <!-- /* The above code is checking if the municipalityid is set. If it is set, it will
                                                display the municipalityid. If it is not set, it will display the
                                                municipalityid. */ -->
                                                <?php if (isset($_GET['municipalityid'])){?>
                                                    <div class="col">
                                                        <select class="form-select" name="municipalityid"style="margin-bottom: 10px;" required>
                                                            <option disabled selected hidden>Select Municipality</option>
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
                                                            <select class="form-select" name="municipalityid" style="margin-bottom: 10px;"  required>
                                                                <option disabled selected hidden>Select Municipality</option>   
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
                                                                        }
                                                                ?>
                                                            </select> 
                                                            </div>                                                    
                                                        <?php }?>
                                                    </div>
                                                    <div class="form-row mt-3 form-content">
                                                        <div class="col">
                                                            <label class="form-label">Pin Location<span style="color:red;">&nbsp;*</span></span></label>
                                                            <!-- /* The above code is creating a map and pinning the location of the user. */ -->
                                                                <input type="hidden" id="address" name="address">
                                                                <?php if (isset($_GET['latitude'])){?>
                                                                        <input type="hidden" value="<?= $_GET['latitude'] ?>" id="latitude" name="latitude">
                                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                                <?php }else{?>
                                                                        <input type="hidden" value="14.6741" id="latitude" name="latitude">
                                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                                <?php }?>
                                                                <?php if (isset($_GET['longitude'])){?>
                                                                        <input type="hidden" value="<?= $_GET['longitude'] ?>" id="longitude" name="longitude">
                                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                                <?php }else{?>
                                                                        <input type="hidden" value="120.5113" id="longitude" name="longitude">
                                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                                <?php }?>
                                                                <!-- <input type="hidden" value="14.6741" id="latitude" name="latitude">
                                                                <input type="hidden" value="120.5113" id="longitude" name="longitude"> -->
                                                            <div id="map" style=" height: 300px;"></div>
                                                        </div>
                                                    </div>                            
                                                    <div class="button-row d-flex mt-4">
                                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Back</button>                                                 
                                                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                                    </div>
                                            </div>
                                        </div>
                                        <!--FOR BUSINESS PERMITS-->
                                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                            <h3 class="multisteps-form__title">Business Permits</h3>
                                            <h6 class="text-muted">All fields are required<span style="color:red;">&nbsp;*</span></h6><hr>
                                            <div class="multisteps-form__content">
                                            <div class="form-row">
                                                <div class="col-12 col-md-12">
                                                    <div class="form-content">
                                                    <label class="form-label">Upload your DTI Business Permit (max 2mb)<span style="color:red;">&nbsp;*</span></label>
                                                    <input class="form-control" name="image_cert" id="imagecert" type="file" accept=".jpg, .jpeg, .png" onchange="return certValidation();" required>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12  ">
                                                    <div class="form-content">
                                                    <label class="form-label">Upload your Sanitary Permit (max 2mb)<span style="color:red;">&nbsp;*</span></label>
                                                    <input class="form-control" name="image_scert" id="imagescert" type="file" accept=".jpg, .jpeg, .png" onchange="return scertValidation();" required>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div> 
                                                <div class="col-12 col-md-12 ">
                                                    <div class="form-content">
                                                    <label class="form-label">Upload your Fire Safety Permit (max 2mb)<span style="color:red;">&nbsp;*</span></label>
                                                    <input class="form-control" name="image_fcert" id="imagefscert" type="file" accept=".jpg, .jpeg, .png" onchange="return fscertValidation();" required>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div> 
                                                <div class="col-12 col-md-12 ">
                                                    <div class="form-content">
                                                    <label class="form-label">Upload your Brgy. Clearance Permit (max 2mb)<span style="color:red;">&nbsp;*</span></label>
                                                    <input class="form-control" name="image_bcert" id="imagebccert" type="file" accept=".jpg, .jpeg, .png" onchange="return bccertValidation();" required>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Back</button>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--FOR OWNER INFO-->
                                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                            <h3 class="multisteps-form__title">Owner's Info</h3>
                                            <h6 class="text-muted">All fields are required<span style="color:red;">&nbsp;*</span></h6><hr>
                                            <div class="multisteps-form__content">
                                            <div class="form-row mt-3">
                                                <div class="col-12 col-sm-6 ">
                                                <div class="form-content">
                                                    <label class="form-label">Firstname<span style="color:red;">&nbsp;*</span></label>
                                                    <!-- /* Checking if the variable business_firstname is set. If it is, it will display
                                                    the value of the variable. If it is not set, it will display a blank input
                                                    field. */ -->
                                                    <?php if (isset($_GET['business_firstname'])){?>
                                                        <input name='business_firstname' id='businessfirstname' type="text" value="<?= $_GET['business_firstname']?>" oninput="checkbusiFname();" required >
                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                        <input name='business_firstname' id='businessfirstname' type="text" oninput="checkbusiFname();" required >
                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <div class="form-content">
                                                    <label class="form-label">Lastname<span style="color:red;">&nbsp;*</span></span></label>
                                                    <!-- /* Checking if the variable business_lastname is set. If it is, it will display
                                                    the value of the variable. If it is not set, it will display the placeholder. */ -->
                                                    <?php if (isset($_GET['business_lastname'])){?>
                                                            <input name='business_lastname' id='businesslastname' type="text" value="<?= $_GET['business_lastname']?>" oninput="checkbusiLname();" required >
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input name='business_lastname' id='businesslastname' type="text" oninput="checkbusiLname();" required >
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col-12 col-sm-6 mt-sm-0 ">
                                                    <div class="form-content">
                                                    <label class="form-label">Contact Number<span style="color:red;">&nbsp;*</span></span></label>
                                                    <!-- /* Checking if the variable business_phonenumber is set. If it is, it will display
                                                    the value of the variable. If it is not set, it will display a blank input
                                                    field. */ -->
                                                    <?php if (isset($_GET['business_phonenumber'])){?>
                                                            <input name='business_phonenumber' id='businessphonenumber' oninput="checkbusiNum();" type="text" value="<?= $_GET['business_phonenumber']?>" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input name='business_phonenumber' id='businessphonenumber' oninput="checkbusiNum();" type="text" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0 ">
                                                    <div class="form-content">
                                                    <label class="form-label">Email Address<span style="color:red;">&nbsp;*</span></span></label>
                                                    <!-- /* Checking if the business_email is set in the URL. If it is, it will display the
                                                    value in the input field. If it is not, it will display a blank input field. */ -->
                                                    <?php if (isset($_GET['business_email'])){?>
                                                            <input name='business_email' id='businessemail' oninput="checkbusiEmail();" type="email" value="<?= $_GET['business_email']?>" placeholder="sample@gmail.com" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input name='business_email' id='businessemail' oninput="checkbusiEmail();" type="email" placeholder="sample@gmail.com" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col ">
                                                    <div class="form-content">
                                                    <label class="form-label">Address<span style="color:red;">&nbsp;*</span></span></label>
                                                    <!-- /* Checking if the variable business_owneraddress is set. If it is, it will display
                                                    the value of the variable. If it is not set, it will display a blank input
                                                    field. */ -->
                                                    <?php if (isset($_GET['business_owneraddress'])){?>
                                                            <input class="form-control" name='business_owneraddress' id='businessowneraddress' oninput="checkownerAdd();" type="text" value="<?= $_GET['business_owneraddress']?>" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }else{?>
                                                            <input class="form-control" name='business_owneraddress' id='businessowneraddress' oninput="checkownerAdd();" type="text" required>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0 ">
                                                <div class="form-content">
                                                    <label class="form-label">Password</label>
                                                    <input name='business_password' id="businesspassword" oninput="checkBusiPassword();" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>
                                                    <div id="bpassValidation">
                                                        <h3>Password must contain the following:</h3>
                                                        <p id="letter" class="invalid">A lowercase letter</p>
                                                        <p id="capital" class="invalid">An Uppercase letter</p>
                                                        <p id="special" class="invalid">A Special Character (example:$@#&_!)</p>
                                                        <p id="number" class="invalid">A number</p>
                                                        <p id="length" class="invalid">Must be atleast 8 characters</b></p>
                                                    </div>
                                                    <input type="hidden" name="status" value = '0'>  
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0 ">
                                                    <div class="form-content">
                                                    <label class="form-label">Confirm Password</label>
                                                    <input name='business_confirmpassword' id='businessconfirmpassword' oninput="checkCOwnerPword();"  type="password" required>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="button-row d-flex mt-3 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Back</button>
                                                <button class="btn btn-success ml-auto" type="submit" name="business_register_btn" title="Send">Register</button>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>   
                                </form>
                            </div><p>Already have an account?<a href="ownerlogin.php">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <script>
//FOR PASSWORD VALIDATION
var bpassValidation = document.getElementById('bpassValidation');
var myInput = document.getElementById("businesspassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var special = document.getElementById("special");
var number = document.getElementById("number");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
document.getElementById("bpassValidation").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
document.getElementById("bpassValidation").style.display = "none";
}
function checkBusiPassword() {
    const busipasswordValue = businesspassword.value.trim();
    var PasswordValidation=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@#&_!])[a-zA-Z\d\$@#&_!]{8,}$/;
	// If password not entered
    if (busipasswordValue == ''){
	setErrorFor(password, 'Please Enter A Password');
	}else if (!PasswordValidation.test(busipasswordValue)){

	// When the user starts to type something inside the password field
	myInput.onkeyup = function() {
	// Validate Special Characters
	var lowerCaseLetters = /[a-z]/g;
  	if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  	} else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
	}

	// Validate capital letters
	var upperCaseLetters = /[A-Z]/g;
	if(myInput.value.match(upperCaseLetters)) {  
	capital.classList.remove("invalid");
	capital.classList.add("valid");
	} else {
	capital.classList.remove("valid");
	capital.classList.add("invalid");
	}

    // Validate Special Characters
	var specialCharacter = /[$@#&_!]/g;
	if(myInput.value.match(specialCharacter)) {  
	special.classList.remove("invalid");
	special.classList.add("valid");
	} else {
	special.classList.remove("valid");
	special.classList.add("invalid");
	}

	// Validate numbers
	var numbers = /[0-9]/g;
	if(myInput.value.match(numbers)) {  
	number.classList.remove("invalid");
	number.classList.add("valid");
	} else {
	number.classList.remove("valid");
	number.classList.add("invalid");
	}

	// Validate length
	if(myInput.value.length >= 8) {
	length.classList.remove("invalid");
	length.classList.add("valid");
	} else {
	length.classList.remove("valid");
	length.classList.add("invalid");
	}
    }
    setErrorFor(businesspassword, '');  
    }else{  

    setSuccessFor(businesspassword); 
    return true;
    }	
    // If same return True.

    }

        </script>
    <script  src="assets/js/function-for-registration.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    <?php if(isset($_SESSION['message'])) 
    { ?>
        swal({
            title: "<?= $_SESSION['message']; ?>",
            icon: "<?= $_SESSION['alert']; ?>",
            button: "Okay",
            timer: 10500,
            });
        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);
    }
    
    ?>
    </script>  
    <script type="text/javascript" src="map.js"></script>

</body>
</html>
    