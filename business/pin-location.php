<?php 
include('../middleware/businessMiddleware.php');
include('includes/header.php');
include('../config/dbcon.php');

?>
 <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            $location = getByID("business", $id,"businessid");
            $data = mysqli_fetch_array($location);
?>
  <div class="row justify-content-center mb-5">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <form method="post" action="code.php">
                    <h4 class="text-center">Pin-Location 
                    <a href="location.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back btn-close float-start"></a>
                    <!-- <input hidden type="text" id="address" name="address"> -->
                    <input hidden type="text" name="businessid" value="<?= $_SESSION['auth_user']['businessid'];?>">
                    <input hidden type="text" id="latitude" name="latitude" value="<?= $data['latitude'] ?>">
                    <input hidden type="text" id="longitude" name="longitude" value="<?= $data['longitude'] ?>">
                    <button class="btn save-btn float-end" type="submit" name="update_location_btn" >Save</button>
                </form></h4>
            </div>
            <div class="card-body">
                <div id="map"  style="height: 700px"></div>
            </div>
        </div>
    </div>
</div>
    
<?php

}
else
{
    echo"ID missing from url";
}
?>
<?php include('includes/footer.php');?>