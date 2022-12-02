<link rel="stylesheet" href="assets/css/untitled.css">
<footer class="text-white sticky-footer">
    <div class="container " >
        <div class="row ">
                <h3>POPULAR CUISINES</h3>
            <?php
            $query = "SELECT * FROM mealcategory";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $item)
                {
            ?>
            <div class="col-md-2">
                <a href="cuisine.php?name=<?= $item['categoryname']; ?>"><?= $item['categoryname']; ?></a>
            </div>
            <?php
                }
            }
            else
            {
                echo "No Cuisine Available";
            }?>
            <hr>
            <div class="row ">
                <div class="col-md-4 text-white"><span class="copyright">Copyright&nbsp;© I-EAT 2022</span>
                <a href="adminsignup.php"><i class="fas fa-door-open text-black"></i></a></li>
            </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons ">
                        <li class="list-inline-item"><a href="mailto:ieatwebsite@gmail.com"><i class="fa fa-google"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100087262523820"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item"><a href="policy.php" style="color: white;">Privacy Policy&nbsp&nbsp•</a></li>
                        <li class="list-inline-item"><a href="terms.php" style="color: white;">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
    <script src="assets/js/agency.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/assets/js/vanilla-zoom.js"></script>
    <script src="asset/sassets/js/theme.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    <?php 
    if(isset($_SESSION['message']))    
        { 
        ?>
        // alertify.set('notifier','position', 'top-center');
        // var msg = alertify.message('Default message');
        // msg.delay(3).setContent('<?= $_SESSION['message']; ?>');

        swal({
            title: "<?= $_SESSION['message']; ?>",
            icon: "<?= $_SESSION['alert']; ?>",
            button: "Okay",
            timer: 10500,
            });

        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);
        }
    ?> 
    </script>
</body>
</html>

<?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $business = getByID("business",$id,"businessid");

            if(mysqli_num_rows($business) > 0)
            {
                $data = mysqli_fetch_array($business);
                
            
            ?>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
                
	        	<h5 class="modal-title text-center">Submit Review</h5>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
                    <input type="text" name="userid" id="userid" value="<?= $_SESSION['auth_user']['userid'];?>">
                    <input type="text" name="businessid" id="businessid" value="<?= $data['businessid'] ?>">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" value="<?= $_SESSION['auth_user']['name']?>" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<?php
            }
        
            ?>

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

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');


    });

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
                url:"submit_rating.php?id=<?= $id; ?>",
                method:"POST",
                data:{rating_data:rating_data, userid:userid, businessid:businessid, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        
        $.ajax({
            url:"submit_rating.php?id=<?= $id; ?>",
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
                        // html += '<div class="card-header"><b>'+data.review_data[count].businessid+'</b></div>';

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


<?php

        }
?>
<!-- /* Creating a new Autocomplete object and passing it the search input element and the data array. */ -->
<script>

var search = new Autocomplete(document.getElementById('search'),{

        data:<?php echo json_encode($data); ?>,
        maximumItems:10,
        highlightTyped:true,
        highlightClass : 'fw-bold text-primary'

});

</script>
<!-- <script>

$(document).ready(function(){

    $('#search').typeahead({
        source: function(query, result)
        {
            alert(query);
            $.ajax({
                url:"querysearch.php",
                method:"POST",
                data:{query:query},
                dataType:"json",
                success:function(data)
                {
                    result($.map(data,function(item){
                        return item;
                    }));
                }
            })
        }
    })
})

</script> -->
