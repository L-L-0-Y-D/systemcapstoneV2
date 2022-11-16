<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<?php
// if(isset($_GET['id']))
// {
    // $id = $_GET['id'];

    // $business = getByID("business", $id,"businessid");

?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6  ">
      <div class="card">
        <div class="card-header">
          <h4>Add Cuisine Type
          <a href="profile.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back btn-sm btn-close float-end"></a></h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                        ?>
                        <input type="hidden" name="businessid" value="<?= $_SESSION['auth_user']['businessid'];?>">
                        <?php
                        ?>
                    </div>
                    <div class="col-md-12">
                        <label class="mb-0">Add Cuisine Type</label>
                        <input type="text" name="categoryname" required class="form-control mb-2">
                        <input type = "hidden" name="status" value = '1'>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn save-btn" name="add_cuisine_btn" >Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php 
// }
// else
// {
//     echo "ID missing from url";
// }
include('includes/footer.php');
?>