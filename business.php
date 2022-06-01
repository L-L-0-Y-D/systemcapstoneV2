<?php

    include('functions/userfunctions.php');
    include('includes/header.php');

    $municipality_name = $_GET['municipality'];
    $municipality_data = getByNameActive("municipality",$municipality_name,"municipality_name");
    $municipality = mysqli_fetch_array($municipality_data);
    $mid = $municipality['municipalityid'];
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $municipality['municipality_data'] ?></h1>
                <hr>
                <div class="row">

                <?php
                    $business = getBusinessByMunicipality($mid);

                    if(mysqli_num_rows($business) > 0)
                    {
                        foreach($business as $item)
                        {
                            ?>
                                <div class="col-md-3 mb-2">
                                    <a href="#">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Business Image" height="300px" width="275px">
                                                <h4 class="text-center text-black me-2"><?= $item['business_name']; ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php

                        }
                    }
                    else
                    {
                        echo "No Business Available";
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>
