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
    <title>Forgot Password | I-Eat</title>

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>

</head>
<body >
    <section class="position-relative py-4 py-xl-5">
        <div class="container" style="margin-top:50px;">
            <div class="row d-flex justify-content-center align-items-md-end">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5" style="border-style: none;">
                        <div class="card-body d-flex flex-column align-items-center" style="border-radius: 10px;border-style: solid;border-color: rgb(255, 128, 64);box-shadow: 0px 0px 18px var(--bs-gray);">
                        <form method="post" action="functions/busiauthcode.php"> 
                            <div class="row d-flex justify-content-center align-items-md-end">
                                <div class="col-md-12 mb-5">
                                    <h4 class="mt-1">
                                        <a href="index.php" class="btn btn-primary float-end" style="background-color:rgb(255,128,64); border:none;">Back</a>
                                    </h4>   
                                </div>
                                <p class="fw-bold text-center " style="margin-bottom: 5px; font-size:20px;">Forget Password?</p>
                                <div class="mb-1">
                                    <label class="form-label" for="email" style="font-weight: bold;">Enter your email</label>
                                    <input type="email" name="business_email" id="email" class="form-control form-control-sm item mb-3" style="font-size: 14px;height: 50px;" required/>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100" type="submit" name='recover' style="background: rgb(255, 128, 64);border-style: none;">Reset</button>
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