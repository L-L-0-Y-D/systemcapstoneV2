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
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-4">Location</h3>
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="pin-location.php?id=<?= $_SESSION['auth_user']['businessid'];?>" style="background: rgb(255,128,64);border-style: none;"  id="addbtn">&nbsp;Edit Location</a> 
        </div>
        <iframe src="https://maps.google.com/maps?q=<?= $latitude ?>+<?= $longitude ?>&t=k&z=13&ie=UTF8&iwloc=&output=embed" style="width: 1600px; height: 700px;"></iframe>

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