<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Cuisine type</h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Cuisine type</label>
                        <input type="text" name="categoryname" placeholder="Enter municipality Name" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" >
                    </div> <br>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>