<?php

    include('middleware/userMiddleware.php');
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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/assets/css/vanilla-zoom.min.css">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="businessreg.css">
    <title>I-Eat | Home </title> 
</head>
<body>
<div class="container py-3">
  <div class="row">
    <div class="col-md-12">
        <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $user = getByID("users",$id,"userid");

            if(mysqli_num_rows($user) > 0)
            {
                $data = mysqli_fetch_array($user)
                
            
            ?>
            <div class="card">
                <div class="card-header fw-bold" >
                <h4 class="mt-1">Profile<span> <a href="index.php" class="btn btn-primary float-end" style="background-color:rgb(255,128,64); border:none;">Back</a></span></h4>
                </div>
                <div class="card-body">
                    <form action="functions/authcode.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-md-12">
                                <label for="">Current Image</label>
                                <img src="uploads/<?= $data['image'] ?>" height="50px" width="50px">
                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>"><br>
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control"><br>
                            </div>
                            <div class="col-md-6">
                                <!--Needed-->
                                <label for="">Username</label>
                                <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                <input type="text" name="name" value="<?= $data['name'] ?>" required placeholder="Enter Username" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" >Email</label>
                                <input type="email" name="email" value="<?= $data['email'] ?>" required placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mt-2">First Name</label>
                                <input type="text" name="firstname" value="<?= $data['firstname'] ?>" required placeholder="Enter First Name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mt-2">Last Name</label>
                                <input type="text" name="lastname" value="<?= $data['lastname'] ?>" required placeholder="Enter Last Name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mt-2">Age</label>
                                <input type="number" name="age" value="<?= $data['age'] ?>" required placeholder="Enter Age" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mt-2">Phone Number</label>
                                <input type="text" name="phonenumber" value="<?= $data['phonenumber'] ?>" required placeholder="Enter Phone Number" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="" class="mt-2">Address</label>
                                <input type="text" name="address" value="<?= $data['address'] ?>" required placeholder="Enter Address" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="" class="mt-2">Password</label>
                                <input type="password" name="password" required placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <input type = "hidden" name='role_as' value = '0'>
                            </div>
                            <div class="col-md-12">
                            <input type="hidden" name="status" <?= $data['status'] == '0'? 'checked':'' ?>>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary mt-2" name="update_profile_btn" style="background-color:rgb(255,128,64); border:none;">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            }
            else
            {
                echo "Users not Found";
            }
        }
        else
        {
           echo"ID missing from url";
        }
            ?>
    </div>
  </div>  
</div>
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
