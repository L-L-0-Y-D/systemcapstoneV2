<?php 
session_start();
/* This is checking if the user is already logged in. If they are, it will redirect them to the index
page and display a message. */
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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Forgot Password | I-Eat</title>
    <style>
        .login {
            background-image: url(uploads/layout1.jpg)!important;
            background-attachment:fixed;
            background-position:center;
            background-repeat: no-repeat;
            background-size: cover;
            height:100%; 
           
            }
    </style>
    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>

</head>
<body >
    <section class="login">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body flex-column">
                            <form method="post" action="functions/authcode.php"> 
                                <div class="row d-flex">
                                    <div class="mb-2">
                                            <button class="btn btn-sm btn-close float-end" onclick="location.href='login.php'"></button>
                                    </div>
                                    <p class="text-center fs-5">Forget Password?</p>
                                    <p class="text-left">Enter the email associated with your account and we'll send you a reset link.</p>
                                    <div class="mb-1">
                                        <label class="form-label" for="email">Enter your Email Address</label>
                                        <input type="email" name="email" id="email" class="form-control mb-3" required/>
                                    </div>
                                    <div class="mb-1">
                                        <button class="btn btn-primary" type="submit" name='recover'>Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            timer: 1500,
            });

        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);
    }
    ?> 
    </script> 
</body>
</html>