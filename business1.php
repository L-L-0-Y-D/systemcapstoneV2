<?php

    include('functions/userfunctions.php');
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $municipality = getByIDActive("municipality",$id,"municipalityid");

            if(mysqli_num_rows($municipality) > 0)
                {
                    $data = mysqli_fetch_array($municipality);
                    $mid = $data['municipalityid'];
                    $business = getBusiByMunicipality($mid);
    
?>
<!DOCTYPE html>
<html style="background: var(--bs-body-bg);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Catalog - Brand</title>
    <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/assets/css/vanilla-zoom.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white justify-content-center align-items-center clean-navbar" style="text-align: center;padding-top: 15px;">
        <div class="container"><a class="navbar-brand d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center logo" href="#" style="width: 983px;padding: 0px;margin: 0px;margin-top: 10px;margin-bottom: 10px;font-size: 26px;text-align: center;padding-left: 0px;margin-left: 0px;"><strong>Restaurants in <?= $data['municipality_name']; ?></strong></a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto"></ul>
            </div>
        </div>
    </nav>
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container align-content-center justify-content-xl-center">
                <div class="justify-content-center content">
                    <div class="row d-flex justify-content-center align-items-lg-center" style="margin-left: 0px;margin-right: 0px;">
                        <div class="col-md-9 d-flex justify-content-center" style="width: 960px;">
                            <div class="products">
                                <div class="row g-0" style="padding: 0px;margin-left: 10px;">
                                    <?php

                                            if(mysqli_num_rows($business) > 0)
                                            {
                                                foreach($business as $item)
                                                {
                                                    ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-business-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="uploads/<?= $item['image']; ?>"></a></div>
                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong><?= $item['business_name']; ?></strong></a></div><small>Located at <?= $item['business_address']; ?>, Bataan</small>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price"></div>
                                            </div><button class="btn btn-primary text-center float-end" type="button" style="height: 29px;padding-top: 3px;background: var(--bs-orange);border: 1px solid var(--bs-orange);border-radius: 10px;margin-left: 0px;font-size: 14px;width: 152.328px;text-align: left;margin-bottom: 13px;">Make Reservation</button>
                                        </div>
                                    </div>
                                    <?php

                                                }
                                            }
                                            else
                                            {
                                                echo "No Business Found";
                                                ?>
                                                <br><a href="index.php">Go Back</a>
                                                <?php
                                            }
                                    ?>
                                </div>
                                <nav style="margin-top: 0px;color: var(--bs-orange);">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active" style="background: var(--bs-orange);"><a class="page-link">1</a></li>
                                        <li class="page-item"><a class="page-link">2</a></li>
                                        <li class="page-item"><a class="page-link">3</a></li>
                                        <li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    } 
    else
    {
        echo "Something Went Wrong";
        ?>
        <br><a href="Index.php">Go Back</a>
        <?php
    }
}
else
{
    echo "Something Went Wrong";
    ?>
    <br><a href="Index.php">Go Back</a>
    <?php
}
?>
    <script src="assets/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/assets/js/vanilla-zoom.js"></script>
    <script src="asset/sassets/js/theme.js"></script>

<?php include('includes/footer.php');?>
