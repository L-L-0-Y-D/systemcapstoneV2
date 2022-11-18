<?php 

include('middleware/userMiddleware.php');

/* This is checking if the user is already logged in. If they are, it will redirect them to the index
page and display a message. */
// if(isset($_SESSION['auth'])){
//     $_SESSION['message'] = "You are Already Login";
//     $_SESSION['alert'] = "warning";
//     header('Location: index.php');
//     exit();
// }

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $reservations = reservationGetByIDreservation($id);
    

    if(mysqli_num_rows($reservations) > 0)
    {
        $data = mysqli_fetch_array($reservations);
        $result_review = reservationIDGetByIDReview($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/assets/css/vanilla-zoom.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=21f14b60305aa9b0449170550a54b7e5">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic.css?h=561e53509f5bc926993a2226fdbdf2f4">
    <link rel="stylesheet" href="assets/css/styles.css?h=d41d8cd98f00b204e9800998ecf8427e">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <title>Login | I-Eat</title>
    <style>
        .swal-modal .swal-title {
            text-align: center;
        }
    </style>
    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>

</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
            <div class="container ml-2">
                <a class="navbar-brand" href="index.php" style="color: white;font-size: 28px;">
                    <span><img src="uploads/logoT.png" usemap=#workmap style="width: 50px;">&nbsp;</span>
                        <map name="workmap">
                            <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                        </map>I - Eat</a>
                <nav class="navbar navbar-expand">
                    <div class="container-fluid">
                        <span class="bs-icon-md d-flex justify-content-center align-items-center me-2 bs-icon" style="background: transparent;">
                        <a href="index.php"><i class="fa fa-home" style="float:right; color:white;"></i></a>
                        </span></div>
                </nav>
            </div>
        </nav>
<section class="feedback">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-9 col-xl-5">
                    <div class="card mb-5">
                        <div class="card-body flex-column">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-3" >
                                <img src="uploads/I-EatLogo.png" style="width: 150px;height: 150px;" usemap=#workmap>
                                <map name="workmap">
                                    <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                                </map>
                            </div>
                            <form class="text-center" method="post" action="functions/authcode.php">
                                <div class="col-md-12">                          
                                    <h3 class="modal-title text-center">How was <?= $data['business_name'] ?> ?</h3>
                                    <p>We appreciate feedback about your experience.</p><hr>
                                    <h5 class="modal-title text-center">How likely are  you to recommend the <?= $data['business_name'] ?> to others?</h5>
                                </div>
                                <?php 
                                    if(mysqli_num_rows($result_review) > 0)
                                    { 
                                        // $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
                                        
                                        foreach($result_review as $item)
                                        {
										
									?>
                                <div class="col-md-12">
                                    <h4 class="text-center mt-2 mb-4">
                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                    </h4>
                                    <div class="form-group">
                                        <input type="hidden" name="userid" id="userid" value="<?= $_SESSION['auth_user']['userid'];?>">
                                        <input type="hidden" name="businessid" id="businessid" value="<?= $item['businessid'] ?>">
                                        <input type="hidden" name="reservationid" id="reservationid" value="<?= $item['reservationid'] ?>">
                                        <input type="hidden" name="review_status" id="review_status" value="1">
                                        <input type="text" readonly name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" value="<?= $_SESSION['auth_user']['name']?>" />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Share your experience or after the suggestions to the staff.."></textarea>
                                    </div>
                                    <div class="form-group text-center mt-4">
                                        <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                                    </div>
                                </div>
                                <?php
                                                                               
                                        }
                                    ?>
                                    
                                    <?php

                                    }
                                    else
                                    {
                                        echo "No Data";
                                    }
										
                                        
									?>
                            <!-- </form>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        }
        else
        {
            redirect("index.php", "No Reservation Found", "warning");
        }
    }
    else
    {
    redirect("index.php", "ID Missing from the URL", "error");
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/assets/js/vanilla-zoom.js"></script>
    <script src="asset/sassets/js/theme.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    

    $(document).ready(function(){

    var rating_data = 0;

    // $('#add_review').click(function(){

    //     $('#review_modal').modal('show');

    // });


    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){
        
        var userid = $('#userid').val();

        var businessid = $('#businessid').val();

        var reservationid = $('#reservationid').val();

        var review_status = $('#review_status').val();

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '' || rating_data == 0)
        {
            swal({
            title: "Please fill all fields",
            icon: "warning",
            button: "Okay",
            });
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, userid:userid, businessid:businessid, reservationid:reservationid, review_status:review_status, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    // alert(data);
                    //redirect('your_reservation.php?id=$id', 'No Reservation Found', 'warning');
                    swal({
                    title: "Review Success",
                    icon: "success",
                    button: "Okay",
                    });
                    window.location = 'your_reservation.php?id=' + userid;


                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="card-header"><b>'+data.review_data[count].businessid+'</b></div>';

                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);

                }
            }
        })
        // $.ajax({
        //         url:"submit_rating.php",
        //         method:"GET",
        //         data:{businessid:businessid},
        //         success:function(data)
        //         {
        //             $('#review_modal').modal('hide');

        //             load_rating_data();

        //             alert(data);
        //         }
        //     })
    }

    });



    </script>
    <script>
        <?php if(isset($_SESSION['message'])) 
    { ?>
        alertify.set('notifier','position', 'top-center');
        var msg = alertify.message('Default message');
        msg.delay(3).setContent('<?= $_SESSION['message']; ?>');
        
        swal({
            title: "<?= $_SESSION['message']; ?>",
            icon: "<?= $_SESSION['alert']; ?>",
            button: "Okay",
            timer: 1500,
            });

        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);

    }
    ?> 
    </script>
         
</body>
</html>


<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#d2d5d9;
}
</style>