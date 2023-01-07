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
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <a href="blockdate.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back btn-sm btn-close float-end"></a>
          <h6 class="fw-bold">Add Block Date</h6>
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
                        <label >Reason(s):</label>
                        <input type="text" name="reason" required placeholder="Type your reason here" required class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                        <label >Select Date:</label>
                        <input class="form-control" type="date" id="blockdate" name="blockdate" min="<?php echo date("Y-m-d"); ?>" required>
                    </div>
                    <div class="row">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="formCheck-1" name="status" > 
                            <label for="formCheck-1"><strong>Status</strong></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn save-btn" name="add_blockdate_btn" >Save</button>
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