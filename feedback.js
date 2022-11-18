

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

        var tableid = $('#tableid').val();

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
                    title: data,
                    icon: "success",
                    button: "Okay",
                    });
                    window.location = 'your_reservation.php?id=' + userid;


                }
            })
        }

    });

});


