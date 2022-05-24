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
            <li class="townbtn"><a href="municipality#'.$row["municipalityid"].'" data-toggle="tab">'.$row["municipality_name"].'</a></li>
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
<div id="second-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-none d-md-flex">
                <div class="col-md-2">
                    <button type="submit" class="townbtn" onclick="" id="all">All</button>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="townbtn" onclick="" id="mariveles">Mariveles</button>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="townbtn" onclick="" id="limay">Limay</button>
                </div>
            </div>
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
                    <p>Are you already a partner of ours and have questions about the service? Then email: <a href="mailto:2022ieat@gmail.com">2022ieat@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
