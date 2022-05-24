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
                    <a href="admin.php" class="active"><span></span>
                    <i class="fas fa-clock"></i>&#9<span>Dashboard</span></a>
                </li>
                <li>
                    <a href="orders.php"><span></span>
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
                </label>
                Dashboard
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

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>4.5<span><i class="fas fa-chart-line"></i></span></h1>
                        <p>Rating</p>
                    </div>
                    <div>
                        <span></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>79<span><i class="fas fa-tag"></i></span></h1>
                        <p>Orders</p>
                    </div>
                    <div>
                        <span></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>124<span><i class="fas fa-clipboard"></i></span></h1>
                        <p>Reservation</p>
                    </div>
                    <div>
                        <span></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>$6k<span><i class="fas fa-dollar-sign"></i></span></h1>
                        <p>Income</p>
                    </div>
                    <div>
                        <span></span>
                    </div>
                </div>
            </div>
            
            <div class="recent-grid">
                <div class="reservation">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Reservation</h3>

                            <button>See all</button>
                        </div>

                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Date</td>
                                        <td>Time</td>
                                        <td>No. of Guest</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Juan Dela Cruz</td>
                                        <td>2022/02/24</td>
                                        <td>9:00am</td>
                                        <td>3</td>
                                        <td>
                                            <!--orange dot-->
                                            <span class="status orange">
                                                review
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Lloyd Agorita</td>
                                        <td>2022/03/28</td>
                                        <td>12:00pm</td>
                                        <td>4</td>
                                        <td>
                                            <!--red dot-->
                                            <span class="status red">
                                                reject
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Maria Clara</td>
                                        <td>2022/04/30</td>
                                        <td>4:00pm</td>
                                        <td>5</td>
                                        <td>
                                            <!--green dot-->
                                            <span class="status green">
                                                accepted
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            
                <!--
                <div class="orders">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Orders</h3>

                            <button>See all</button>
                        </div>

                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Address</td>
                                        <td>Price</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Juan Dela Cruz</td>
                                        <td>123 Bagong Bayan Dyan Lang</td>
                                        <td>₱1200</td>
                                        <td>
                                            
                                            <span class="status orange">
                                                review
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Lloyd Agorita</td>
                                        <td>Bagong Silang Balanga</td>
                                        <td>₱1900</td>
                                        <td>
                                            
                                            <span class="status red">
                                                reject
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Maria Clara</td>
                                        <td>567 Bagong Bayan Doon Naman</td>
                                        <td>₱5000</td>
                                        <td>
                                            
                                            <span class="status green">
                                                accepted
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            -->
            </div>

        </main>
    </div>  
</body>
</html>