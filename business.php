<?php

    include('functions/userfunctions.php');
    include('includes/header.php');

    
?>
    <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <?php 
        if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $municipality = getByIDActive("municipality",$id,"municipalityid");

                    if(mysqli_num_rows($municipality) > 0)
                        {
                            $data = mysqli_fetch_array($municipality);
                            $mid = $data['municipalityid'];
        
        ?>
        <h1 style="text-align: center;width: 753.453px;margin-left: 200px;font-size: 36px;"><strong>Restaurants in <?= $data['municipality_name']; ?></strong></h1>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto"></ul>
        </div>
    </div>
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="products" style="margin-left: 190px;">
                                <div class="row g-0" style="width: 729px;">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item" style="padding: 10px;">
                                        <?php
                                        $business = getBusiByMunicipality($mid);

                                            if(mysqli_num_rows($business) > 0)
                                            {
                                                foreach($business as $item)
                                                {
                                                    ?>
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="uploads/<?= $item['image']; ?>"></a></div>
                                            <div class="product-name" style="margin-bottom: 0px;"><a href="#"><strong><?= $item['business_name']; ?></strong></a></div><small>Located at <?= $item['business_address']; ?> <?= $data['municipality_name']; ?>, Bataan</small>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price"></div>
                                            </div><button class="btn btn-primary" type="button" style="font-size: 13px;background: var(--bs-orange);border-color: var(--bs-orange);border-radius: 12px;margin-left: 77px;margin-top: 4px;">Make Reservation</button>
                                            <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo "No Business Found";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "Places not Found";
                                                    }
                                                }
                                                else
                                                {
                                                    echo "Something went wrong";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link">1</a></li>
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
<?php include('includes/footer.php');?>
