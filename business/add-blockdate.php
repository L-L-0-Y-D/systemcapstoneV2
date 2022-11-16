<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<?php
if(isset($_GET['id']))
{
    // $id = $_GET['id'];

    // $business = getByID("business", $id,"businessid");

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Block date
          <a href="blockdate.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="btn btn-primary float-end" style="background:rgb(255,128,64); border:none;">Back</a></h4>
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
                        <label class="mb-0">Reasons</label>
                        <input type="text" name="reason" required placeholder="Reason" required class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                        <label class="mb-0">Select Date</label>
                        <input class="form-control" type="date" id="blockdate" name="blockdate" min="<?php echo date("Y-m-d"); ?>" required>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="mb-0">Status</label> <br>
                            <input type="checkbox" name="status" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="add_blockdate_btn" >Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php 
}
else
{
    echo "ID missing from url";
}
include('includes/footer.php');
?>