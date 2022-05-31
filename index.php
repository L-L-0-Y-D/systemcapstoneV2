<?php

    include('functions/userfunctions.php');
    include('includes/header.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Municipalities</h1>
                <hr>
                <div class="row">

                <?php
                    $municipality = getAllActive("municipality");

                    if(mysqli_num_rows($municipality) > 0)
                    {
                        foreach($municipality as $item)
                        {
                            ?>
                                <div class="col-md-3 mb-2">
                                    <a href="restaurants.php?municipality=<?= $item['municipality_name']; ?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Municipality Image" height="300px" width="275px">
                                                <h4 class="text-center text-black me-2"><?= $item['municipality_name']; ?></h4>
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
<?php include('includes/footer.php');?>
