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
<div class="card">
    <div class="card-header">
        <form method="post" action="code.php">
            <a href="location.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="btn btn-primary float-start" style="background:rgb(255,128,64); border:none;">Back</a></h4>
            <h4 class="text-center">Pin-Location 
            <!-- <input hidden type="text" id="address" name="address"> -->
            <input hidden type="text" name="businessid" value="<?= $_SESSION['auth_user']['businessid'];?>">
            <input hidden type="text" id="latitude" name="latitude" value="<?= $data['latitude'] ?>">
            <input hidden type="text" id="longitude" name="longitude" value="<?= $data['longitude'] ?>">
            <button class="btn btn-primary float-end" style="background:rgb(255,128,64); border:none;" type="submit" name="update_location_btn" >Update</button>
        </form></h4>
    </div>
    <div class="card-body">
        <div id="map"  style="height: 700px"></div>
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