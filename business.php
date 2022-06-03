<?php

    include('functions/userfunctions.php');
    include('includes/header.php');

    
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Places</h1>
                <hr>
                <div class="row">
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
                <?php
                    $business = getBusiByMunicipality($mid);

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
                    echo"ID missing from url";
                }
            ?>
                
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>
