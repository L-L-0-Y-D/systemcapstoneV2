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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=21f14b60305aa9b0449170550a54b7e5">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic.css?h=561e53509f5bc926993a2226fdbdf2f4">
    <link rel="stylesheet" href="assets/css/styles.css?h=d41d8cd98f00b204e9800998ecf8427e">
    <link rel="stylesheet" href="reg.css">
    <title>Login | I-Eat</title>

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>

</head>
<body >
<section class="position-relative py-4 py-xl-5">
        <div class="container" style="margin-top:50px;">
            <div class="row d-flex justify-content-center align-items-md-end">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5" style="border-style: none;">
                        <div class="card-body d-flex flex-column align-items-center" style="border-radius: 10px;border-style: solid;border-color: rgb(255, 128, 64);height: 480px;box-shadow: 0px 0px 18px var(--bs-gray);">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="height:110px; width:110px; border-style: solid;border-color: rgb(255, 128, 64);background: transparent;">
                                <picture><img src="uploads/I-EatLogo.png" style="width: 150px;height: 150px;" usemap=#workmap></picture>
                                <map name="workmap">
                                    <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                                </map>
                            </div>
                            <div class="btn-group btn-group-sm border rounded shadow-none d-flex flex-grow-1" role="group" style="margin-bottom: 30px;">
                                <button class="btn btn-primary" type="submit" onclick="location.href='ownerlogin.php'" style="background: transparent;color: var(--bs-dark);border-style: solid;border-color: rgb(255, 128, 64);">Business</button>
                                <button class="btn btn-primary active" type="submit" onclick="location.href='login.php'" style="border-color: rgb(255, 128, 64);color: var(--bs-dark);background: rgb(255, 128, 64);">Customer</button>
                            </div>
                            <form class="text-center" method="post" action="functions/authcode.php">
                                <div class="d-flex d-md-flex justify-content-end justify-content-md-end mb-3" style="text-align: left;border-bottom-width: 1px;border-bottom-style: solid;">
                                    <i class="fas fa-at d-md-flex justify-content-md-end align-items-md-end" style="height: 28px;width: 15px;opacity: 0.65;"></i>
                                    <input class="form-control" type="email" name="email" placeholder="Email" required style="width: 189px;text-align: left;border-style: none;border-bottom-style: none;padding-left: 7px;">
                                </div>
                                <div class="d-flex d-md-flex justify-content-end justify-content-md-end mb-3" style="border-bottom-width: 1px;border-bottom-style: solid;">
                                    <i class="fas fa-key d-md-flex align-items-md-end" style="width: 15px;height: 28px;opacity: 0.65;"></i>
                                    <input class="form-control" type="password" name="password" placeholder="Password" required style="width: 189px;border-style: none;border-bottom-style: none;padding-left: 7px;">
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100" type="submit" style="background: rgb(255, 128, 64);border-style: none;">Login</button>
                                </div>
                                <p class="text-muted" style="text-align: right;"><a href="forgetpassword.php" style="font-size: 15px;color: var(--bs-gray-600);">Forgot password?<br></a></p>
                            </form>
                            <p>Don't have an account?&nbsp;<a href="register.php" style="color: var(--bs-dark);font-weight: bold;">Sign Up</a>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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