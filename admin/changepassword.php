<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $user = getByID("users",$id,"userid");

            if(mysqli_num_rows($user) > 0)
            {
                $data = mysqli_fetch_array($user)
                
            
            ?>
            <div class="card">
                <div class="card-header">
                <h4>Change Password
                    <a href="index.php" class="btn btn-primary float-end" style="background:rgb(255,128,64); border:none;">Back</a>
                </h4>   
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                <label for="">Current Password</label>
                                <input type="password" name="oldpassword" placeholder="Enter Current Password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">New Password</label>
                                <input type="password" name="password" placeholder="Enter New Password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirmpassword" placeholder="Enter Confirm New Password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class=" mt-2 btn btn-primary" name="edit_password_btn" style="background:rgb(255,128,64); border:none;">Update Password</button>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
            <?php
            }
            else
            {
                echo "User not Found";
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