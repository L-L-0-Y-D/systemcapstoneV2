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
    <link rel="stylesheet" href="reg.css"> 
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

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body>
    <div class="container" >
        <div class="row d-flex justify-content-center align-items-md-end">
            <div class="col-md-6 col-xl-4" style="margin-top:150px;">
            <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $user = getByID("users",$id,"userid");

                if(mysqli_num_rows($user) > 0)
                {
                    $data = mysqli_fetch_array($user)
                    
                
                ?>
                <div class="card mb-5" style="border-style:none;">
                    <div class="card-body d-flex flex-column align-items-center" style="border-radius: 10px;border-style: solid;border-color: rgb(255, 128, 64);box-shadow: 0px 0px 18px var(--bs-gray);">
                        <form action="functions/authcode.php" method="POST"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mt-1">
                                        <a href="index.php" class="btn btn-primary float-end" style="background-color:rgb(255,128,64); border:none;">Back</a>
                                    </h4>   
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                    <label for="">Enter Current Password</label>
                                    <input type="password" name="oldpassword"  class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="mt-2">Enter New Password</label>
                                    <input type="password" name="password"  class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="mt-2">Confirm New Password</label>
                                    <input type="password" name="confirmpassword"  class="form-control" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary mt-2" name="edit_password_btn" style="background-color:rgb(255,128,64); border:none;">Update Password</button>
                                </div>
                                </div>
                        </form>
                    </div>
                </div>
                <?php
                }
                else
                {
                    echo "User not Found";
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
