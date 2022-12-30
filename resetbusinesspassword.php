<?php 
session_start();
/* This is checking if the user is already logged in. If they are, it will redirect them to the index
page and display a message. */
if(!isset($_GET['token']))
{   
    $_SESSION['message'] = "token missing from url";
    $_SESSION['status'] = "error";
    header('Location: '."index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="reg.css">
    <title>Reset Password | I-Eat</title>

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>

</head>
<body >
    <div class="container" >
        <div class="row d-flex justify-content-center align-items-md-end">
            <div class="col-md-6 col-xl-4" style="margin-top:150px;">
                <div class="card mb-5" style="border-style:none;">
                    <div class="card-body d-flex flex-column align-items-center" style="border-radius: 10px;border-style: solid;border-color: rgb(255, 128, 64);box-shadow: 0px 0px 18px var(--bs-gray);">
                        <form method="post" action="functions/authcode.php" > 
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mt-1">
                                        <a href="index.php" class="btn btn-primary float-end" style="background-color:rgb(255,128,64); border:none;">Back</a>
                                    </h4>   
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label"style="font-weight: bold;">New Password</label>
                                    <input type="password" name="business_password" id="password" class="form-control form-control-sm item" style="font-size: 14px;height: 50px;" required/>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" style="font-weight: bold;">Confirm Password</label>
                                    <input type="password" name="business_confirmpassword" id="confirmpassword" class="form-control form-control-sm item" style="font-size: 14px;height: 50px;" required/>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100" type="submit" name="reset" style="background: rgb(255, 128, 64);border-style: none;">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        <?php if(isset($_SESSION['message'])) 
    { ?>
        swal({
            title: "<?= $_SESSION['message']; ?>",
            icon: "<?= $_SESSION['alert']; ?>",
            button: "Okay",
            timer: 15000,
            });

        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);
    }
    ?> 
    </script> 
</body>
</html>