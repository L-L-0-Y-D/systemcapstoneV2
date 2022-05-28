<?php
    session_start();
    include('connection.php');
    $tab_Query = "SELECT *FROM municipality ORDER BY municipalityid ASC";
    $tab_result = mysqli_query($conn,$tab_Query);
    $tab_menu = '';
    $tab_content = '';
    $count = 0;
    while ($row = mysqli_fetch_array($tab_result)){
        if($count == 0){
            $tab_menu .= '
            <li class="townbtn"><a href="#'.$row["municipalityid"].'" data-toggle="tab">'.$row["municipality_name"].'</a></li>
            ';
            //$tab_content .= '
            //<div id="'.$row["municipality_id"].'"
            //';

        }else{
           $tab_menu .= '
           <li><a href="#'.$row["municipalityid"].'" data-toggle="tab">'.$row["municipality_name"].'</a></li>
           ';

        }
        $count++;
    }
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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Akaya%20Kanadaka.css">
    <link rel="stylesheet" href="assets/css/Alata.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <title>I-Eat | Home </title> 
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
                    <a href="logout.php">Logout</a>
                
                <?php elseif(isset($_SESSION['business_email'])): ?>
                    <!--if user is login-->
                    <h2> Welcome <strong><?php echo $_SESSION['business_email']; ?></strong> !</h2>
                    <a href="business/admin.php">Dashboard</a> 
                    <a href="logout.php">Logout</a>
                 
                <?php endif ?>
            </div>
    <div class="logo">
        <img src="images/I-EatLogo.png" alt="LOGO" width="300" height="300"> 
    </div>
    <div class="container">
        <div class="d-flex float-right">
            <select id="cuisine" name='cuisine_type'>
                <option value="" disabled selected hidden>Type of Cuisine</option>
                <option value="chinese">Chinese</option>
                <option value="japanese">Japanese</option>
                <option value="korean">Korean</option>
                <option value="arabic">Arabic</option>
                <option value="american">American</option>
                <option value="asian">Asian</option>
                <option value="vietnamese">Vietnamese</option>
                <option value="indian">Indian</option>
            </select> 
        </div>
    </div>
</div>
</header>
<!--different municipalities-->
    <div class="container">
        <ul class="nav nav-tabs">
            <?php echo $tab_menu; ?>
        </ul>
        <div class="tab-content">
        </div>
    </div>
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark" style="padding: 0px 0px 0px 0px;">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-md-9" style="margin: 0px 100px;">
                            <div class="products" style="width: 800px;">
                                <div class="row g-0">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/Dinaluphan-beanbox.jpg" style="width: 180px;margin: 0px 10px;border: 1px none rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;border-color: var(--bs-body-bg);">BeanBox</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Dinalupihan, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/ichiraku-mariveles.png" style="width: 180px;margin: 0px 10px;border: 1px solid rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;border-color: var(--bs-body-bg);">Ichiraku</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Mariveles, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/angelitos-orani.jpg" style="width: 180px;margin: 0px 10px;border-radius: 10px;border: 1px none rgb(255,128,64) ;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">Angelito's</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Orani, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4" data-bss-hover-animate="pulse" style="width: 240px;height: 315px;">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 0px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/natalia-balanga.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px none rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;border-style: none;">Natalia</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Balanga, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 16px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/foodproject-orion.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px none rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">The Food Project</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Orion, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 16px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/winghub-limay.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px none rgb(255,128,64);background: rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">The WingHub</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Limay, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 0px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/saverde-abucay.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px solid rgb(255,128,64) ;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">Saverde</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Abucay, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 0px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/imaflora-pilar.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px solid rgb(255,128,64) ;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">Ima's Pamangan</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Pilar, Bataan</p>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 0px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/viewtea-samal.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px solid rgb(255,128,64) ;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">viewtea</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Samal, Bataan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-none d-md-flex">
                    <img src="images/I-EatLogo.png" class="image" width="200px" height="200px"/>
                </div>
                <div class="col-md-3">
                    <p class="display-5 font-weight-bold mt-1">About Us</p>
                    <p>I-Eat: established in 2022, an online international cuisine management system. I-Eat aims to improve the management of the growing community of food industry within Bataan. The system is designed intending to manage customer information, to provide an efficient, contactless, and a more accurate business process.</p>
                </div>
                <div class="col-md-3">
                    <p class="display-5 font-weight-bold mt-1">Contact</p>
                    <p>Do you want yourself listed on I-Eat? You can register yourself for listing and we will contact you: <span><a href="businessreg.php">Partner with Us</a></span></p>
                    <p>Are you already a partner of ours and have questions about the service? Then email: <a href="mailto:2022ieat@gmail.com">2022ieat@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>
