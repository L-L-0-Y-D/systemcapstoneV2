<?php

    include('functions/userfunctions.php');
    include('includes/navbar.php'); 

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
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
    <link rel="icon" href="uploads/favicon.ico" type="image/ico">
</head>
<body>
    <div class="container pt-5">
        <div class="row pt-5 m-0 ">
            <div class="heading mt-5">
               <h2 >Search Result</h2>   
            </div>
        </div><hr>
        <div class="row mt-0 g-2 my-5">
            <?php
            /* A PDO connection to the database. */
                $conn = new PDO("mysql:host=localhost;dbname=u217632220_ieatwebsite",'u217632220_ieat','Hj1@8QuF3C');
                $conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    
                /* This is the code that is responsible for the search for business function. */
                if (isset($_POST["submit"]))
                {
                    $key = $_POST["search"];
                    $query =$conn->prepare("SELECT business.businessid,business.business_name,business.business_address,business.municipalityid,business.cuisinename,business.opening,business.closing,business.image,business.role_as,business.status,municipality.municipalityid,municipality.municipality_name
                    FROM business 
                    JOIN 
                    municipality
                    ON business.municipalityid = municipality.municipalityid
                    WHERE business.business_name LIKE :keyword AND business.status = '1' OR business.cuisinename LIKE :keyword AND business.status = '1' OR municipality.municipality_name LIKE :keyword AND business.status = '1' ORDER BY business.business_name ASC");
                    $query->bindValue(':keyword' ,'%'.$key.'%', PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll();
                    $row = $query->rowCount();


                    if($row!= 0)
                    {
                        foreach($results as $item)
                        {
                            $businessid=$item['businessid'];
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
                    <a href="businessview.php?id=<?= $item['businessid']; ?>" class="d-block text-dark text-decoration-none product-name"><?= $item['business_name']; ?>(<?= $item['municipality_name']; ?>)</a>
                    <span class="product-type"><?= $item['cuisinename']; ?></span><br>         
                    <span class="product-price">Opening:<?= date("g:i a", strtotime($item['opening'])); ?> - Closing:<?= date("g:i a", strtotime($item['closing'])); ?></span>
                    <div class="rating d-flex ">
                        <span>
                        <!--HINDI GUMAGANA RATING -->
                        <?php
                            $query_rating = "SELECT ROUND(AVG(user_rating),1) AS averagerating FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                            $query_rating_run = mysqli_query($con, $query_rating);
                            $row_rating = mysqli_fetch_assoc($query_rating_run);
                            if(!$row_rating['averagerating'])
                            {
                                echo '<span> No Rating </span>';
                            }
                            else if($row_rating['averagerating'] == 5.0)
                            {
                                echo '<i class ="fas fa-star "></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="fas fa-star"></i>';
                            }
                            else if($row_rating['averagerating'] >= 4.1)
                            {
                                echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i>';
                            }
                            else if($row_rating['averagerating'] == 4.0)
                            {
                                echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i>';
                            }
                            else if($row_rating['averagerating'] >= 3.1)
                            {
                                echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i>';
                            }
                            else if($row_rating['averagerating'] == 3.0)
                            {
                                echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="fas fa-star-half-alt"></i>';
                            }
                            else if($row_rating['averagerating'] >= 2.1)
                            {
                                echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                            }
                            else if($row_rating['averagerating'] == 2.0)
                            {
                                echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                            }
                            else if($row_rating['averagerating'] >= 1.1)
                            {
                                echo '<i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                            }
                            else if($row_rating['averagerating'] == 1.0)
                            {
                                echo '<i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                            }
                            else
                            {
                                echo 'something went wrong';
                            }
                            $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                            $query_rating_count_run = mysqli_query($con, $query_rating_count);
                            $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                echo '<span> ('.$row_rating_count.' reviews)</span>'
                                        
                            ?>
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
                    <br><a href="Index.php" >Go Back</a>
            <?php
            }                           
            ?>
                <?php
                                    /* This is the code that is responsible for the search fo municipality function. */
                                        //     if (isset($_POST["submit"]))
                                        //     {
                                        //         $key = $_POST["search"];
                                        //         $query =$conn->prepare("SELECT products.productid,products.businessid,business.business_name,business.business_address,business.opening,business.closing,business.cuisinename,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at,products.name FROM products JOIN business ON products.businessid=business.businessid AND business.status = '1' WHERE name LIKE :keyword ORDER BY business.business_name");
                                        //         $query->bindValue(':keyword' ,'%'.$key.'%', PDO::PARAM_STR);
                                        //         $query->execute();
                                        //         $results = $query->fetchAll();
                                        //         $row = $query->rowCount();
    
                                        //         if($row!= 0)
                                        //         {
                                        //             foreach($results as $item)
                                        //             {
                                        //         ?>
                                        <!-- //         <div class="col-md-6 col-lg-4">
                                        //             <div class="card" style="border-style:none;box-shadow: 0px 0px 5px var(--bs-dark);border-radius: 30px;">
                                        //             <a href="businessview.php?id=<?=$item['businessid'];?>">
                                        //                 <img class="card-img-top scale-on-hover" height="200px;" src="uploads/<?= $item['image']; ?>" alt="Card Image" style="border-radius: 30px;"></a>
                                        //                 <div class="card-body" style=" height: 250px;padding-top: 10px;">
                                        //                     <p class="text-center" style="font-family: Acme, sans-serif;font-weight: bold;font-size: 20px;"><?= $item['business_name']; ?></p>
                                        //                     <p class="text-muted card-text" style="margin-bottom: 0px;text-align: left;">Located at <?= $item['business_address']; ?></p>
                                        //                     <p class="text-muted card-text" style="margin-bottom: 0px;text-align: left;">Opening: <?= date("g:i a", strtotime($item['opening'])); ?>- Closing: <?= date("g:i a", strtotime($item['closing'])); ?></p>
                                        //                     <p class="text-muted card-text" style="text-align: left;"><?= $item['cuisinename']; ?> Cuisine</p>
                                        //                     <button onclick="location='reservation.php?id=<?= $item['businessid']; ?>'" class="btn btn-primary text-center " type="button" style=" position: absolute; bottom: 0; height: 29px;padding-top: 5px;background: RGB(255,128,64);border: none;border-radius: 20px;font-size: 14px;width: 152.328px; margin-bottom:20px;">Make Reservation</button>
                                        //                 </div>
                                        //             </div>
                                        //         </div> -->
                                         <?php
                                        //             }
                                        //         }
                                        //     else
                                        //     {
                                        //         echo "<p class='text-center'>No Business Found</p>";
                                        //         ?>
                                                
                                                 <?php
                                        //     }
                                        
                                        
                                        // }
                }
                    else
                    {
                        echo "<p class='text-center'>No Business Found</p>";
                ?>
                    <br><a href="index.php" style="padding-bottom:75px;">Go Back</a>
                <?php
                }
                            
            ?>
        </div>
    </div>
</body>
<?php
include('includes/footer.php'); 
?>
