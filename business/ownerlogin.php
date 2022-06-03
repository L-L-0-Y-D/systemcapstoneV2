<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login.css"> 
    <title>Login Business Owner Account</title>
</head>
<body>
    <header>
         <img src="../uploads/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
    <map name="workmap">
        <area shape="circle" coords="100,100,400,400" alt="logo" href="../index.php">
    </map>
    </header>
<main>
    <form method="post" action="../functions/busiauthcode.php" > 
        <div class="container">
            <p>BUSINESS LOGIN</p>
            <div class="row">
                <input type="email" name="business_email" required placeholder="Email" class="input"/>
            </div>
            <div class="row">
                <input type="password" name="business_password" required placeholder="Password" class="input"/>
            </div>
                <button class="login-btn" name='business_login' >LOGIN</button> <br> <br>
                <!--link to connect with register php-->
                <a href="../businessreg.php">Create an account</a>
        </div>
    </form>
</main>
</body>
</html>