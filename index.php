<?php

    include('functions/userfunctions.php');
    include('includes/header.php');
?>
    
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading ">
                    <h2 style="font-weight:bold; font-family:Sans Serif">Municipalities</h2>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row">

                <?php
                    $municipality = getAllActive("municipality");

                    if(mysqli_num_rows($municipality) > 0)
                    {
                        foreach($municipality as $item)
                        {
                            ?>
                                <div class="col-md-12 col-lg-4 project-sidebar-card" >
                                    <a href="business.php?id=<?= $item['municipalityid']; ?>">
                                    <div class="card" data-bss-hover-animate="pulse" style="height:300px; weight:300px; margin-bottom:10px;">
                                        <img class="img-fluid card-img w-100 h-100 d-block" src="uploads/<?= $item['image']; ?>" alt="Municipality Image" height="300px" width="300px" >
                                        <div class="card-img-overlay" >
                                            <h4 class="display-6  fw-bold" style="margin-top: 220px; color:white;"><?= $item['municipality_name']; ?></h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            <?php

                        }
                    }
                    else
                    {
                        echo "No Category Available";
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php include('includes/footer.php');?>
