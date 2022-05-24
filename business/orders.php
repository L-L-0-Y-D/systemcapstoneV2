<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Bussiness Dashboard</title>
    <link rel="stylesheet" href="stylee.css">
    
</head>
<body>
    <!--span = icon-->
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <span></span>
            <img src="images/logodb.png" width="70px">
            <span>I-EAT</span>  
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="admin.php"><span></span>
                    <i class="fas fa-clock"></i>&#9<span>Dashboard</span></a>
                </li>
                <li>
                    <a href="orders.php"  class="active"><span></span>
                    <i class="fas fa-tag"></i>&#9<span>Orders</span></a>
                </li>
                <li>
                    <a href="reservation.php"><span></span>
                    <i class="fa fa-clipboard"></i>&#9<span>Reservation</span></a>
                </li>
                <li>
                    <a href="customer.php"><span></span>
                    <i class="fas fa-users"></i>&#9<span>Customers</span></a>
                </li>
                <li>
                    <a href="report.php"><span></span>
                    <i class="fas fa-bullhorn"></i>&#9<span>Reports</span></a>
                </li>
                <li>
                    <a href="notification.php"><span></span>
                    <i class="fas fa-bell"></i>&#9<span>Notification Centre</span></a>
                </li>
                <li>
                    <a href="menu.php"><span></span>
                    <i class="fas fa-store"></i>&#9<span>Menu Management</span></a>
                </li>
                <li>
                    <a href="../logout.php"><span></span>
                    <i class="fas fa-store"></i>&#9<span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <!--Hamburger icon-->
                    <span><i class="fas fa-hamburger"></i></span>
                    Orders
                </label>
            </h2>

            <div class="bussiness-name-wrapper">
            <h1>
                <label for=""></label>
                Bussiness Name
            </h1>
            </div>

            <div class="user-wrapper">
                <img src="img/2.jpg" width="30px" height="30px" alt="">
                <div>
                    <h4>John Doe</h4>
                    <small>Owner</small>
                </div> 
            </div>
        </header>
    </div>  
</body>
</html>