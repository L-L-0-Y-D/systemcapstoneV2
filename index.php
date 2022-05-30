<?php
    session_start();
    include('connection.php');
    include('includes/header.php');
    $tab_Query = "SELECT *FROM municipality ORDER BY municipalityid ASC";
    $tab_result = mysqli_query($conn,$tab_Query);
    $tab_menu = '';
    $tab_content = '';
    $count = 0;
    while ($row = mysqli_fetch_array($tab_result)){
        if($count == 0){
            $tab_menu .= '
            <li class="townbtn"><a href="#'.$row["municipalityid"].'" data-toggle="tab">'.$row["municipality_name"].'</a></li>
            ';
            //$tab_content .= '
            //<div id="'.$row["municipality_id"].'"
            //';

        }else{
           $tab_menu .= '
           <li><a href="#'.$row["municipalityid"].'" data-toggle="tab">'.$row["municipality_name"].'</a></li>
           ';

        }
        $count++;
    }
?>

<!--different municipalities-->
    <div class="container">
        <ul class="nav nav-tabs">
            <?php echo $tab_menu; ?>
        </ul>
        <div class="tab-content">
        </div>
    </div>
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark" style="padding: 0px 0px 0px 0px;">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-md-9" style="margin: 0px 100px;">
                            <div class="products" style="width: 800px;">
                                <div class="row g-0">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/Dinaluphan-beanbox.jpg" style="width: 180px;margin: 0px 10px;border: 1px none rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;border-color: var(--bs-body-bg);">BeanBox</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Dinalupihan, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/ichiraku-mariveles.png" style="width: 180px;margin: 0px 10px;border: 1px solid rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;border-color: var(--bs-body-bg);">Ichiraku</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Mariveles, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/angelitos-orani.jpg" style="width: 180px;margin: 0px 10px;border-radius: 10px;border: 1px none rgb(255,128,64) ;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">Angelito's</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Orani, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4" data-bss-hover-animate="pulse" style="width: 240px;height: 315px;">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 0px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/natalia-balanga.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px none rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;border-style: none;">Natalia</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Balanga, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 16px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/foodproject-orion.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px none rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">The Food Project</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Orion, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 16px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/winghub-limay.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px none rgb(255,128,64);background: rgb(255,128,64);border-radius: 10px;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">The WingHub</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Limay, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 0px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/saverde-abucay.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px solid rgb(255,128,64) ;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">Saverde</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Abucay, Bataan</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 0px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/imaflora-pilar.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px solid rgb(255,128,64) ;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">Ima's Pamangan</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Pilar, Bataan</p>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div data-bss-hover-animate="pulse" class="clean-product-item" style="width: 240px;height: 315px;box-shadow: 0px 0px 3px var(--bs-dark);margin-left: 0px;margin-top: 10px;transform-origin: center;background: rgb(255,128,64);">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/viewtea-samal.jpg" style="width: 180px;margin: 0px 10px;height: 180px;border: 1px solid rgb(255,128,64) ;"></a></div>
                                            <div class="product-name" style="margin: 0px 0px 0px;"><a href="#" style="font-size: 18px;font-family: Alata, sans-serif;text-align: right;color: var(--bs-body-bg);font-weight: bold;">viewtea</a></div>
                                            <p style="height: 20px;font-size: 13px;margin: 0px 0px 20px;width: 200px;">Located at Samal, Bataan</p>
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
<?php include('includes/footer.php');?>
