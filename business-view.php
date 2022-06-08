<?php

    include('functions/userfunctions.php');
    include('includes/header.php'); 
    if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $business = getByIDActive("business",$id,"businessid");

                if(mysqli_num_rows($business) > 0)
                    {
                        $data = mysqli_fetch_array($business);
                        $pid = $data['businessid'];
                        $product = getProductByBusiness($pid);
    
?>

<main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container" style="width: auto;">
                <div class="block-heading" style="padding-top: 20px;margin-bottom: 9px;">
                    <div class="col-md-12 d-xxl-flex justify-content-xxl-center" style="height: 500px;"><img class="img-fluid d-flex align-self-center justify-content-xl-start justify-content-xxl-center" style="width: 1100px;height: 500px;margin-top: 0px;box-shadow: 0px 0px 10px var(--bs-gray);border-radius: 5px;margin-bottom: 0px;" src="assets/img/1653977857.jpg" width="200px" height="200px" loading="auto"></div>
                </div>
                <div class="block-content" style="width: auto;padding-top: 0px;">
                    <div class="row" style="width: 1024px;padding-top: 10px;">
                        <div class="col-md-12" style="width: 1024px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;font-family: Alata, sans-serif;width: 1000px;height: 40px;"><strong>Business Name</strong></h1>
                        </div>
                        <div class="col-md-12" style="width: 1024px;font-size: 14px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;font-family: Actor, sans-serif;width: 1000px;font-size: 20px;color: var(--bs-gray);height: 20px;"><strong>Cuisine Type</strong></h1>
                        </div>
                        <div class="col-md-12" style="width: 1024px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;font-family: Actor, sans-serif;width: 1000px;font-size: 23px;color: var(--bs-gray);height: 24px;"><strong>Business Location</strong></h1>
                        </div>
                        <div class="col-md-12" style="width: 1024px;margin-top: 10px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;font-family: Alata, sans-serif;width: 1000px;font-size: 30px;color: var(--bs-gray);margin-top: 21px;">
                                <div class="btn-group" role="group" style="width: 319.094px;font-size: 16px;"><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-right: 24px;font-size: 16px;font-family: Alata, sans-serif;background: var(--bs-orange);border-radius: 10px;height: 45px;border-style: none;border-bottom-style: none;text-align: center;">Make Reservation</button><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-right: 24px;font-size: 16px;font-family: Alata, sans-serif;background: var(--bs-white);color: var(--bs-dark);border-radius: 10px;height: 45px;border: 2px solid var(--bs-gray-900);border-bottom-color: var(--bs-dark);text-align: center;">Add Review</button></div><br>
                            </h1>
                        </div>
                    </div>
                    <div class="product-info">
                        <div style="margin-top: 27px;">
                            <ul class="nav nav-tabs" role="tablist" id="myTab">
                                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" id="description-tab" href="#description">Menu</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" id="specifications-tabs" href="#reviews">Reviews</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" id="reviews-tab" href="#specifications">Location</a></li>
                            </ul>
                            <div class="tab-content text-start d-xxl-flex justify-content-xxl-center align-items-xxl-center" id="myTabContent">
                                <div class="tab-pane fade show active flex-column description" role="tabpanel" id="description" style="margin-right: 40px;margin-left: 40px;padding-top: 40px;">
                                    <div class="row d-flex justify-content-center align-items-lg-center" style="margin-left: 0px;margin-right: 0px;text-align: left;">
                                        <div class="col-md-9 d-flex justify-content-center" style="width: 960px;margin-left: 0px;margin-right: 0px;">
                                            <div class="products">
                                                <div class="row g-0" style="padding: 0px;margin-left: 10px;">
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/1654510030.jpg"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong>Sushi</strong></a></div><small>Description</small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">Php 111.11</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/1654510030.jpg"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong>Sushi</strong></a></div><small>Description</small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">Php 111.11</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/1654510030.jpg"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong>Sushi</strong></a></div><small>Description</small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">Php 111.11</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/1654510030.jpg"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong>Sushi</strong></a></div><small>Description</small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">Php 111.11</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/1654510030.jpg"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong>Sushi</strong></a></div><small>Description</small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">Php 111.11</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/1654510030.jpg"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong>Sushi</strong></a></div><small>Description</small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">Php 111.11</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/1654510030.jpg"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong>Sushi</strong></a></div><small>Description</small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">Php 111.11</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/1654510030.jpg"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong>Sushi</strong></a></div><small>Description</small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">Php 111.11</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div class="clean-product-item">
                                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/1654510030.jpg"></a></div>
                                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong>Sushi</strong></a></div><small>Description</small>
                                                            <div class="about">
                                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                                <div class="price"></div>
                                                            </div><strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px;">Php 111.11</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <nav class="d-flex justify-content-center" style="margin-top: 15px;color: var(--bs-orange);">
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
                                <div class="tab-pane fade specifications" role="tabpanel" id="specifications"><iframe allowfullscreen="" frameborder="0" src="https://cdn.bootstrapstudio.io/placeholders/map.html" width="100%" height="400"></iframe></div>
                                <div class="tab-pane fade" role="tabpanel" id="reviews">
                                    <div class="reviews">
                                        <div class="review-item"><span class="text-muted" style="font-size: 20px;"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                            <div class="rating" style="margin-top: 10px;"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                            <h4>Incredible product</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><img style="width: 200px;height: 150px;" src="assets/img/1653977857.jpg">
                                        </div>
                                    </div>
                                    <div class="reviews">
                                        <div class="review-item"><span class="text-muted" style="font-size: 20px;"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                            <div class="rating" style="margin-top: 10px;"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                            <h4>Incredible product</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><img style="width: 200px;height: 150px;" src="assets/img/1653977857.jpg">
                                        </div>
                                    </div>
                                    <div class="reviews">
                                        <div class="review-item"><span class="text-muted" style="font-size: 20px;"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                            <div class="rating" style="margin-top: 10px;"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                            <h4>Incredible product</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><img style="width: 200px;height: 150px;" src="assets/img/1653977857.jpg">
                                        </div>
                                    </div>
                                </div>
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
            echo "Data not found";
            ?>
            <br><a href="index.php">Go Back</a>
            <?php
        }
    }
    else
    {
        echo "Something Went Wrong";
        ?>
        <br><a href="index.php">Go Back</a>
        <?php
    }

include('includes/footer.php');?>
