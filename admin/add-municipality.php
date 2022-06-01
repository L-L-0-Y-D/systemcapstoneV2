<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add municipality
          <a href="municipality.php" class="btn btn-primary float-end">Back</a>
          </h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Municipality</label>
                        <input type="text" name="municipality_name" placeholder="Enter municipality Name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" >
                    </div> <br>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary" name="add_municipality_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>