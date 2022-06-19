<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Products
          <a href="menu.php" class="btn btn-primary float-end" style="background:rgb(255,128,64); border:none;">Back</a></h4>
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
                    <div class="col-md-6">
                        <label class="mb-0">Name</label>
                        <input type="text" name="name" required placeholder="Enter Product Name" class="form-control mb-2">
                    </div>
                    <div class="col-md-6">
                        <label class="mb-0">Price</label>
                        <input type="text" name="price" required placeholder="Enter Price" class="form-control mb-2">
                    </div>
                    <div class="col-md-12">
                        <label class="mb-0">Description</label>
                        <textarea rows="3" name="description" required placeholder="Enter Description" class="form-control mb-2"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="mb-0">Upload Image</label>
                        <input type="file" name="image" required class="form-control mb-2">
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="mb-0">Status</label> <br>
                            <input type="checkbox" name="status" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="add_product_btn" >Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>