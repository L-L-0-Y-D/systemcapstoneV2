<?php
include('middleware/userMiddleware.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $reservations = reservationGetByID($id);
    

    if(mysqli_num_rows($reservations) > 0)
    {
        $data = mysqli_fetch_array($reservations);
        $result_all = getReservationByUser($id);
        $result_waiting = reservationGetByIDWaiting($id);
        $result_approved = reservationGetByIDApproved($id);
        $result_declined = reservationGetByIDDeclined($id);
        $result_review = reservationGetByIDReview($id)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/css/Acme.css">
    <link rel="stylesheet" href="assets/css/Aldrich.css">
    <link rel="stylesheet" href="assets/css/Amaranth.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=21f14b60305aa9b0449170550a54b7e5">
    <title>I-Eat | Reservation Table </title> 

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-shrink" id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
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
                    </span>
                 </div>
            </nav>
        </div>
    </nav>

    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark pt-5 mt-5">
            <div class="container">
                <div class="content">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-8">
                            <div class="mt-4">
                                <h4 style="margin-left: 36px;"><i class="far fa-calendar-check"></i>&nbsp; All reservations
                                <span class="float-end fs-6">Sorted By:&nbsp; &nbsp;
                                    <select id="reservationInfo" onchange="myFunction()" class="form-select-sm">
                                        <option value="All" selected="">All Status</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Declined">Declined</option>
                                        <option value="Cancelled">Cancelled</option>
                                        <option value="Review">Review</option>
                                    </select>
                                </span></h4>
                            </div>
                            <hr>
                            <div class="items" id="product">
                            <?php 

                            // $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
                            if(mysqli_num_rows($result_all) > 0)
                            {  
                                foreach($result_all as $data)
                                {
                                
                            ?>
                                <div class="product" >
                                    <div class="row justify-content-center pb">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="uploads/<?= $data['image']; ?>"></div>
                                        </div>
                                        <div class="product-info col-md-9">
                                            <div class="product-specs">
                                                <h5>&nbsp;&nbsp;<?= $data['business_name']; ?>
                                                <button class="btn btnView btn-sm float-end viewBtn<?= $data['reservationid']; ?>" type="submit" arrived="<?= $data['arrived']; ?>" Review="<?= $data['review']; ?>" value="<?= $data['userid']; ?>" status="<?= $data['status'] ?>" reserveId="<?= $data['reservationid']; ?>" busiid="<?= $data['businessid']; ?>" id="viewBtn<?= $data['reservationid']; ?>" onclick="myFunction()">View</button></h5>
                                                <div><span>Reserved By:&nbsp;</span><span class="value"><?= $data['namereserveunder']; ?></span></div>
                                                <div><span>Email Address:</span><span class="value"><?= $data['reservation_email']; ?></span></div>
                                                <div><span>Contact Number:&nbsp;</span><span class="value"><?= $data['reservation_phonenumber']; ?></span></div>
                                                
                                            </div>
                                        </div>
                                        <div class="col p-0"><hr class="mb-0">
                                            <p class="float-start m-2 text-muted">Reservation Id : #<?= $data['reservationid']; ?></p>
                                            <!--<p class="float-end m-2 text-muted">Status:&nbsp;<strong><?php if($data['status'] == 0){echo "Waiting";}elseif($data['status']  == 2){echo "Declined";}elseif($data['status']  == 3){echo "Cancelled";}elseif($data['status']  == 1 && $data['arrived']  == 0){echo "Waiting for Arrival";}elseif($data['status']  == 1 && $data['arrived']  == 2){echo "Not Arrived";}elseif($data['status']  == 1 && $data['arrived']  == 1 && $review == 0){echo "Add Review";}elseif($data['status']  == 1 && $data['arrived']  == 1 && $review == 1){echo "Reviewed";}?>
                                            </strong></p>-->
                                            <p class="float-end m-2 text-muted">Status:&nbsp;<strong><?php if($data['status'] == 0){ echo 'Waiting'; }elseif($data['status'] == 1 && $data['arrived'] == 2){echo 'Approved(NOT ARRIVED)';}  elseif($data['status'] == 1 && $data['arrived'] == 0 && $data['review'] == 0){ echo 'Approved(Waiting to Arrived)';}elseif($data['status'] == 1 && $data['arrived'] == 1 && $data['review'] == 1){ echo 'Reviewed';}elseif($data['status'] == 1 && $data['arrived'] == 1 && $data['review'] == 0){ echo 'Arrived(Waiting for review)';}elseif($data['status'] == 2){echo 'Declined';}elseif($data['status'] == 3){echo 'Cancelled';}  ?></strong></p>
                                        </div><hr class="mt-0">
                                    </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script type="text/javascript">
                                        $(document).ready(function(){
                                            $(".viewBtn<?= $data['reservationid']; ?>").on('click',function(){
                                                var value = $(this).val();
                                                var busiId = $(this).attr('busiid');
                                                var reserveId = $(this).attr('reserveId');
                                                var Status = $(this).attr('status');
                                                var ID = $(this).attr('id');
                                                var Arrived = $(this).attr('arrived');
                                                var Review = $(this).attr('Review');
                                                // alert(value);
                                                // alert(busiId);
                                                // alert(reserveId);
                                                // alert(Status);
                                                // alert(ID);
                                                // alert(Arrived);
                                                // alert(Review);
                                                // var all= $('#all').val();

                                                $.ajax({
                                                    url:"fetch.php?id=<?= $id; ?>",
                                                    type:"POST",
                                                    data:{userid: value, businessid: busiId, reservationid: reserveId, status: Status, view_reservation_btn: ID, arrived: Arrived, review: Review},
                                                    beforeSend:function(){
                                                        $("#summary").html("<span>Working...</span>");
                                                    },
                                                    success:function(data){
                                                        $("#summary").html(data);
                                                    
                                                    }
                                                });
                                            });
                                        });
                            
                                </script>
                                <?php
                                           }
                                    }
                                    else
                                    {
                                        echo "No Data";
                                    }	
                                        
									?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-md-3">
                            <div class="summary">
                                <h3>RESERVATION SUMMARY</h3>
                                <div class="shadow" id="summary">
                                    <h4><span class="text">Reservation ID</span><span class="reservationid"></span></h4>
                                    <h4><span class="text">Table Number</span><span class="tableNumber"></span></h4>
                                    <h4><span class="text">Number of Guest</span><span class="NumberOfGuest">&nbsp;</span></h4>
                                    <h4><span class="text">Reservation Date</span><span class="reservationDat"></span></h4>
                                    <h4><span class="text">Reservation Time</span><span class="reservationTime"></span></h4>
                                    <!--<h4><span class="text">Status</span><span class="status"></span></h4>-->
                                    <!-- <button class="btn btn-primary disabled m-0 w-100" disabled type="submit">ADD REVIEW</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

                    <script type="text/javascript">
                            $(document).ready(function(){
                                $("#reservationInfo").on('change',function(){
                                    var value = $(this).val();
                                    //alert(value);
                                    var all= $('#all').val();

                                    $.ajax({
                                        url:"fetch.php?id=<?= $id; ?>",
                                        type:"POST",
                                        data:'request=' + value,
                                        beforeSend:function(){
                                            $("#product").html("<span>Working...</span>");
                                        },
                                        success:function(data){
                                            $("#product").html(data);
                                        
                                        }
                                    });
                                });
                            });
                  
                    </script>
                    
                  
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
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        <?php if(isset($_SESSION['message'])) 
    { ?>
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

    if(user_name == '' || user_review == '')
    {
        // $_SESSION['Please Fill Both Field'];
        alert("Please Fill Both Field");
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
	color:#e9ecef;
}
</style>


