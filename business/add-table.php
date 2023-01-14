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
          <a href="table.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back btn-sm btn-close float-end"></a>
          <h6 class="fw-bold">Add Table</h6>
        </div>
        <div class="col">
            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary btn-sm m-3">ADD MORE</a>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class=" first-form row">
                    <div class="col-md-12">
                        <?php 
                        ?>
                        <input type="hidden" name="businessid[]" value="<?= $_SESSION['auth_user']['businessid'];?>" readonly="">
                        <input type="hidden" class="form-control sl" name="slno[]" id="slno[]" value="1" readonly="">
                        <?php
                        ?>
                    </div>
                    <div class="col-md-12">
                        <label >Table Number:</label>
                        <input type="number" name="table[]" required class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                        <label>Number Of Chairs:</label>
						<select  name="chair[]" required class="form-control mb-2">
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
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="formCheck-1" name="status[]" > 
                                <label for="formCheck-1"><strong>Status</strong></label>
                                <!-- <button type="button" class="float-end firstremove-btn btn btn-danger btn-sm">Remove</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="paste-new-forms"></div>
                <div class="col-md-9">
                    <button type="submit" class="btn save-btn " name="add_table_btn" >Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>
<script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });

            $(document).on('click', '.firstremove-btn', function () {
                $(this).closest('.first-form').remove();
            });
            
            $(document).on('click', '.add-more-form', function () {
                var length = $('.sl').length;
                var i   = parseInt(length)+parseInt(1);
                $('.paste-new-forms').append('<div class=" main-form row">\
                    <div class="col-md-12">\
                        <?php 
                        ?>
                        <input type="hidden" name="businessid[]" value="<?= $_SESSION['auth_user']['businessid'];?>" readonly="">\
                        <input type="hidden" class="form-control sl" name="slno[]" id="slno[]" value="'+i+'" readonly="">\
                        <button type="button" class="float-end remove-btn btn btn-danger btn-sm">Remove</button>\
                        <?php
                        ?>
                    </div>\
                    <div class="col-md-12">\
                        <label >Table Number:</label>\
                        <input type="number" name="table[]" required class="form-control mb-2">\
                    </div>\
                    <div class="col-md-12">\
                        <label>Number Of Chairs:</label>\
						<select  name="chair[]" required class="form-control mb-2">\
							<option disabled selected hidden> Select number of chairs</option>\
							<option value="1 Person">1 Chair</option>\
							<option value="2 People">2 Chairs</option>\
						    <option value="3 People">3 Chairs</option>\
							<option value="4 People">4 Chairs</option>\
							<option value="5 People">5 Chairs</option>\
							<option value="6 People">6 Chairs</option>\
						    <option value="7 People">7 Chairs</option>\
						    <option value="8 People">8 Chairs</option>\
						</select>\
                    </div>\
                    <div class="row">\
                        <div class="col">\
                            <div class="form-check form-switch">\
                                <input class="form-check-input" type="checkbox" id="formCheck-1" name="status" > \
                                <label for="formCheck-1"><strong>Status</strong></label>\
                            </div>\
                        </div>\
                    </div>\
                </div>');
            });

        });
    </script>

<?php 
}
else
{
    echo "ID missing from url";
}
include('includes/footer.php');
?>