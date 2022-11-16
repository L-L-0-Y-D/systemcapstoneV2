<?php 
include('../middleware/businessMiddleware.php');
include('includes/header.php');
include('../config/dbcon.php');

?>
 <?php 
if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $business = businessGetByIDActives($id);

            if(mysqli_num_rows($business) > 0)
                {
                    $data = mysqli_fetch_array($business);
                    $bid = $data['businessid'];
                    $product = getProductByBusiness($bid);
                    $location = str_replace(' ', '+', $data['business_address']);
                    $latitude = $data['latitude'];
                    $longitude = $data['longitude'];
?>
    <div class="container-fluid">
        <div class="row justify-content-center mb-5">
            <h4 class="text-dark">Business Location
            <a class="btn btn-primary float-end" role="button" href="pin-location.php?id=<?= $_SESSION['auth_user']['businessid'];?>" id="addbtn">Relocate</a> </h4>
            <div class="col-md-12">
                <iframe src="https://maps.google.com/maps?q=<?= $latitude ?>+<?= $longitude ?>&t=k&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
        </div>
    </div>
<?php
                } 
            else
                {
                    echo "No Data Found";
                    ?>
                    <br><a href="index.php">Go Back</a>
                    <?php
                }
    }
    else
    {
        echo"ID missing from url";
    }
?>
<?php include('includes/footer.php');?>