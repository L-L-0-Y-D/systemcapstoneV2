<?php 

session_start();
include ('connection.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css"> 
    <title>Login Admin Account</title>
</head>
<body>
    <header>
         <img src="images/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
    <map name="workmap">
        <area shape="circle" coords="100,100,400,400" alt="logo" href="home.php">
    </map>
    </header>
<main>
    <form method="post" action="adminlogin.php" > 
        <div class="container">
            <p>ADMIN LOGIN</p>
            <div class="row">
                <input type="email" name="email" required placeholder="Email" class="input"/>
            </div>
            <div class="row">
                <input type="password" name="password" required placeholder="Password" class="input"/>
            </div>
                <button class="login-btn" name='login' >LOGIN</button> <br> <br>
                <!--link to connect with register php-->
                <a href="reg.php">Create an account</a>
        </div>
    </form>
</main>
</body>
</html>