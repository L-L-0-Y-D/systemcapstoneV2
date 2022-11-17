<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
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
                    <a href="index.php" class="back btn-sm btn-close float-end"></a>
                </h4>   
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                <label for="">Current Password</label>
                                <input type="password" name="oldpassword" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">New Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirmpassword" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn update-btn mt-2" name="edit_password_btn" >Update Password</button>
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