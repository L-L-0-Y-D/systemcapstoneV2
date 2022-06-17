<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Admin
          <a href="admin.php" class="btn btn-primary float-end">Back</a>
          </h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Username</label>
                        <input type="text" name="name" required placeholder="Enter Username" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Email</label>
                        <input type="email" name="email" required placeholder="Enter Email" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" required placeholder="Enter First Name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" required placeholder="Enter Last Name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Age</label>
                        <input type="number" name="age" required placeholder="Enter Age" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Phone Number</label>
                        <input type="text" name="phonenumber" required placeholder="Enter Phone Number" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Address</label>
                        <input type="text" name="address" required placeholder="Enter Address" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Password</label>
                        <input type="password" name="password" required placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirmpassword" required placeholder="Enter Confirm Password" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <input type = "hidden" name='role_as' value = '1'>
                    </div>
                    <div class="col-md-12">
                        <label for=""></label>
                        <input type="hidden" name="status" value = '1'>
                    </div> <br>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary" name="add_customer_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>