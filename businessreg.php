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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>  
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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
                        </span>
                    </div>
                </nav>
        </div>
    </nav>
    <header class="header">
        <h1 class="header__title">Create a Business Account</h1>
        <!-- <button class="btn-lg btn-close float-end " onclick="location.href='index.php'"></button>-->
    </header>
    <div class="content">
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
                                        <h6 class="text-muted">All fields are required<span>&nbsp;*</span></h6><hr>
                                        <div class="multisteps-form__content">
                                            <div class="form-row mt-4">
                                                <div class="col-12 col-md-12 mb-3">
                                                    <label class="form-label">Upload your Business Logo (max 2mb)<span>&nbsp;*</span></label>
                                                    <input class="form-control" type="file" name="image" required>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <label class="form-label">Business Name<span>&nbsp;*</span></label>
                                                    <!-- /* Checking if the name is set, if it is, it will display the name in the input
                                                    field. If it is not set, it will display the input field without the name. */ -->
                                                    <?php if (isset($_GET['business_name'])){?>
                                                            <input class="multisteps-form__input " type="text" name="business_name" value="<?= $_GET['business_name']?>" required>
                                                    <?php }else{?>
                                                            <input class="multisteps-form__input form-control" type="text" name='business_name' required>
                                                    <?php }?>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <label class="form-label">Business Address<span>&nbsp;*</span></label>
                                                    <!-- /* Checking if the variable business_address is set. If it is, it will display the
                                                    value of the variable. If it is not set, it will display the placeholder. */ -->
                                                    <?php if (isset($_GET['business_address'])){?>
                                                            <input class="multisteps-form__input form-control" type="text" name="business_address" value="<?= $_GET['business_address']?>" required >
                                                    <?php }else{?>
                                                            <input class="multisteps-form__input form-control" type="text" name='business_address' required>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col-12 col-sm-6">
                                                    <label class="form-label">Opening Time<span>&nbsp;*</span></label>
                                                    <!-- /* Checking if the business name is set, if it is then it will display the business
                                                    name, if not then it will display the opening time. */ -->
                                                    <?php if (isset($_GET['opening'])){?>
                                                            <input class="multisteps-form__input form-control" type="time" name="opening" value="<?= $_GET['opening'] ?>"  required placeholder="Opening">
                                                    <?php }else{?>
                                                            <input class="multisteps-form__input form-control" type="time" name="opening"  required>
                                                    <?php }?>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <label class="form-label">Closing Time<span>&nbsp;*</span></label>
                                                    <?php if (isset($_GET['closing'])){?>
                                                            <input class="multisteps-form__input form-control" type="time" name="closing" value="<?= $_GET['closing'] ?>"  required placeholder="Opening">
                                                    <?php }else{?>
                                                            <input class="multisteps-form__input form-control" type="time" name="closing" required>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col">
                                                    <label class="form-label ">Cuisine Type<span>&nbsp;*</span></label>
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
                                                                                        <input class= "form-checkbox" required type="checkbox" style="margin-right:5px;" name="cuisinename[]" value="<?= $item['categoryname']; ?>"><?= $item['categoryname']; ?> </input>
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
                                            </div>
                                            <div class="button-row d-flex mt-3">
                                                <p>Already have an account?<a href="ownerlogin.php">Login</a></p>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FOR BUSINESS LOCATION-->
                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                        <h3 class="multisteps-form__title">Business Location</h3><hr>
                                        <div class="multisteps-form__content">
                                            <div class="form-row mt-3">
                                                <label class="form-label pt-2">Municipality where it's located<span>&nbsp;*</span></label>
                                                <!-- /* The above code is checking if the municipalityid is set. If it is set, it will
                                                display the municipalityid. If it is not set, it will display the
                                                municipalityid. */ -->
                                                <?php if (isset($_GET['municipalityid'])){?>
                                                    <div class="col">
                                                        <select class="form-select" name="municipalityid" style="margin-bottom: 10px;" required>
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
                                                            <select class="form-select" name="municipalityid" style="margin-bottom: 10px;" required>
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
                                                    <div class="form-row mt-3">
                                                        <div class="col">
                                                            <label class="form-label">Pin Location<span>&nbsp;*</span></label>
                                                            <!-- /* The above code is creating a map and pinning the location of the user. */ -->
                                                                <input type="hidden" id="address" name="address">
                                                                <input type="hidden" id="latitude" name="latitude">
                                                                <input type="hidden" id="longitude" name="longitude">
                                                            <div id="map" style=" height: 300px;"></div>
                                                        </div>
                                                    </div>                            
                                                    <div class="button-row d-flex mt-4">
                                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Back</button>
                                                        <p>Already have an account?<a href="ownerlogin.php">Login</a></p>
                                                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                                    </div>
                                            </div>
                                        </div>
                                        <!--FOR BUSINESS PERMITS-->
                                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                            <h3 class="multisteps-form__title">Business Permits</h3><hr>
                                            <div class="multisteps-form__content">
                                            <div class="row">
                                                <div class="col-12 col-md-12 mt-3">
                                                    <label class="form-label">Upload your DTI Business Permit (max 2mb)<span>&nbsp;*</span></label>
                                                    <input class="form-control" name="image_cert" type="file" required>
                                                </div>
                                                <div class="col-12 col-md-12 mt-3">
                                                    <label class="form-label">Upload your Sanitary Permit (max 2mb)<span>&nbsp;*</span></label>
                                                    <input class="form-control" name="image_scert" type="file" required>
                                                </div> 
                                                <div class="col-12 col-md-12 mt-3">
                                                    <label class="form-label">Upload your Fire Safety Permit (max 2mb)<span>&nbsp;*</span></label>
                                                    <input class="form-control" name="image_fscert" type="file" required>
                                                </div> 
                                                <div class="col-12 col-md-12 mt-3">
                                                    <label class="form-label">Upload your Brgy. Clearance Permit (max 2mb)<span>&nbsp;*</span></label>
                                                    <input class="form-control" name="image_bccert" type="file" required>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Back</button>
                                                <p>Already have an account?<a href="ownerlogin.php">Login</a></p>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--FOR OWNER INFO-->
                                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                            <h3 class="multisteps-form__title">Owner's Info</h3><hr>
                                            <div class="multisteps-form__content">
                                            <div class="form-row mt-3">
                                                <div class="col-12 col-sm-6">
                                                    <label class="form-label">Firstname<span>&nbsp;*</span></label>
                                                    <!-- /* Checking if the variable business_firstname is set. If it is, it will display
                                                    the value of the variable. If it is not set, it will display a blank input
                                                    field. */ -->
                                                    <?php if (isset($_GET['business_firstname'])){?>
                                                        <input class="form-control" name='business_firstname' type="text" value="<?= $_GET['business_firstname']?>" required >
                                                    <?php }else{?>
                                                            <input class="form-control" name='business_firstname' type="text" required >
                                                    <?php }?>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <label class="form-label">Lastname<span>&nbsp;*</span></label>
                                                    <!-- /* Checking if the variable business_lastname is set. If it is, it will display
                                                    the value of the variable. If it is not set, it will display the placeholder. */ -->
                                                    <?php if (isset($_GET['business_lastname'])){?>
                                                            <input class="form-control" name='business_lastname' type="text" value="<?= $_GET['business_lastname']?>" required >
                                                    <?php }else{?>
                                                            <input class="form-control" name='business_lastname' type="text" required >
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col-12 col-sm-6 mt-sm-0">
                                                    <label class="form-label">Contact Number<span>&nbsp;*</span></label>
                                                    <!-- /* Checking if the variable business_phonenumber is set. If it is, it will display
                                                    the value of the variable. If it is not set, it will display a blank input
                                                    field. */ -->
                                                    <?php if (isset($_GET['business_phonenumber'])){?>
                                                            <input class="form-control" name='business_phonenumber' type="text" value="<?= $_GET['business_phonenumber']?>" required>
                                                    <?php }else{?>
                                                            <input class="form-control" name='business_phonenumber' type="text" required>
                                                    <?php }?>
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <label class="form-label">Email Address<span>&nbsp;*</span></label>
                                                    <!-- /* Checking if the business_email is set in the URL. If it is, it will display the
                                                    value in the input field. If it is not, it will display a blank input field. */ -->
                                                    <?php if (isset($_GET['business_email'])){?>
                                                            <input class="form-control" name='business_email' type="email" value="<?= $_GET['business_email']?>" placeholder="sample@gmail.com" required>
                                                    <?php }else{?>
                                                            <input class="form-control" name='business_email' type="email" placeholder="sample@gmail.com" required>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col">
                                                    <label class="form-label">Address<span>&nbsp;*</span></label>
                                                    <!-- /* Checking if the variable business_owneraddress is set. If it is, it will display
                                                    the value of the variable. If it is not set, it will display a blank input
                                                    field. */ -->
                                                    <?php if (isset($_GET['business_owneraddress'])){?>
                                                            <input class="form-control" name='business_owneraddress' type="text" value="<?= $_GET['business_owneraddress']?>" required>
                                                    <?php }else{?>
                                                            <input class="form-control" name='business_owneraddress' type="text" required>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <label class="form-label">Password<span>&nbsp;*</span></label>
                                                    <input class="form-control" name='business_password' type="password" required>     
                                                    <input type="hidden" name="status" value = '0'>  
                                                </div>
                                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                    <label class="form-label">Confirm Password<span>&nbsp;*</span></label>
                                                    <input class="form-control" name='business_confirmpassword' type="password" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="button-row d-flex mt-3 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Back</button>
                                                <p>Already have an account?<a href="ownerlogin.php">Login</a></p>
                                                <button class="btn btn-success ml-auto" type="submit" name="business_register_btn" title="Send">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
