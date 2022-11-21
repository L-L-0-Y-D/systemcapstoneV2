<?php

    include('functions/userfunctions.php');
    include('includes/navbar.php'); 
    if(isset($_GET['name']))
        {
             $conn = new PDO("mysql:host=localhost;dbname=u217632220_ieatwebsite",'u217632220_ieat','Hj1@8QuF3C');
             $conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $name = $_GET['name'];
             $query = $conn->prepare("SELECT * FROM business WHERE cuisinename LIKE :keyword AND status= '1'");
             $query->bindValue(':keyword' ,'%'.$name.'%', PDO::PARAM_STR);
             $query->execute();
             $results = $query->fetchAll();
             $row = $query->rowCount();
?>
<head>
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Font Awesome-->
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link rel="stylesheet" href="assets/css/business.css"> 
    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
    <div class="container pt-5">
        <div class="row pt-5 m-0 ">
            <div class="heading mt-5">
               <h2 >Search Result</h2>   
            </div>
        </div><hr>
        <div class="row mt-0 g-2 my-5">
        <?php
            if($row!= 0)
            {
                foreach($results as $item)
                {
                ?>
                <div class="col-md-3 p-2 shadow border-dark">
                    <div class="product-img">
                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                            <img src="uploads/<?= $item['image']; ?>" alt="Business Image" class="img-fluid d-block mx-auto"></a>
                        <!--<span class="heart-icon">
                            <i class="far fa-heart"></i>
                        </span>-->
                        <div class="row btns w-100 mx-auto text-center">
                            <button type="button" onclick="location='businessview.php?id=<?= $item['businessid']; ?>'"><i class="fa fa-binoculars"></i>  View</button>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="d-block text-dark text-decoration-none product-name"><?= $item['business_name']; ?></a>
                        <span class="product-type"><?= $item['cuisinename']; ?></span><br>         
                        <span class="product-price">Opening:<?= date("g:i a", strtotime($item['opening'])); ?> - Closing:<?= date("g:i a", strtotime($item['closing'])); ?></span>
                        <div class="rating d-flex ">
                            <span>
                            
                            </span>
                        </div>
                    </div>
                </div>                                                                
                <?php
                    }
                        }
                        else
                        {
                            echo "<p class='text-center'>No Business Found</p>";
                        ?>
                            <br><a class="text-center text-black fw-bold" href="index.php">Go Back</a>
                    <?php
                    }
                ?>
            </div>
        </div>
    <?php
    }
    else
    {
        echo "<p class='text-center'>Something Went Wrong</p>";
        ?>
        <br><a class="text-center text-black fw-bold" href="index.php">Go Back</a>
        <?php
    }

include('includes/footer.php');?>