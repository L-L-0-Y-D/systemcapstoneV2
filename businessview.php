<?php

    include('functions/userfunctions.php');
    if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $business = getByIDActives("business",$id,"businessid");

                if(mysqli_num_rows($business) > 0)
                    {
                        $data = mysqli_fetch_array($business);
                        $bid = $data['businessid'];
                        $product = getProductByBusiness($bid);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css"> 
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Akaya%20Kanadaka.css">
    <link rel="stylesheet" href="assets/css/Alata.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/assets/css/vanilla-zoom.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <title>I-Eat | Home </title> 
</head>
<header style="height:100px;">
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
                        if($_SESSION['auth_user']['role_as'] == "0")
                        {
                        ?>
                                            
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['name'];?></strong> !</h2>
                            <a href="your_reservation.php">Your Reservation</a>
                            <a href="profile.php?id=<?= $_SESSION['auth_user']['userid'];?>">Your Profile</a>
                            <a href="logout.php">Logout</a>

                        <?php
                        }
                        else if($_SESSION['auth_user']['role_as'] == "2")
                        {
                            ?>
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['business_name'];?></strong> !</h2>
                            <a href="business/index.php?id=<?= $_SESSION['auth_user']['businessid'];?>">Dashboard</a>
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
                </header>
<main class="page product-page">
        <section class="clean-block clean-product">
            <div class="container" style="width: auto; height:auto;">
            <div class="block-content" style="width: auto;padding-top: 0px; ">
                <div class="block-heading" style="padding-top: 50px;margin-bottom: 9px;">
                    <div class="col-md-12 d-xxl-flex justify-content-xxl-center" style="height: 500px;"><img class="img-fluid d-flex align-self-center justify-content-xl-start justify-content-xxl-center" style="width: 1100px;height: 500px;margin-top: 0px;box-shadow: 0px 0px 10px var(--bs-gray);border-radius: 5px;margin-bottom: 0px;" src="uploads/<?= $data['image']; ?>" width="200px" height="200px" loading="auto"></div>
                </div>
                
                    <div class="row" style="padding-top: 10px;">
                        <div class="col-md-12" style="width: 1024px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;font-family: Alata, sans-serif;width: 1000px;height: 40px;"><strong><?= $data['business_name']; ?></strong></h1>
                        </div>
                        <div class="col-md-12" style="width: 1024px;font-size: 14px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;font-family: Actor, sans-serif;width: 1000px;font-size: 20px;color: var(--bs-gray);height: 20px;"><strong><?= $data['categoryid']; ?></strong></h1>
                        </div>
                        <div class="col-md-12" style="width: 1024px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;font-family: Actor, sans-serif;width: 1000px;font-size: 23px;color: var(--bs-gray);height: 24px;"><strong><?= $data['business_address']; ?></strong></h1>
                        </div>
                        <div class="col-md-12" style="width: 1024px;margin-top: 10px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;font-family: Alata, sans-serif;width: 1000px;font-size: 30px;color: var(--bs-gray);margin-top: 21px;">
                                <div class="btn-group" role="group" style="width: 319.094px;font-size: 16px;"><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'" style="margin-right: 24px;font-size: 16px;font-family: Alata, sans-serif;background: var(--bs-orange);border-radius: 10px;height: 45px;border-style: none;border-bottom-style: none;text-align: center;">Make Reservation</button><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-right: 24px;font-size: 16px;font-family: Alata, sans-serif;background: var(--bs-white);color: var(--bs-dark);border-radius: 10px;height: 45px;border: 2px solid var(--bs-gray-900);border-bottom-color: var(--bs-dark);text-align: center;">Add Review</button></div><br>
                            </h1>
                        </div>
                    </div>
                    <div class="product-info">
                        <div style="margin-top: 27px;">
                            <ul class="nav nav-tabs" role="tablist" id="myTab">
                                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" id="description-tab" href="#description">Menu</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" id="specifications-tabs" href="#reviews">Reviews</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" id="reviews-tab" href="#specifications">Location</a></li>
                            </ul>
                            <div class="tab-content text-start d-xxl-flex justify-content-xxl-center align-items-xxl-center" id="myTabContent">
                                <div class="tab-pane fade show active flex-column description" role="tabpanel" id="description" style="margin-right: 50px;margin-left: 50px;padding-top: 40px;">
                                    <div class="row d-flex justify-content-center align-items-lg-center" style="margin-left: 0px;margin-right: 0px;text-align: left;">
                                        <div class="col-md-9 d-flex justify-content-center" style="width: 960px;margin-left: 0px;margin-right: 0px;">
                                            <div class="products">
                                                <div class="row g-0" style="padding: 0px;margin-left: 10px;">
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                        <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                            {
                                                                foreach($product as $item)
                                                                {
                                                                    ?>
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="uploads/<?= $item['image']; ?>"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong><?= $item['name']; ?></strong></a></div><small><?= $item['description']; ?></small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">₱<?= $item['price']; ?></strong>
                                                            <?php
                                                                }
                                                            }
                                                            else
                                                            {
                                                                echo "No Menu Available";
                                                            }?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade specifications" role="tabpanel" id="specifications"><div class="mapouter"><div class="gmap_canvas"><iframe width="913" height="598" id="gmap_canvas" src="https://maps.google.com/maps?q=<?= $data['business_address']; ?>&t=k&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:598px;width:913px;}</style><a href="https://www.embedgooglemap.net">embed code for google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:598px;width:913px;}</style></div></div></div>
                                <div class="tab-pane fade" role="tabpanel" id="reviews">
                                    <div class="container">
                                        <div class="card">
                                            <div class="card-header">Restaurant Feedback</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4 text-center">
                                                        <h1 class="text-warning mt-4 mb-4">
                                                            <b><span id="average_rating">0.0</span> / 5</b>
                                                        </h1>
                                                        <div class="mb-3">
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                                        </div>
                                                        <h3><span id="total_review">0</span> Review</h3>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p>
                                                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                                            </div>
                                                        </p>
                                                        <p>
                                                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                                                            
                                                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                                            </div>               
                                                        </p>
                                                        <p>
                                                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                                                            
                                                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                                            </div>               
                                                        </p>
                                                        <p>
                                                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                                                            
                                                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                                            </div>               
                                                        </p>
                                                        <p>
                                                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                                                            
                                                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                                            </div>               
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-4 text-center">
                                                        <h3 class="mt-4 mb-3">Write Review Here</h3>
                                                        <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5" id="review_content"></div>
                                    </div>
                                    
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
            echo "Data not found";
            ?>
            <br><a href="index.php">Go Back</a>
            <?php
        }
    }
    else
    {
        echo "Something Went Wrong";
        ?>
        <br><a href="index.php">Go Back</a>
        <?php
    }

include('includes/footer.php');?>
