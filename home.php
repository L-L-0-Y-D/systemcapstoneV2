<?php
    session_start();
    include('connection.php');

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
    <title>I - Eat || Home</title> 
</head>

<body>
<!--eveything inside the bg image-->
<div id="header-img">
    <div id="header-signup">
        <?php if(empty($_SESSION["email"])&&empty($_SESSION["business_email"])):?>
            <!--For business registration-->
            <p>Do you need business account?  <span><a href="businessreg.php">REGISTER</a></span></p>
        <?php endif ?>
    </div>
    <header>
            <div class="nav-menu">
                <?php if(empty($_SESSION["email"])&&empty($_SESSION["business_email"])): // if user is not login?>
							
                    <button class="loginbtn" onclick="openForm()">Login</button>
                        <div class="form-popup" id="myForm">
                            <form name="form" class="form-container">
                                <h3>Login as</h3>
                                <button type="submit" class="ownerbtn" onclick="javascript: form.action='business/ownerlogin.php';" href="ownerlogin.php">Business</button>
                                <button type="submit" class="customerbtn" onclick="javascript: form.action='login.php';" href="login.php">Customer</button>
                                <button type="submit" class="adminbtn" onclick="javascript: form.action='admin/adminlogin.php';" href="adminlogin.php">Admin</button>
                                <div><button type="button" class="btn cancel" onclick="closeForm()">Close</button></div>
                            </form>
                        </div>
                        <script>
                        function openForm() {
                            document.getElementById("myForm").style.display = "block";
                        }
                        function closeForm() {
                            document.getElementById("myForm").style.display = "none";
                        }
                        </script>

                    <a href="reg.php">Sign up</a>
                               
                <?php elseif(isset($_SESSION['email'])): ?>
                                            
                    <!--if user is login-->
                    <h2> Welcome <strong><?php echo $_SESSION['email']; ?></strong> !</h2>
                    <a href="your_reservation.php">Your Reservation</a>
                    <a href="your_orders.php">Your Orders</a> 
                    <a href="logout.php">Logout</a>
                
                <?php elseif(isset($_SESSION['business_email'])): ?>
                    <!--if user is login-->
                    <h2> Welcome <strong><?php echo $_SESSION['business_email']; ?></strong> !</h2>
                    <a href="business/admin.php">Dashboard</a> 
                    <a href="logout.php">Logout</a>
                 
                <?php endif ?>
                </div>
    </header>
    <div class="logo">
        <img src="images/I-EatLogo.png" alt="LOGO" width="350" height="350"> 
    </div>
    <div class="container">
        <div class="d-flex float-right">
            <input type="text" placeholder="Search for cuisines..." class="search-box"/>
            <button type="submit" name="search button" class="search-btn">Search</button>
        </div>
    </div>
</div>

<section id="second-section">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/mariveles.jpg" alt="Mariveles" width="300" height="200" >
                    <div class="card-bottom">
                    <p class="h4 m-0 mt-2 text-center">Mariveles</p>
                    </div>
                
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/limay.jpg" alt="Limay" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">LIMAY</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/orion.jpg" alt="Orion" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">ORION</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/pilar.jpg" alt="Pilar" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">PILAR</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/balanga.jpg" alt="Balanga" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">BALANGA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/abucay.png" alt="Abucay" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">ABUCAY</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/samal.jpg" alt="Samal" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">SAMAL</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/orani.jpg" alt="Orani" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">ORANI</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/hermosa.jpg" alt="Hermosa" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">HERMOSA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/dinalupihan.jpg" alt="Dinalupihan" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">DINALUPIHAN</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/bagac.jpg" alt="Bagac" width="300" height="200" >
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">BAGAC</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/morong.jpg" alt="Morong" width="300" height="200" >
                        <a href="mariveles/mariveles.php"></a>
                        <div class="card-bottom">
                            <p class="h4 m-0 mt-2 text-center">MORONG</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-none d-md-flex">
                    <img src="images/I-EatLogo.png" class="image" width="200px" height="200px"/>
                </div>
                <div class="col-md-3">
                    <p class="display-5 font-weight-bold mt-4">About Us</p>
                    <p>I-Eat: established in 2022, an online international cuisine management system. I-Eat aims to improve the management of the growing community of food industry within Bataan. The system is designed intending to manage customer information, to provide an efficient, contactless, and a more accurate business process.</p>
                </div>
                <div class="col-md-3">
                    <p class="display-5 font-weight-bold mt-4">Contact Us</p>
                    <p>Do you want yourself listed on I-Eat? You can register yourself for listing and we will contact you: <span><a href="businessreg.php">Partner with Us</a></span></p>
                    <p>Are you already a partner of ours and have questions about the service? Then email: 2022ieat@gmail.com</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
