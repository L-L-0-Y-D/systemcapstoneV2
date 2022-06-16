<?php 

session_start();

/* This is checking if the user is already logged in. If they are, it will redirect them to the index
page and display a message. */
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="reg.css">
    <title>Login | I-Eat</title>

</head>
<body >
    <main class="page registration-page">
        <section class="clean-block clean-form dark" style="height: 672px;background: transparent;">
                <img class="img-fluid d-flex d-lg-flex align-items-center m-auto" src="uploads/I-EatLogo.png" width="200px" height="200px" alt="logo" usemap="#workmap">
                    <map name="workmap">
                        <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
                    </map>
        <form method="post" action="functions/authcode.php" style="background: rgb(255, 128, 64);border-style: solid;border-color: rgb(255, 128, 64);border-radius: 20px;"> 
        <div class="container">
            <h2 class="d-flex justify-content-center" style="font-weight:bold;">LOGIN</h2>
            <div class="row">
                <div class="mb-3">
                        <label class="form-label" for="email" style="font-weight: bold;">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm item" style="font-size: 14px;height: 50px;" required/>
                </div>
            </div>
            <div class="row">
                <div class="mb-3">
                    <label class="form-label" for="password" style="font-weight: bold;">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-sm item" style="height: 50px;" required/>
                </div>
            </div>
                <button class="btn btn-primary d-flex d-xl-flex align-items-center m-auto" name='login_btn'style="background:black;color:white;border-style: none;border-bottom-style: none;padding-right: 15px;padding-left: 15px;font-size: 18px;padding-bottom: 7px;">LOGIN</button> <br>
                <!--link to connect with register php-->
                <a class="d-flex justify-content-center text-black" href="register.php">Create an account</a>
        </div>
        </form>
    </section>
</main>
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