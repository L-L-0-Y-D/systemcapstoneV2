<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $business = getByID("business",$id,"businessid");

            if(mysqli_num_rows($business) > 0)
            {
                $data = mysqli_fetch_array($business)
                
            
            ?>
            <div class="card">
                <div class="card-header">
                <h4>Change Password
                    <a href="index.php" class="btn btn-primary float-end">Back</a>
                </h4>   
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                                <label for="">Old Password</label>
                                <input type="password" name="business_oldpassword" placeholder="Enter New Password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">New Password</label>
                                <input type="password" name="business_password" placeholder="Enter New Password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">Confirm Password</label>
                                <input type="password" name="business_confirmpassword" placeholder="Enter Confirm New Password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="edit_password_btn">Update Password</button>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
            <?php
            }
            else
            {
                echo "Business not Found";
            }
        }
        else
        {
           echo"ID missing from url";
        }
            ?>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>