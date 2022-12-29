<?php

include('middleware/userMiddleware.php');

$id = $_GET['id'];
if(isset($_GET['id']))
{
$managetable = "SELECT * FROM managetable WHERE businessid=$id AND status='1' ";
$managetable_query_run = mysqli_query($con, $managetable);
if(mysqli_num_rows($managetable_query_run) > 0)
{
    $data = mysqli_fetch_array($managetable_query_run);
    $idnum = $data['tableid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Acme.css">
    <link rel="stylesheet" href="assets/css/Aldrich.css">
    <link rel="stylesheet" href="assets/css/Amaranth.css">
    <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=21f14b60305aa9b0449170550a54b7e5">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <title>Reservation | I-Eat</title>
    <style>
        table
        {
          table-layout:fixed;  
        }

        td
        {
          width: 30%;  
        }

        .today
        {
            background: yellow;
        }
    </style>
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body>
<nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
        <div class="container ml-2">
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle text-white fs-4" aria-expanded="false" data-bs-toggle="dropdown">
                    <?php
                        $host = "localhost";
                        $username = "u217632220_ieat";
                        $password = "Hj1@8QuF3C";
                        $database = "u217632220_ieatwebsite";
                        
                        // Creating database connection
                        $con = mysqli_connect($host,$username,$password,$database);
                        $userid = $_SESSION['auth_user']['userid']; 
                        $sql = "SELECT * FROM `users` WHERE userid = $userid;";
                        $result = $con->query($sql);
                        $item = mysqli_fetch_assoc($result);
                    ?>
                    <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $item['image'];?>"></a>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" href="profile.php?id=<?= $_SESSION['auth_user']['userid'];?>"><i class="fa fa-user "></i>&nbsp;Profile</a>
                        <a class="dropdown-item" href="your_reservation.php?id=<?= $_SESSION['auth_user']['userid'];?>"><i class="far fa-calendar alt"></i>&nbsp;Reservations</a>
                        <a class="dropdown-item" href="changepassword.php?id=<?= $_SESSION['auth_user']['userid'];?>"><i class="fas fa-key"></i>&nbsp;Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="fa fa-sign-out alt"></i>&nbsp;Logout</a>
                    </div>
            </div>
                <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">&nbspWelcome&nbsp&nbsp <strong style="font-family:'Lato';"><?= $item['name'];?>!</strong></a>
                <nav class="navbar navbar-expand">
                    <div class="container-fluid">
                        <span class="bs-icon-md d-flex justify-content-center align-items-center me-2 bs-icon" style="background: transparent;">
                        <a href="index.php"><i class="fa fa-home" style="float:right; color:white;"></i></a>
                        </span>
                    </div>
                </nav>
            </div>
        </nav>
<main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark pt-5 mt-5">
            <div class="container">
                <div class="content mt-5">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-8 p">
                            <!--<div class="mt-4">
                                <h4 style="margin-left: 36px;">
                                <i class="far fa-calendar-alt"></i>&nbsp; November 2022<div class="btn-group float-end gap-2" role="group"><button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-arrow-left"></i>PREVIOUS</button><button class="btn btn-primary btn-sm" type="button">NEXT&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></button></div>
                                </h4>
                            </div>
                            <hr>-->
                            <div class="items">
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col">
                                            <div class="p-0">
                                                <!--<h3 class="text-center fw-bold"><span style="color: rgb(33, 37, 41);">&nbsp;November 20 , 2022 (Napili ng customer)</span><br></h3>-->
                                                    <div id="calendar">
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-md-3">
                            <div class="summary">
                                <h3 >SELECT WHAT TIME IS YOUR RESERVATION</h3>
                                <div id="book">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    
    $(document).on('click','.reserveBtn',function(){
                var values = $(this).val();
                var dates = $(this).attr('date');
                var tableids = $(this).attr('tableid');
                var ids = $(this).attr('id');
                // alert(values);
                // alert(dates);
                // alert(tableids);
                // alert(ids);
                // alert(ID);
                // alert(id);
                // alert(Review);
                // var all= $('#all').val();

                $.ajax({
                    url:"book.php?id=<?= $id; ?>",
                    type:"POST",
                    data:{value: values, date: dates, tableid: tableids, id: ids},
                    beforeSend:function(){
                        $("#book").html("<span>Working...</span>");
                    },
                    success:function(data){
                        $("#book").html(data);
                    
                    }
                });
            // });
        });


$.ajax({
    url: "calendar.php?id=<?= $id; ?>",
    type:"POST",
    data: {'month':'<?php echo date('m'); ?>', 'year':'<?php echo date('Y'); ?>', 'resource_id':'<?php echo $idnum; ?>'},
    success: function(data){
        $("#calendar").html(data);
    }
});




$(document).on('click','.changemonth', function(){
    var resource_id = $("#resource_select").val();
    $.ajax({
        url: "calendar.php?id=<?= $id; ?>",
        type:"POST",
        data: {'month': $(this).data('month'), 'year':$(this).data('year'), 'resource_id':resource_id},
        success: function(data){
            $("#calendar").html(data);
        }
    });
});

$(document).on('change','#resource_select', function(){
    var resource_id = $(this).val();
    $.ajax({
        url: "calendar.php?id=<?= $id; ?>",
        type:"POST",
        data: {'month': $('#current_month').data('month'), 'year':$('#current_month').data('year'), 'resource_id':resource_id},
        success: function(data){
            $("#calendar").html(data);
        }
    });
});


</script>
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
<?php
}
else
{
    redirect("index.php", "No Table and Chairs created", "error");
}
?>
</script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</html>
<?php
}
else
{
    redirect("index.php", "Somthing went Wrong", "error");
}
