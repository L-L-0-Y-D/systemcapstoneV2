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
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <h4>Add Table
          <a href="table.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back float-end">x</a></h4>
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
                        <label class="mb-0">Table Number</label>
                        <input type="number" name="table" required class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                        <label class="control-label">Number Of Chairs</label>
						<select  name="chair" required class="form-control mb-2">
							<option disabled selected hidden> Select number of chairs</option>
							<option value="1 Person">1 Chair</option>
							<option value="2 People">2 Chairs</option>
						    <option value="3 People">3 Chairs</option>
							<option value="4 People">4 Chairs</option>
							<option value="5 People">5 Chairs</option>
							<option value="6 People">6 Chairs</option>
						    <option value="7 People">7 Chairs</option>
						    <option value="8 People">8 Chairs</option>
						</select>
                    </div>
                    <div class="row">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="formCheck-1" name="status" > 
                            <label class="form-check-label" for="formCheck-1"><strong>Status</strong></label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <button type="submit" class="btn save-btn" name="add_table_btn" >Save</button>
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