<?php

include('middleware/userMiddleware.php');

$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no"> 
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Inter.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <title>Reservation | I-Eat</title>
    <style>
        table
        {
          table-layout:fixed;  
        }

        td
        {
          width: 33%;  
        }

        .today
        {
            background: yellow;
        }
    </style>
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
$.ajax({
    url: "calendar.php?id=<?= $id; ?>",
    type:"POST",
    data: {'month':'<?php echo date('m'); ?>', 'year':'<?php echo date('Y'); ?>', 'resource_id':1},
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
</script> 
</html>