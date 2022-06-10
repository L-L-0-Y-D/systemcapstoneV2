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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css"> 
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <title>Login Customer Account</title>

</head>
<body>
    <header>
         <img src="uploads/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
    <map name="workmap">
        <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
    </map>
    </header>
<main>
    <form method="post" action="functions/authcode.php" > 
        <div class="container">
            <p>CUSTOMER LOGIN</p>
            <div class="row">
                <input type="email" name="email" required placeholder="Email" class="input"/>
            </div>
            <div class="row">
                <input type="password" name="password" required placeholder="Password" class="input"/>
            </div>
                <button class="login-btn" name='login_btn' >LOGIN</button> <br> <br>
                <!--link to connect with register php-->
                <a href="register.php">Create an account</a>
        </div>
    </form>
</main>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        <?php if(isset($_SESSION['message'])) 
    { ?>
         alertify.alert('<?= $_SESSION['message']; ?>').set('basic', true); 
        <?php 
        unset($_SESSION['message']);
    }
    ?> 
    </script> 
</body>
</html>