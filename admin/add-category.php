<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <a href="category.php" class="back btn-sm btn-close float-end"></a>
          <h6 class="fw-bold">Add Cuisine Type</h6>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Cuisine Name:</label>
                        <input type="text" name="categoryname" required placeholder="Enter Cuisine Name" class="form-control">
                    </div>
                    <div class="row">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="formCheck-1" name="status"> 
                            <label class="form-check-label m-0" for="formCheck-1"><strong>Status</strong></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn save-btn " name="add_category_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>