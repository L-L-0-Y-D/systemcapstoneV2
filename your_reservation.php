<?php
include('middleware/userMiddleware.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $reservations = reservationGetByID($id);
    

    if(mysqli_num_rows($reservations) > 0)
    {
        $data = mysqli_fetch_array($reservations);
        $result_waiting = reservationGetByIDWaiting($id);
        $result_approved = reservationGetByIDApproved($id);
        $result_declined= reservationGetByIDDeclined($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/css/Acme.css">
    <link rel="stylesheet" href="assets/css/Aldrich.css">
    <link rel="stylesheet" href="assets/css/Amaranth.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=21f14b60305aa9b0449170550a54b7e5">
    <title>I-Eat | Reservation Table </title> 

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body>
        <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
            <div class="container ml-2">
                <a class="navbar-brand" href="index.php" style="color: white;font-size: 28px;">My Reservations</a>
                <nav class="navbar navbar-expand">
                    <div class="container-fluid">
                        <span class="bs-icon-md d-flex justify-content-center align-items-center me-2 bs-icon" style="background: transparent;">
                        <a href="index.php"><i class="fa fa-home" style="float:right; color:white;"></i></a>
                        </span></div>
                </nav>
            </div>
        </nav>
        <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="text-center block-content" style="padding-top: 40px;height: auto;">
                    <div class="product-info">
                        <div>
                            <ul class="nav nav-pills nav-fill text-center" role="tablist" id="myTab" style="border-bottom-width: 1px;border-bottom-style: solid;border-left-width: 1px;border-left-style: none;">
                                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="pill" id="description-tab" href="#all" style="border-right-style: solid;">ALL</a></li>
                                <li class="nav-item" role="presentation" style="border-left-width: 1px;border-left-style: solid;"><a class="nav-link " role="tab" data-bs-toggle="pill" id="specifications-tab" href="#waiting">WAITING</a></li>
                                <li class="nav-item" role="presentation" style="border-left-width: 1px;border-left-style: solid;"><a class="nav-link" role="tab" data-bs-toggle="pill" id="specifications-tabs" href="#approved">APPROVED</a></li>
                                <li class="nav-item" role="presentation" style="border-left-width: 1px;border-left-style: solid;"><a class="nav-link " role="tab" data-bs-toggle="pill" id="reviews-tab" href="#declined">DECLINED</a></li>
                                <li class="nav-item" role="presentation" style="border-left-width: 1px;border-left-style: solid;"><a class="nav-link " role="tab" data-bs-toggle="pill" id="reviews-tab" href="#cancelled">CANCELLED</a></li>
                            </ul>
							
                            <div class="tab-content" id="myTabContent">

                                <!-- All -->
                                <div class="tab-pane fade show active description" role="tabpanel" id="all" style="padding-top: 20px;">
                                    <p style="font-size: 30px;font-family: Acme, sans-serif;font-weight: bold;text-align: left;margin-bottom: 30px;">All</p>
									<?php 

									// $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
									if(mysqli_num_rows($result_waiting) > 0)
                                    {  
                                        foreach($result_waiting as $data)
                                        {
                                         
									?>
                                    <div class="row" style="border-radius: 15px;border-width: 2px;border-style: solid;">
                                        <div class="col-md-5" style="border-right-width: 2px;border-right-style: solid;">
                                            <img class="img-fluid" src="uploads/<?= $data['image']; ?>" style="height: 90%;padding-top: 20px;">
                                        </div>
                                        <div class="col-md-7" style="text-align:left;">
                                            <h3 style="font-family: Amaranth, sans-serif;margin-bottom: 3px;margin-top: 15px;font-size: 24px;"><?= $data['business_name']; ?></h3>
                                            <div class="info">
                                                <span class="text-muted" style="font-weight: bold;font-family: Aldrich, sans-serif;">Table Number</span>
                                            </div>
                                                <p style="color:red; margin-bottom: 10px;"for="quantity"><strong>STATUS :&nbsp;<?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}  ?></strong></p>
                                                <p style="margin-bottom: 0px;">RESERVATION DATE:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_date']; ?></span></p>
                                                <p style="margin-bottom: 0px;">RESERVATION TIME:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_time']; ?></span></p>
                                                <p style="margin-bottom: 0px;">NUMBER OF GUEST:<span class="value" style="font-weight:bold; padding-left: 6px;"><?= $data['numberofguest'];?>&nbsp;persons</span></p>
                                                <p style="margin-bottom: 0px;">CUSTOMER NAME:<span style="font-weight:bold; padding-left: 17px;"><?= $data['namereserveunder']; ?></span></p>
                                                <p style="margin-bottom: 0px;">EMAIL ADDRESS:<span class="value" style="font-weight:bold; padding-left: 30px;"><?= $data['reservation_email']; ?></span></p>
                                                <p style="margin-bottom: 0px;">CONTACT NUMBER:&nbsp;<span class="value" style="font-weight:bold; padding-left: 4px;"><?= $data['reservation_phonenumber']; ?></span></p>
                                            </div>
                                    </div>
									<?php
                                           }
                                    }
                                    else
                                    {
                                        echo "No Data";
                                    }	
                                        
									?>
                                </div>

                                <!-- Waiting -->
                                <div class="tab-pane fade description" role="tabpanel" id="waiting" style="padding-top: 20px;">
                                    <p style="font-size: 30px;font-family: Acme, sans-serif;font-weight: bold;text-align: left;margin-bottom: 30px;">Waiting</p>
									<?php 

									// $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
									if(mysqli_num_rows($result_waiting) > 0)
                                    {  
                                        foreach($result_waiting as $data)
                                        {
                                         
									?>
                                    <div class="row" style="border-radius: 15px;border-width: 2px;border-style: solid;">
                                        <div class="col-md-5" style="border-right-width: 2px;border-right-style: solid;">
                                            <img class="img-fluid" src="uploads/<?= $data['image']; ?>" style="height: 90%;padding-top: 20px;">
                                        </div>
                                        <div class="col-md-7" style="text-align:left;">
                                            <h3 style="font-family: Amaranth, sans-serif;margin-bottom: 3px;margin-top: 15px;font-size: 24px;"><?= $data['business_name']; ?></h3>
                                            <div class="info">
                                                <span class="text-muted" style="font-weight: bold;font-family: Aldrich, sans-serif;">Table Number</span>
                                            </div>
                                                <p style="color:yellow; margin-bottom: 10px;"for="quantity"><strong>STATUS :&nbsp;<?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}  ?></strong></p>
                                                <p style="margin-bottom: 0px;">RESERVATION DATE:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_date']; ?></span></p>
                                                <p style="margin-bottom: 0px;">RESERVATION TIME:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_time']; ?></span></p>
                                                <p style="margin-bottom: 0px;">NUMBER OF GUEST:<span class="value" style="font-weight:bold; padding-left: 6px;"><?= $data['numberofguest'];?>&nbsp;persons</span></p>
                                                <p style="margin-bottom: 0px;">CUSTOMER NAME:<span style="font-weight:bold; padding-left: 17px;"><?= $data['namereserveunder']; ?></span></p>
                                                <p style="margin-bottom: 0px;">EMAIL ADDRESS:<span class="value" style="font-weight:bold; padding-left: 30px;"><?= $data['reservation_email']; ?></span></p>
                                                <p style="margin-bottom: 0px;">CONTACT NUMBER:&nbsp;<span class="value" style="font-weight:bold; padding-left: 4px;"><?= $data['reservation_phonenumber']; ?></span></p>
                                            </div>
                                    </div>
									<?php
                                           }
                                    }
                                    else
                                    {
                                        echo "No Data";
                                    }	
                                        
									?>
                                </div>
                                
								<!-- Approved -->
                                <div class="tab-pane fade description" role="tabpanel" id="approved" style="padding-top: 20px;">
                                    <p style="font-size: 30px;font-family: Acme, sans-serif;font-weight: bold;text-align: left;margin-bottom: 30px;">Approved</p>
									<?php 
                                    if(mysqli_num_rows($result_approved) > 0)
                                    { 
                                        // $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
                                        
                                        foreach($result_approved as $data)
                                        {
										
									?>
                                    <div class="row mb-3" style="border-radius: 15px;border-width: 2px;border-style: solid;">
                                        <div class="col-md-5 " style="border-right-width: 2px;border-right-style: solid;">
                                            <img class="img-fluid" src="uploads/<?= $data['image']; ?>" style="height: 90%;padding-top: 20px;">
                                        </div>
                                        <div class="col-md-7" style="text-align:left;">
                                            <h3 style="font-family: Amaranth, sans-serif;margin-bottom: 3px;margin-top: 15px;font-size: 24px;"><?= $data['business_name']; ?></h3>
                                            <div class="info">
                                                <span class="text-muted" style="font-weight: bold;font-family: Aldrich, sans-serif;">Table Number</span>
                                            </div>
                                                <p style="color:green; margin-bottom: 10px;"for="quantity"><strong>STATUS :&nbsp;<?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}  ?></strong></p>
                                                <p style="margin-bottom: 0px;">RESERVATION DATE:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_date']; ?></span></p>
                                                <p style="margin-bottom: 0px;">RESERVATION TIME:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_time']; ?></span></p>
                                                <p style="margin-bottom: 0px;">NUMBER OF GUEST:<span class="value" style="font-weight:bold; padding-left: 6px;"><?= $data['numberofguest'];?>&nbsp;persons</span></p>
                                                <p style="margin-bottom: 0px;">CUSTOMER NAME:<span style="font-weight:bold; padding-left: 17px;"><?= $data['namereserveunder']; ?></span></p>
                                                <p style="margin-bottom: 0px;">EMAIL ADDRESS:<span class="value" style="font-weight:bold; padding-left: 30px;"><?= $data['reservation_email']; ?></span></p>
                                                <p style="margin-bottom: 0px;">CONTACT NUMBER:&nbsp;<span class="value" style="font-weight:bold; padding-left: 4px;"><?= $data['reservation_phonenumber']; ?></span></p>
                                                <button class="btn btn-primary mb-3 mt-3" type="submit" name="add_review" id="add_review" style="background: rgb(255,128,64);font-family: Acme, sans-serif;color: white;border-style: none;margin-left: 15px;">ADD REVIEW</button>
                                        </div>
                                    </div>
                                   
									<?php
                                                                               
                                        }
                                    ?>
                                    
                                    <?php

                                    }
                                    else
                                    {
                                        echo "No Data";
                                    }
										
                                        
									?>
                                    <!-- /* A modal that is used to submit a review. */ -->
                                    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            
                                                            <h5 class="modal-title text-center">Submit Review</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="text-center mt-2 mb-4">
                                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                            </h4>
                                                            <div class="form-group">
                                                                <input type="hidden" name="userid" id="userid" value="<?= $_SESSION['auth_user']['userid'];?>">
                                                                <input type="hidden" name="businessid" id="businessid" value="<?= $data['businessid'] ?>">
                                                                <input type="text" readonly name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" value="<?= $_SESSION['auth_user']['name']?>" />
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                                                            </div>
                                                            <div class="form-group text-center mt-4">
                                                                <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                                <!-- Declined -->
                                <div class="tab-pane fade description" role="tabpanel" id="declined" style="padding-top: 20px;">
                                    <p style="font-size: 30px;font-family: Acme, sans-serif;font-weight: bold;text-align: left;margin-bottom: 30px;">Declined</p>
									<?php 
									// $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
									if(mysqli_num_rows($result_declined) > 0)
                                    { 	
										foreach($result_declined as $data)
										{
											
									?>
                                    <div class="row" style="border-radius: 15px;border-width: 2px;border-style: solid;">
                                        <div class="col-md-5" style="border-right-width: 2px;border-right-style: solid;">
                                            <img class="img-fluid" src="uploads/<?= $data['image']; ?>" style="height: 90%;padding-top: 20px;">
                                        </div>
                                        <div class="col-md-7" style="text-align:left;">
                                            <h3 style="font-family: Amaranth, sans-serif;margin-bottom: 3px;margin-top: 15px;font-size: 24px;"><?= $data['business_name']; ?></h3>
                                            <div class="info">
                                                <span class="text-muted" style="font-weight: bold;font-family: Aldrich, sans-serif;">Table Number</span>
                                            </div>
                                                <p style="color:orange; margin-bottom: 10px;"for="quantity"><strong>STATUS :&nbsp;<?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}  ?></strong></p>
                                                <p style="margin-bottom: 0px;">RESERVATION DATE:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_date']; ?></span></p>
                                                <p style="margin-bottom: 0px;">RESERVATION TIME:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_time']; ?></span></p>
                                                <p style="margin-bottom: 0px;">NUMBER OF GUEST:<span class="value" style="font-weight:bold; padding-left: 6px;"><?= $data['numberofguest'];?>&nbsp;persons</span></p>
                                                <p style="margin-bottom: 0px;">CUSTOMER NAME:<span style="font-weight:bold; padding-left: 17px;"><?= $data['namereserveunder']; ?></span></p>
                                                <p style="margin-bottom: 0px;">EMAIL ADDRESS:<span class="value" style="font-weight:bold; padding-left: 30px;"><?= $data['reservation_email']; ?></span></p>
                                                <p style="margin-bottom: 0px;">CONTACT NUMBER:&nbsp;<span class="value" style="font-weight:bold; padding-left: 4px;"><?= $data['reservation_phonenumber']; ?></span></p>
                                            </div>
                                    </div>
									<?php
                                        }
									}
                                    else
                                    {
                                        echo "No Data";
                                    }
                                        
									?>
                                </div>
								
								<!-- Cancelled -->
                                <div class="tab-pane fade description" role="tabpanel" id="cancelled" style="padding-top: 20px;">
                                    <p style="font-size: 30px;font-family: Acme, sans-serif;font-weight: bold;text-align: left;margin-bottom: 30px;">Cancelled</p>
									<?php 
									// $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
									if(mysqli_num_rows($result_declined) > 0)
                                    { 	
										foreach($result_declined as $data)
										{
											
									?>
                                    <div class="row" style="border-radius: 15px;border-width: 2px;border-style: solid;">
                                        <div class="col-md-5" style="border-right-width: 2px;border-right-style: solid;">
                                            <img class="img-fluid" src="uploads/<?= $data['image']; ?>" style="height: 90%;padding-top: 20px;">
                                        </div>
                                        <div class="col-md-7" style="text-align:left;">
                                            <h3 style="font-family: Amaranth, sans-serif;margin-bottom: 3px;margin-top: 15px;font-size: 24px;"><?= $data['business_name']; ?></h3>
                                            <div class="info">
                                                <span class="text-muted" style="font-weight: bold;font-family: Aldrich, sans-serif;">Table Number</span>
                                            </div>
                                                <p style="color:red; margin-bottom: 10px;"for="quantity"><strong>STATUS :&nbsp;<?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}  ?></strong></p>
                                                <p style="margin-bottom: 0px;">RESERVATION DATE:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_date']; ?></span></p>
                                                <p style="margin-bottom: 0px;">RESERVATION TIME:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_time']; ?></span></p>
                                                <p style="margin-bottom: 0px;">NUMBER OF GUEST:<span class="value" style="font-weight:bold; padding-left: 6px;"><?= $data['numberofguest'];?>&nbsp;persons</span></p>
                                                <p style="margin-bottom: 0px;">CUSTOMER NAME:<span style="font-weight:bold; padding-left: 17px;"><?= $data['namereserveunder']; ?></span></p>
                                                <p style="margin-bottom: 0px;">EMAIL ADDRESS:<span class="value" style="font-weight:bold; padding-left: 30px;"><?= $data['reservation_email']; ?></span></p>
                                                <p style="margin-bottom: 0px;">CONTACT NUMBER:&nbsp;<span class="value" style="font-weight:bold; padding-left: 4px;"><?= $data['reservation_phonenumber']; ?></span></p>
                                            </div>
                                    </div>
									<?php
                                        }
									}
                                    else
                                    {
                                        echo "No Data";
                                    }
                                        
									?>
                                </div>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
        }
        else
        {
            redirect("index.php", "No Reservation Found");
        }
    }
    else
    {
    redirect("index.php", "ID Missing from the URL");
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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

<?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $business = getByID("business",$id,"businessid");

            if(mysqli_num_rows($business) > 0)
            {
                $data = mysqli_fetch_array($business);
                
            
            ?>

<!-- <div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
                
	        	<h5 class="modal-title text-center">Submit Review</h5>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
                    <input type="text" name="userid" id="userid" value="<?= $_SESSION['auth_user']['userid'];?>">
                    <input type="text" name="businessid" id="businessid" value="<?= $data['businessid'] ?>">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" value="<?= $_SESSION['auth_user']['name']?>" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div> -->

<?php
            }
        
            ?>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });
    

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){
        
        var userid = $('#userid').val();

        var businessid = $('#businessid').val();

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            // $_SESSION['Please Fill Both Field'];
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php?id=<?= $id; ?>",
                method:"POST",
                data:{rating_data:rating_data, userid:userid, businessid:businessid, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        
        $.ajax({
            url:"submit_rating.php?id=<?= $id; ?>",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="card-header"><b>'+data.review_data[count].businessid+'</b></div>';

                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);

                }
            }
        })
        // $.ajax({
        //         url:"submit_rating.php",
        //         method:"GET",
        //         data:{businessid:businessid},
        //         success:function(data)
        //         {
        //             $('#review_modal').modal('hide');

        //             load_rating_data();

        //             alert(data);
        //         }
        //     })
    }

});


</script>

<?php

        }
?>
